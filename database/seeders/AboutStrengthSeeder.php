<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutStrengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Copy default icons if available in brand folder to about folder
        $icons = ['hybrid.png', 'best_price.jpg', 'quality.png', 'eco.jpg'];
        foreach ($icons as $icon) {
            $source = public_path('setting/brand/' . $icon);
            $destination = public_path('setting/about/' . $icon);
            if (File::exists($source) && !File::exists($destination)) {
                File::copy($source, $destination);
            }
        }

        $about = About::latest()->first();

        if (!$about) {
            $about = new About();
            $about->title = 'ESTABLISHING YOUR PATHWAY TO SUCCESS';
            $about->short_description = 'Imperial Education & Career (IEC), based in Dhaka, Bangladesh, is a leading firm dedicated to guiding students through the university application process. Partnered with top institutions across Australia, the USA, Canada, the UK, and more, IEC offers personalized and efficient support for undergraduate and graduate studies.';
        }

        $about->strength_one_icon = 'hybrid.png';
        $about->strength_one_title = 'Reliable';
        $about->strength_one_details = 'Our service is fully customer-centric and focused on bringing the best results and a smile of satisfaction on your face.';

        $about->strength_two_icon = 'best_price.jpg';
        $about->strength_two_title = 'Affordable Price';
        $about->strength_two_details = 'Affordability and quality are always on top of our agenda, with customer convenience given top priority.';

        $about->strength_three_icon = 'quality.png';
        $about->strength_three_title = 'High Quality Service';
        $about->strength_three_details = 'Premium quality, industry-leading guidance to help students achieve their maximum potential.';

        $about->strength_four_icon = 'eco.jpg';
        $about->strength_four_title = 'Green Energy';
        $about->strength_four_details = 'We are committed to promoting sustainable and eco-friendly solutions for a better future.';

        $about->save();
    }
}
