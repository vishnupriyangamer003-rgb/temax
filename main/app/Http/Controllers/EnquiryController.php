<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Store an enquiry from the public contact form.
     * Anti-spam & Security:
     * - Honeypot field (website_hp)
     * - Minimum human fill time (> 1s)
     * - Checkbox verification (captcha_verify)
     * - Anti-spam math challenge (captcha_answer)
     * - Link / URL blocking (avoids spam promotion)
     * - XSS pattern filtering
     * - Stores in MySQL database
     * - Prepares formatted WhatsApp enquiry redirect
     */
    public function store(Request $request)
    {
        // 1. Honeypot: bots that fill the hidden field are silently discarded.
        if (!empty($request->input('website_hp'))) {
            return response()->json(['ok' => true, 'id' => 0]);
        }

        // 2. Prevent instant automated submissions (form must be open for > 1 second).
        $loadedAt = (int) session('temax_form_loaded_at', 0);
        if ($loadedAt > 0 && (time() - $loadedAt < 1)) {
            return $this->respond($request, false, 'Please take a moment to review your details before submitting.');
        }

        // 3. Secure Checkbox Verification (I am human / Not a robot)
        if (!$request->has('captcha_verify') || (string) $request->input('captcha_verify') !== '1') {
            return $this->respond($request, false, 'Please verify that you are human by checking the security checkbox.');
        }

        // 4. Anti-spam Math Challenge Verification
        $expectedAnswer = session('temax_captcha_answer');
        if ($expectedAnswer !== null) {
            $providedAnswer = $request->input('captcha_answer');
            if ($providedAnswer === null || trim((string) $providedAnswer) === '' || (int) $providedAnswer !== (int) $expectedAnswer) {
                return $this->respond($request, false, 'Incorrect security answer. Please solve the simple math check and try again.');
            }
        }

        // 5. Standard Field Validation
        $data = $request->validate([
            'name'     => ['required', 'string', 'min:2', 'max:100'],
            'phone'    => ['required', 'string', 'regex:/^[0-9+\s\-()]{10,25}$/'],
            'email'    => 'nullable|email|max:190',
            'location' => 'nullable|string|max:120',
            'service'  => 'nullable|string|max:120',
            'message'  => 'nullable|string|max:3000',
        ], [
            'name.required'  => 'Please enter your name.',
            'name.min'       => 'Please enter your real name (at least 2 characters).',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex'    => 'Please enter a valid phone number (at least 10 digits).',
        ]);

        // 6. Block all links / URLs to prevent spam and link drops
        $linkPattern = '/(https?:\/\/|www\.[a-z0-9\-\.]+|[a-z0-9\-\.]+\.(com|org|net|io|ru|xyz|biz|info|site|online|top|me|co|cc|in|us|cn|live|shop|club|fun|buzz|icu|vip|pro)\b|<a\b|\[url|href=)/i';

        foreach (['name', 'location', 'service', 'message'] as $field) {
            if (!empty($data[$field]) && preg_match($linkPattern, (string) $data[$field])) {
                return $this->respond($request, false, 'Links, promotional URLs, and website addresses are strictly not permitted. Please remove any web addresses before submitting.');
            }
        }

        // 7. XSS Pattern Detection
        $xssPattern = '/(<script\b|<iframe\b|<object\b|<embed\b|javascript:|on[a-z]+\s*=)/i';

        foreach (['name', 'location', 'service', 'message'] as $field) {
            if (!empty($data[$field]) && preg_match($xssPattern, (string) $data[$field])) {
                return $this->respond($request, false, 'Potentially harmful content detected. Please remove any HTML or script tags.');
            }
        }

        // 8. Invalidate one-time session challenge
        session()->forget(['temax_form_loaded_at', 'temax_captcha_answer', 'temax_captcha_token']);

        // 9. Store the enquiry in the database
        $enquiry = Enquiry::create([
            'name'     => strip_tags(trim($data['name'])),
            'phone'    => preg_replace('/[^0-9+]/', '', trim($data['phone'])),
            'email'    => $data['email'] ?? null,
            'location' => isset($data['location']) ? strip_tags(trim($data['location'])) : null,
            'service'  => isset($data['service']) ? strip_tags(trim($data['service'])) : null,
            'message'  => isset($data['message']) ? strip_tags(trim($data['message'])) : null,
            'status'   => 'new',
            'source'   => 'contact-page',
        ]);

        // 10. Prepare WhatsApp Message & URL
        $cleanWa = preg_replace('/[^0-9]/', '', (string) setting('whatsapp', '919443169098'));
        if (empty($cleanWa)) {
            $cleanWa = '919443169098';
        }

        $lines = [
            "🔥 *New Furnace Camera Enquiry — TEMAX*",
            "",
            "👤 *Name:* " . $enquiry->name,
            "📞 *Phone:* " . $enquiry->phone,
        ];

        if (!empty($enquiry->email)) {
            $lines[] = "📧 *Email:* " . $enquiry->email;
        }

        if (!empty($enquiry->location)) {
            $lines[] = "🏭 *Plant / Location:* " . $enquiry->location;
        }

        if (!empty($enquiry->service)) {
            $lines[] = "⚙️ *Service Required:* " . $enquiry->service;
        }

        if (!empty($enquiry->message)) {
            $lines[] = "";
            $lines[] = "💬 *Question / Message:*";
            $lines[] = $enquiry->message;
        }

        $lines[] = "";
        $lines[] = "🌐 *Source:* temax.in (Enquiry #" . $enquiry->id . ")";

        $waText = implode("\n", $lines);
        $whatsappUrl = "https://api.whatsapp.com/send?phone=" . $cleanWa . "&text=" . rawurlencode($waText);

        return $this->respond(
            $request,
            true,
            'Thank you! Your enquiry has been received and saved. Redirecting to WhatsApp...',
            $enquiry->id,
            $whatsappUrl
        );
    }

    private function respond($request, $ok, $message, $id = 0, $whatsappUrl = null)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'ok'           => $ok,
                'id'           => $id,
                'msg'          => $message,
                'whatsapp_url' => $whatsappUrl,
            ], $ok ? 200 : 422);
        }

        if ($ok && $whatsappUrl) {
            return redirect()->away($whatsappUrl);
        }

        if ($ok) {
            return back()->with('success', $message);
        }

        return back()->withErrors(['enquiry' => $message])->withInput();
    }
}
