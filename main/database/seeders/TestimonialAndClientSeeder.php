<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialAndClientSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Testimonials if empty
        if (Testimonial::count() === 0) {
            $testimonials = [
                [
                    'name'        => 'Rajesh Sharma',
                    'designation' => 'GM - Technical & Operations',
                    'company'     => 'UltraTech Cement Ltd.',
                    'title'       => 'Continuous 24/7 Visibility in 1600°C Kiln',
                    'content'     => 'TEMAX furnace camera systems have given our process control team crystal-clear visibility inside our rotary kiln burning zone. The SS 316 air and water cooling keeps the camera safe even during extreme temperature swings, saving hours of downtime.',
                    'avatar'      => 'assets/images/resource/testimonial-1.png',
                    'rating'      => 5,
                    'sort_order'  => 0,
                    'is_active'   => true,
                ],
                [
                    'name'        => 'Arvind Kumar',
                    'designation' => 'Chief Engineer (C&I)',
                    'company'     => 'NTPC Super Thermal Power',
                    'title'       => 'Fail-Safe Auto-Retraction Protection',
                    'content'     => 'The pneumatic auto-retraction mechanism with PLC fail-safe has protected our cameras reliably during plant power trips. The optical clarity of the high-temperature pinhole lens allows our operators to detect boiler clinker build-up instantly.',
                    'avatar'      => 'assets/images/resource/testimonial-2.png',
                    'rating'      => 5,
                    'sort_order'  => 1,
                    'is_active'   => true,
                ],
                [
                    'name'        => 'S. Sundararajan',
                    'designation' => 'Head of Production (Rolling Mills)',
                    'company'     => 'JSW Steel Works',
                    'title'       => 'Rugged Build & Prompt Local Support',
                    'content'     => 'Having 90% of production manufactured in India means all spare parts and technical service are available on demand without import delays. TEMAX has been our trusted industrial camera partner for reheat and annealing furnaces.',
                    'avatar'      => 'assets/images/resource/testimonial-3.png',
                    'rating'      => 5,
                    'sort_order'  => 2,
                    'is_active'   => true,
                ],
                [
                    'name'        => 'Michael Chen',
                    'designation' => 'Technical Director',
                    'company'     => 'Float Glass Manufacturing Unit',
                    'title'       => 'Precision Melt Tank & Flame Monitoring',
                    'content'     => 'Monitoring glass level, batch melt progress, and burner flame geometry without opening furnace peepholes has drastically cut thermal loss and improved our finished sheet consistency. An indispensable monitoring system.',
                    'avatar'      => 'assets/images/resource/testimonial-4.png',
                    'rating'      => 5,
                    'sort_order'  => 3,
                    'is_active'   => true,
                ],
                [
                    'name'        => 'K. Venkatraman',
                    'designation' => 'DGM Maintenance & Electrical',
                    'company'     => 'Dalmia Bharat Cement',
                    'title'       => 'Outstanding Retrofit & Cooler Performance',
                    'content'     => 'We retrofitted our clinker cooler and cowl shell with TEMAX cameras. The integration into our central SCADA control room was seamless, and the image clarity during high dust flow is exceptional.',
                    'avatar'      => 'assets/images/resource/testimonial-5.png',
                    'rating'      => 5,
                    'sort_order'  => 4,
                    'is_active'   => true,
                ],
            ];

            foreach ($testimonials as $t) {
                Testimonial::create($t);
            }
        }

        // Seed Clients / Brands if empty
        if (Client::count() === 0) {
            $clients = [
                [
                    'name'       => 'UltraTech Cement',
                    'logo'       => 'assets/images/clients/clients-1.png',
                    'url'        => 'https://www.ultratechcement.com/',
                    'sort_order' => 0,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'JSW Steel',
                    'logo'       => 'assets/images/clients/clients-2.png',
                    'url'        => 'https://www.jsw.in/steel',
                    'sort_order' => 1,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'Tata Steel',
                    'logo'       => 'assets/images/clients/clients-3.png',
                    'url'        => 'https://www.tatasteel.com/',
                    'sort_order' => 2,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'NTPC Limited',
                    'logo'       => 'assets/images/clients/clients-4.png',
                    'url'        => 'https://www.ntpc.co.in/',
                    'sort_order' => 3,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'Saint-Gobain Glass',
                    'logo'       => 'assets/images/clients/clients-5.png',
                    'url'        => 'https://www.saint-gobain.com/',
                    'sort_order' => 4,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'Dalmia Bharat Cement',
                    'logo'       => 'assets/images/clients/clients-6.png',
                    'url'        => 'https://www.dalmiabharat.com/',
                    'sort_order' => 5,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'ACC Cement',
                    'logo'       => 'assets/images/clients/clients-7.png',
                    'url'        => 'https://www.acclimited.com/',
                    'sort_order' => 6,
                    'is_active'  => true,
                ],
                [
                    'name'       => 'BHEL Energy Systems',
                    'logo'       => 'assets/images/clients/clients-8.png',
                    'url'        => 'https://www.bhel.com/',
                    'sort_order' => 7,
                    'is_active'  => true,
                ],
            ];

            foreach ($clients as $c) {
                Client::create($c);
            }
        }
    }
}
