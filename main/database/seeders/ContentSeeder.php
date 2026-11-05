<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\SettingController;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeds the TEMAX company profile and product/service catalogue
 * (source: TEMAX Catalog - 0326.pptx).
 */
class ContentSeeder extends Seeder
{
    public function run()
    {
        $this->seedAdmin();
        $this->seedSettings();
        $this->seedServices();
        $this->seedProducts();
        $this->seedProjects();
    }

    private function seedAdmin()
    {
        $admin = User::where('email', 'admin@temax.local')
            ->orWhere('name', 'admin')
            ->first();

        if ($admin) {
            $admin->update([
                'name'     => 'admin',
                'password' => Hash::make('12345'),
                'is_admin' => true,
            ]);
        } else {
            User::create([
                'name'     => 'admin',
                'email'    => 'admin@temax.local',
                'password' => Hash::make('12345'),
                'is_admin' => true,
            ]);
        }
    }

    private function seedSettings()
    {
        foreach (SettingController::defaults() as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }

    private function seedServices()
    {
        if (Service::count() > 0) {
            return;
        }

        $catalog = [
            [
                'slug'    => 'furnace-camera-systems',
                'title'   => 'Furnace Camera Systems',
                'image'   => 'assets/images/temax/kiln-camera.jpg',
                'badge'   => 'Core product',
                'summary' => 'High-temperature image detection for cement, thermal and glass furnaces. TEMAX cameras run on a 1/3" Sony colour CCD with 960/1080 TV lines, composite video output and DC12V power, built for continuous in-furnace viewing.',
                'lead'    => 'See inside your furnace live — TEMAX furnace cameras give a clear, continuous view of flame, material and refractory condition through the toughest high-temperature applications.',
                'intro'   => [
                    'Image sensor: 1/3" Sony Color CCD Sensor',
                    'Horizontal resolution: more than 960 and 1080 TV lines (HD quality)',
                    'Shutter speed: 1/25 - 1/30000',
                    'Min illumination: 0.2 Lux (F1.2, 30 IRE) / 0.001 Lux (F1.2, X128 DSS)',
                    'Power source: DC12V, max. 6W consumption',
                ],
                'points'  => [
                    'First furnace camera developed for kiln application in 2016',
                    '90% manufacturing in India — all spares available locally',
                    'Customisation possible with immediate support',
                ],
                'items_title' => 'Key features',
                'cta_title'   => 'Need a furnace camera?',
                'items'   => [
                    ['title' => 'HD image quality', 'text' => '960 and 1080 TV lines with S/N ratio more than 50 dB (AGC off).'],
                    ['title' => 'Built for heat', 'text' => 'Rated for environments up to 2000 °C with air or water cooling.'],
                    ['title' => 'Low light performance', 'text' => '0.2 Lux standard, 0.001 Lux with X128 DSS for dim furnaces.'],
                    ['title' => 'Composite video out', 'text' => '1 Vp-p 75 Ω composite output, DC12V supply, max 6W.'],
                ],
                'steps'  => [
                    ['title' => 'Enquire', 'text' => 'Share your furnace type, wall thickness and viewing requirement.'],
                    ['title' => 'Design', 'text' => 'TEMAX engineers specify tube length, cooling and nozzle for your application.'],
                    ['title' => 'Manufacture', 'text' => 'Camera built and tested at the TEMAX production unit, Karur.'],
                    ['title' => 'Install & support', 'text' => 'On-site installation, commissioning and operator training.'],
                ],
            ],
            [
                'slug'    => 'camera-cooling-systems',
                'title'   => 'Camera Cooling Systems',
                'image'   => 'assets/images/temax/cooling-system.jpg',
                'badge'   => 'SS 316 build',
                'summary' => 'SS 316 cooling systems, laser cut and corrosion free, with a 600 mm long nose and 18 mm camera view hole minimised to reduce buffing — lighter units for furnace wall thickness of 200-600 mm.',
                'lead'    => 'Reliable air or water cooling keeps the camera head safe in environments up to 2000 °C, with a water volume flow of 10 LPM.',
                'intro'   => [
                    'Material: SS 316, laser cutting, corrosion free',
                    'Long nose: 600 mm with 18 mm camera view hole (minimised to reduce buffing)',
                    'Environment: up to 2000 °C',
                    'Cooling: air or water cooling',
                    'Furnace wall thickness: 200 - 600 mm',
                    'Water volume flow: 10 LPM',
                ],
                'points'  => [
                    'Less weight for easy handling',
                    'All spares available in India',
                ],
                'items_title' => 'Cooling options',
                'cta_title'   => 'Specify your cooling',
                'items'   => [
                    ['title' => 'Air cooling', 'text' => 'Simple, low-maintenance cooling for suitable furnace conditions.'],
                    ['title' => 'Water cooling', 'text' => '10 LPM water volume flow for sustained high-temperature duty.'],
                    ['title' => 'Heat exchanger for air', 'text' => 'Customised air cooling with filter applications.'],
                    ['title' => 'Oil & water filters', 'text' => 'Filtration packages to protect the camera head.'],
                ],
                'steps'  => [
                    ['title' => 'Assess', 'text' => 'Wall thickness, ambient temperature and cooling media reviewed.'],
                    ['title' => 'Configure', 'text' => 'Air or water circuit sized for your furnace.'],
                    ['title' => 'Build & test', 'text' => 'SS 316 unit laser cut, assembled and flow tested.'],
                ],
            ],
            [
                'slug'    => 'auto-retraction-systems',
                'title'   => 'Auto Retraction Systems',
                'image'   => 'assets/images/temax/auto-retraction.png',
                'badge'   => 'Safety first',
                'summary' => 'Pneumatic cylinder driven auto retraction with trolley operation, shutter provision and double magnetic sensors with indicator — plus sensor panel and control panel for full monitoring.',
                'lead'    => 'Protect the camera and the operator: the auto retraction system pulls the camera out of the furnace on demand or in an emergency, with dust-prevent roof and flow sensors watching every critical parameter.',
                'intro'   => [
                    'Auto retraction with pneumatic cylinder and trolley operation',
                    'Shutter provision and dust prevent roof',
                    'Double magnetic sensors with indicator',
                    'Sensor panel: water flow, air flow, water inlet/outlet temperature sensors, air reserve tank',
                    'Control panel: mini LED monitor, LCD based PLC, 12V/24V DC SMPS',
                    '24 pin connecting cable, emergency exit switch, auto/manual changeover',
                ],
                'points'  => [
                    'Forward and reverse indicators',
                    'Emergency exit switch for safe shutdown',
                ],
                'items_title' => 'System components',
                'cta_title'   => 'Plan your retraction unit',
                'items'   => [
                    ['title' => 'Sensor panel', 'text' => 'Water flow, air flow, inlet/outlet temperature sensors and air reserve tank.'],
                    ['title' => 'Control panel', 'text' => 'LCD based PLC, mini LED monitor, SMPS units and status indicators.'],
                    ['title' => 'Pneumatic cylinder', 'text' => 'Smooth trolley operation with shutter provision.'],
                    ['title' => 'Double magnetic sensors', 'text' => 'With indicator for accurate position feedback.'],
                ],
                'steps'  => [
                    ['title' => 'Survey', 'text' => 'Furnace layout and access reviewed on site.'],
                    ['title' => 'Engineer', 'text' => 'Retraction stroke, trolley and panels designed.'],
                    ['title' => 'Integrate', 'text' => 'System wired to PLC and commissioned with training.'],
                ],
            ],
            [
                'slug'    => 'thermal-camera-systems',
                'title'   => 'Thermal Camera Systems',
                'image'   => 'assets/images/temax/thermal-camera.jpg',
                'badge'   => 'Temperature reading',
                'summary' => 'High temperature reading thermal cameras (DPC and Zylo) and thermal cameras for kiln shell monitoring — see hot spots before they become shell damage.',
                'lead'    => 'Thermal imaging gives you actual temperature data across the kiln shell and refractory, so maintenance happens on evidence, not guesswork.',
                'intro'   => [
                    'High temperature reading thermal camera — DPC and Zylo',
                    'Thermal camera for kiln shell monitoring',
                    'Continuous temperature profile of shell and refractory',
                    'Early warning for coating loss, hot spots and brick damage',
                ],
                'points'  => [
                    'Works alongside furnace camera systems for a complete view',
                    'Data-driven maintenance planning',
                ],
                'items_title' => 'Applications',
                'cta_title'   => 'Monitor your kiln shell',
                'items'   => [
                    ['title' => 'Kiln shell monitoring', 'text' => 'Track shell temperature bands across the entire kiln length.'],
                    ['title' => 'Hot spot detection', 'text' => 'Catch coating loss and refractory wear early.'],
                    ['title' => 'Temperature reading', 'text' => 'High temperature reading thermal cameras for process verification.'],
                ],
                'steps'  => [
                    ['title' => 'Define', 'text' => 'Identify the shell zones and temperatures to monitor.'],
                    ['title' => 'Install', 'text' => 'Camera mounted and aligned on the kiln.'],
                    ['title' => 'Monitor', 'text' => 'Operators read live thermal data and act on alerts.'],
                ],
            ],
            [
                'slug'    => 'retrofit-upgrades',
                'title'   => 'Retrofit & Upgrades',
                'image'   => 'assets/images/temax/retrofit-camera.jpg',
                'badge'   => 'Modernise',
                'summary' => 'TEMAX kiln and cooler retrofit cameras, cement cyclone jam prevent camera systems and cost-effective fixed cameras — upgrade existing installations without replacing everything.',
                'lead'    => 'Bring older furnace viewing systems up to current standards with retrofits engineered around your existing ports and wall thickness.',
                'intro'   => [
                    'TEMAX kiln and cooler retrofit camera',
                    'Cement cyclone jam prevent camera system',
                    'Cost effective fixed camera for cement industry',
                    'Cowl shell camera for kiln',
                ],
                'points'  => [
                    'Immediate support and economical spares',
                    'Retrofits tailored to existing furnace ports',
                ],
                'items_title' => 'Retrofit options',
                'cta_title'   => 'Upgrade your system',
                'items'   => [
                    ['title' => 'Kiln & cooler retrofit', 'text' => 'Modern camera heads fitted to existing kiln and cooler openings.'],
                    ['title' => 'Cyclone jam prevention', 'text' => 'Camera systems that watch cyclone conditions and prevent jamming.'],
                    ['title' => 'Fixed cameras', 'text' => 'Cost-effective fixed units for cement industry monitoring.'],
                ],
                'steps'  => [
                    ['title' => 'Audit', 'text' => 'Existing installation and ports inspected.'],
                    ['title' => 'Retrofit', 'text' => 'New camera, cooling and cabling fitted in place.'],
                    ['title' => 'Commission', 'text' => 'System tested, operators trained.'],
                ],
            ],
            [
                'slug'    => 'customized-solutions',
                'title'   => 'Customized Solutions',
                'image'   => 'assets/images/temax/custom-camera.png',
                'badge'   => 'Made to order',
                'summary' => 'Customized furnace cameras for multiple applications — including specialised air cooling and filter applications, 15 feet length furnace cameras and inclined 90° cameras for special high-temperature work.',
                'lead'    => 'If the standard unit does not fit, TEMAX builds to your specification: length, angle, cooling, cable and control panel all adapted to the application.',
                'intro'   => [
                    'Customized furnace cameras for multiple applications',
                    'Inclined 90° camera for special hi-temperature application — Full HD 1080p, 25/30 fps progressive scan, 1/3" 2 megapixel sensor',
                    'Wide dynamic range up to 120 dB for glare-free images',
                    'True Day/Night with 3D noise reduction and excellent low-light performance',
                    'Customised solutions for air cooling and filter applications',
                ],
                'points'  => [
                    'Full HD 1080p at 25/30 fps progressive scan',
                    'Customisation is possible with immediate support',
                ],
                'items_title' => 'Custom builds',
                'cta_title'   => 'Discuss your application',
                'items'   => [
                    ['title' => 'Special lengths', 'text' => 'Including 15 feet length furnace cameras.'],
                    ['title' => 'Special angles', 'text' => 'Inclined 90° cameras for unique viewing positions.'],
                    ['title' => 'Cooling packages', 'text' => 'Air cooling and filter applications built to order.'],
                ],
                'steps'  => [
                    ['title' => 'Requirement', 'text' => 'Application details and constraints shared.'],
                    ['title' => 'Prototype', 'text' => 'Design proposed with drawings and estimate.'],
                    ['title' => 'Build', 'text' => 'Custom unit manufactured, tested and delivered.'],
                ],
            ],
        ];

        $order = 0;

        foreach ($catalog as $service) {
            $record = Service::create([
                'slug'        => $service['slug'],
                'title'       => $service['title'],
                'image'       => $service['image'] ?? null,
                'summary'     => $service['summary'] ?? null,
                'badge'       => $service['badge'] ?? null,
                'items_title' => $service['items_title'] ?? null,
                'cta_title'   => $service['cta_title'] ?? null,
                'lead'        => $service['lead'] ?? null,
                'intro'       => $service['intro'] ?? [],
                'points'      => $service['points'] ?? [],
                'sort_order'  => $order++,
                'is_active'   => true,
            ]);

            foreach (($service['items'] ?? []) as $index => $item) {
                $record->items()->create([
                    'title'      => $item['title'],
                    'text'       => $item['text'] ?? null,
                    'sort_order' => $index,
                ]);
            }

            foreach (($service['steps'] ?? []) as $index => $step) {
                $record->steps()->create([
                    'title'      => $step['title'],
                    'text'       => $step['text'] ?? null,
                    'sort_order' => $index,
                ]);
            }
        }
    }

    private function seedProducts()
    {
        if (ProductCategory::count() > 0) {
            return;
        }

        $catalog = [
            [
                'title'       => 'Furnace Cameras',
                'image'       => 'assets/images/temax/production-tube.jpg',
                'description' => 'Camera tubes and specialised units for in-furnace viewing across cement, thermal and glass plants.',
                'items'       => [
                    ['name' => 'Furnace Camera Tube', 'description' => '1/3" Sony colour CCD, 960/1080 TV lines, DC12V, max 6W'],
                    ['name' => 'Inclined 90° Camera', 'description' => 'Full HD 1080p, 25/30 fps, 2MP sensor, WDR 120 dB'],
                    ['name' => '15 Feet Furnace Camera', 'description' => 'Long reach camera for deep furnace viewing'],
                    ['name' => 'Fixed Camera for Cement Industry', 'description' => 'Cost effective fixed monitoring'],
                    ['name' => 'Under Grate Camera', 'description' => 'For cement industry grate monitoring'],
                    ['name' => 'Cowl Shell Camera for Kiln', 'description' => 'Kiln cowl shell observation'],
                    ['name' => 'Kiln & Cooler Retrofit Camera', 'description' => 'Retrofit units for kiln and cooler'],
                    ['name' => 'Carbon & Annealing Furnace Camera', 'description' => 'For carbon and annealing furnaces'],
                    ['name' => 'Electric Launching Furnace Camera', 'description' => 'For electric launching furnace applications'],
                ],
            ],
            [
                'title'       => 'Cooling & Retraction Systems',
                'image'       => 'assets/images/temax/camera-furnace.jpg',
                'description' => 'SS 316 cooling systems and pneumatic auto retraction packages that protect camera and operator.',
                'items'       => [
                    ['name' => 'SS 316 Cooling System', 'description' => 'Long nose 600 mm, view hole 18 mm, air or water cooling'],
                    ['name' => 'Auto Retraction System', 'description' => 'Pneumatic cylinder, trolley operation, shutter provision'],
                    ['name' => 'Sensor Panel', 'description' => 'Water/air flow sensors, temperature sensors, air reserve tank'],
                    ['name' => 'Control Panel', 'description' => 'LCD PLC, LED mini monitor, SMPS, emergency exit switch'],
                    ['name' => 'Air Cooling & Filter Package', 'description' => 'Heat exchanger for air, oil and water filters'],
                ],
            ],
            [
                'title'       => 'Industry Systems',
                'image'       => 'assets/images/temax/control-panel.jpg',
                'description' => 'Complete camera systems built for specific plants and applications.',
                'items'       => [
                    ['name' => 'Cement Cyclone Jam Prevent Camera System', 'description' => 'Watches cyclone conditions to prevent jamming'],
                    ['name' => 'Captive Power Plant Camera System', 'description' => 'TEMAX cameras working in captive power plants'],
                    ['name' => '600MW Utility Power Plant Camera System', 'description' => 'Utility scale power plant camera system'],
                    ['name' => 'Glass Melting Furnace Camera', 'description' => 'Video monitoring of glass melting furnaces'],
                    ['name' => 'Cement Cooler Camera', 'description' => 'Cooler process video monitoring'],
                ],
            ],
            [
                'title'       => 'Thermal Cameras',
                'image'       => 'assets/images/temax/dispatch.jpg',
                'description' => 'Temperature reading thermal imaging for kiln shell monitoring and process verification.',
                'items'       => [
                    ['name' => 'High Temperature Reading Thermal Camera — DPC', 'description' => 'High temperature reading thermal camera'],
                    ['name' => 'Zylo Thermal Camera', 'description' => 'High temperature reading thermal camera'],
                    ['name' => 'Kiln Shell Monitoring Thermal Camera', 'description' => 'Thermal camera for kiln shell monitoring'],
                ],
            ],
        ];

        foreach ($catalog as $index => $category) {
            $record = ProductCategory::create([
                'title'       => $category['title'],
                'image'       => $category['image'] ?? null,
                'description' => $category['description'] ?? null,
                'sort_order'  => $index,
                'is_active'   => true,
            ]);

            foreach (($category['items'] ?? []) as $itemIndex => $item) {
                $record->items()->create([
                    'name'        => $item['name'],
                    'description' => $item['description'] ?? null,
                    'sort_order'  => $itemIndex,
                ]);
            }
        }
    }

    private function seedProjects()
    {
        if (Project::count() > 0) {
            return;
        }

        $catalog = [
            [
                'title' => 'First Furnace Camera for Kiln Application',
                'place' => 'Cement plant, India',
                'type'  => 'Cement',
                'text'  => 'In 2016 TEMAX developed the first furnace camera for kiln application — the reference installation that started the TEMAX furnace camera range. The unit gave operators their first live view inside the kiln and set the standard for the retrofit and cowl shell cameras that followed.',
                'images' => ['assets/images/temax/kiln-camera-ui.jpg', 'assets/images/temax/camera-tube.jpg'],
            ],
            [
                'title' => 'TEMAX Cameras in a Captive Power Plant',
                'place' => 'Captive power plant, India',
                'type'  => 'Thermal',
                'text'  => 'TEMAX furnace cameras are working in captive power plants, giving continuous in-furnace visibility of boiler and furnace conditions for reliable operation and faster response to upsets.',
                'images' => ['assets/images/temax/captive-power.jpg', 'assets/images/temax/camera-furnace.jpg'],
            ],
            [
                'title' => '600MW Utility Power Plant Camera System',
                'place' => 'Utility power plant, India',
                'type'  => 'Thermal',
                'text'  => 'A complete camera system delivered for a 600MW utility power plant — furnace viewing, cooling and control panels engineered for utility scale operation and continuous duty.',
                'images' => ['assets/images/temax/power-600mw.jpg', 'assets/images/temax/control-panel.jpg'],
            ],
            [
                'title' => 'Under Grate Camera for Cement Industry',
                'place' => 'Cement plant, India',
                'type'  => 'Cement',
                'text'  => 'Under grate camera installation giving the control room a clear view of grate conditions — helping operators manage material movement and spot build-ups early.',
                'images' => ['assets/images/temax/under-grate.jpg'],
            ],
            [
                'title' => 'Glass Melting Furnace Camera Installation',
                'place' => 'Glass plant, India',
                'type'  => 'Glass',
                'text'  => 'Furnace camera video monitoring for a glass melting furnace — live visibility of the melt and flame without opening the furnace, supporting consistent glass quality.',
                'images' => ['assets/images/temax/glass-furnace.png'],
            ],
            [
                'title' => 'Cement Cooler Camera System',
                'place' => 'Cement plant, India',
                'type'  => 'Cement',
                'text'  => 'Cooler camera installation covering the cement cooler process — operators monitor cooler conditions in real time and reduce unplanned stoppages.',
                'images' => ['assets/images/temax/cement-cooler.png'],
            ],
        ];

        foreach ($catalog as $index => $project) {
            $record = Project::create([
                'title'      => $project['title'],
                'place'      => $project['place'] ?? null,
                'type'       => $project['type'] ?? null,
                'text'       => $project['text'] ?? null,
                'sort_order' => $index,
                'is_active'  => true,
            ]);

            foreach (($project['images'] ?? []) as $imageIndex => $path) {
                $record->images()->create([
                    'path'       => $path,
                    'sort_order' => $imageIndex,
                ]);
            }
        }
    }
}
