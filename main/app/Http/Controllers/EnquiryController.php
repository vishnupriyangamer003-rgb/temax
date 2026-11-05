<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Store an enquiry from the public contact form.
     * Anti-spam: honeypot field + minimum fill time + Laravel CSRF + validation.
     */
    public function store(Request $request)
    {
        // Honeypot: bots that fill the hidden field are silently discarded.
        if (!empty($request->input('website_hp'))) {
            return response()->json(['ok' => true, 'id' => 0]);
        }

        // Prevent instant automated submissions (form must be open for > 1 second).
        $loadedAt = (int) session('temax_form_loaded_at', 0);
        if ($loadedAt > 0 && (time() - $loadedAt < 1)) {
            return $this->respond($request, false, 'Please take a moment to review your details before submitting.');
        }

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

        $xssPattern = '/(<script\b|<iframe\b|<object\b|<embed\b|javascript:|on[a-z]+\s*=)/i';

        foreach (['name', 'location', 'service', 'message'] as $field) {
            if (preg_match($xssPattern, (string) ($data[$field] ?? ''))) {
                return $this->respond($request, false, 'Potentially harmful content detected. Please remove any HTML or script tags.');
            }
        }

        session()->forget('temax_form_loaded_at');

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

        return $this->respond($request, true, 'Thank you. Your enquiry has been received.', $enquiry->id);
    }

    private function respond($request, $ok, $message, $id = 0)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['ok' => $ok, 'id' => $id, 'msg' => $message], $ok ? 200 : 422);
        }

        if ($ok) {
            return back()->with('success', $message);
        }

        return back()->withErrors(['enquiry' => $message])->withInput();
    }
}
