<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\Uploader;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public static function keys()
    {
        return [
            'site_name', 'tagline', 'meta_description',
            'phone', 'phone_display', 'phone2', 'whatsapp', 'email', 'website',
            'address', 'address_short', 'working_hours', 'map_embed',
            'facebook', 'instagram', 'twitter', 'youtube', 'linkedin',
            'footer_about', 'copyright_text',
            // Homepage section headings
            'services_subtitle', 'services_title',
            'projects_subtitle', 'projects_title',
            'testimonials_subtitle', 'testimonials_title',
            'clients_subtitle', 'clients_title', 'clients_tagline',
            // SEO / meta tags
            'meta_title', 'meta_keywords', 'meta_author', 'meta_robots', 'canonical_url',
            'og_title', 'og_description', 'og_image', 'twitter_card', 'twitter_site',
            // Advanced
            'google_site_verification', 'favicon', 'extra_meta', 'custom_head_code', 'custom_body_code',
        ];
    }

    public static function defaults()
    {
        return [
            'site_name'        => 'TEMAX',
            'tagline'          => 'Furnace Camera Manufacturer',
            'meta_description' => 'TEMAX, founded in 1996, is a national innovative pilot and high technology enterprise manufacturing high-temperature furnace camera systems, cooling systems, auto retraction systems and thermal cameras for the cement, thermal and glass industries.',
            'phone'            => '+91 4324 226787',
            'phone_display'    => '+91 4324 226787',
            'phone2'           => '+91 94431 69098, +91 73391 94555',
            'whatsapp'         => '919443169098',
            'email'            => 'sales@temax.in',
            'website'          => 'www.temax.in',
            'address'          => '2E, Apple Paradise, 4/25, Kovai Road, Reddipalaiam, Karur, Tamil Nadu - 639002',
            'address_short'    => 'Reddipalaiam, Karur - 639002',
            'working_hours'    => 'Mon to Sat: 09:00 am to 06:00 pm',
            'map_embed'        => 'https://www.google.com/maps?q=Reddipalaiam%2C%20Karur%20639002&output=embed',
            'facebook'         => '',
            'instagram'        => '',
            'twitter'          => '',
            'youtube'          => '',
            'linkedin'         => '',
            'footer_about'     => 'TEMAX manufactures furnace camera systems with 90% of production in India — main modules only imported, all spares available locally, customisation possible and immediate support.',
            'copyright_text'   => '',
            // Section headings
            'services_subtitle' => 'What we offer',
            'services_title'    => 'Our services &amp; solutions',
            'projects_subtitle' => 'Our track record',
            'projects_title'    => 'Projects &amp; installations',
            'testimonials_subtitle' => 'Testimonials',
            'testimonials_title'    => 'What our customers <br> say about us',
            'clients_subtitle'      => 'Customers & Partners',
            'clients_title'         => 'Our Valued <span>[Customers]</span>',
            'clients_tagline'       => 'Delivering high-temperature vision, reliability, and precision across heavy industries.',
            // SEO / meta tags
            'meta_title'       => 'TEMAX - Furnace Camera Manufacturer for Cement, Thermal & Glass Industries',
            'meta_keywords'    => 'furnace camera, kiln camera, thermal camera, cement plant camera, glass furnace camera, auto retraction system, TEMAX',
            'meta_author'      => 'TEMAX',
            'meta_robots'      => 'index, follow',
            'canonical_url'    => '',
            'og_title'         => '',
            'og_description'   => '',
            'og_image'         => '',
            'twitter_card'     => 'summary_large_image',
            'twitter_site'     => '',
            // Advanced
            'google_site_verification' => '',
            'favicon'                  => '',
            'extra_meta'               => '',
            'custom_head_code'         => '',
            'custom_body_code'         => '',
        ];
    }

    public function index()
    {
        $values = [];
        $defaults = self::defaults();

        foreach (self::keys() as $key) {
            $values[$key] = Setting::get($key, $defaults[$key] ?? '');
        }

        return view('admin.settings.index', compact('values', 'defaults'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings'         => 'required|array',
            'settings.*'       => 'nullable|string',
            'favicon_file'     => 'nullable|mimes:png,jpg,jpeg,webp,ico|max:1024',
            'og_image_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'remove_favicon'   => 'nullable|boolean',
            'remove_og_image'  => 'nullable|boolean',
        ]);

        $oldMedia = [
            'favicon'  => Setting::get('favicon'),
            'og_image' => Setting::get('og_image'),
        ];

        foreach (self::keys() as $key) {
            Setting::put($key, (string) $request->input('settings.' . $key, ''));
        }

        if ($request->boolean('remove_favicon')) {
            Setting::put('favicon', '');
        }

        if ($request->boolean('remove_og_image')) {
            Setting::put('og_image', '');
        }

        foreach (['favicon' => 'favicon_file', 'og_image' => 'og_image_file'] as $settingKey => $input) {
            $file = $request->file($input);

            if (!$file) {
                continue;
            }

            $path = Uploader::store($file, 'settings');

            if ($path) {
                Setting::put($settingKey, $path);
            }
        }

        foreach ($oldMedia as $settingKey => $oldPath) {
            if ($oldPath && $oldPath !== Setting::get($settingKey)) {
                Uploader::delete($oldPath);
            }
        }

        return back()->with('success', 'Site settings saved.');
    }
}
