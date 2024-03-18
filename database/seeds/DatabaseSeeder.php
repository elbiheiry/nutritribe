<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//        \Illuminate\Support\Facades\DB::table('admins')->insert([
//            'name' => 'admin',
//            'email' => 'admin@nutritribeonline.com',
//            'password' => bcrypt('Admin123')
//        ]);

//        \Illuminate\Support\Facades\DB::table('settings')->insert([
//            'email' => 'info@nutritribeonline.com',
//            'phone' => '+20101810843',
//            'description' => 'we are passionate about tailoring and customizing our different nutrition packages to your individual needs. we believe in meeting you where you are and taking you to where you want to be',
//            'facebook' => 'https://m.facebook.com/Nutritribe2020/?ref=bookmarks',
//            'instagram' => 'https://www.instagram.com/nutri.tribe/',
//            'working_hour' => 'Saturday - Thursday'
//        ]);

        \Illuminate\Support\Facades\DB::table('abouts')->insert([
            'image' => 'owner.jpg',
            'description1' => ' Dr Sherine El Shimi is a graduate of the faculty of Medicine. She has always had a passion for nutrition and started her internship early on while she was still in university in both Egypt and in the U.K at Guys and St Thomas Hospital.
                                Dr Sherine is a certified nutritionist and has completed her MSc in clinical nutrition with a specialty in nutrition for cancer from the University of Roehampton in the U.K. Sherine is exceptional at dealing with Diabetes, High blood pressure, autoimmune diseases and digestive issues.
                                She has been working with patients both adults and children since 2013 in both clinical nutrition and obesity with clear results. Her deepest satisfaction comes when there are clear results in weight loss and also a significant change in habits.',
            'description2' => 'It was very obvious for me that the right nutrients can help the body in many different ways. I have been working in the field of clinical nutrition for over ten years and I’m very excited to share my experience with you. NutriTribe offers customized tailor-made packages to different individuals according to their needs, so whether you’re a new mum or you’d like to heal your chronic illness or you’re in need to lose a few kilos, we have the package for you. We know that there isn’t one diet that fits all, and we are passionate about offering you an array of healthy recipes and meal preparation techniques so that you can save time and make better health choices in the future. We are here to support you throughout your health and wellness journey with easy quick steps, answering all your questions through WhatsApp and Facebook and introducing you to your nutrition community. We can’t wait to start this journey together!
                               She has worked with eating disorders such as bulimia as well. She is also completed a diploma in public health nutrition and has worked with the UNICEF in tackling obesity in Egypt. She has also worked with several multinational companies to help launch healthy products and to improve the nutrition labels of already existing ones.',
            'promise' => 'At NutriTribe we are passionate about tailoring and customizing our different nutrition packages to your individual needs. We believe in meeting you where you are and taking you to where you want to be and that is key in order to embrace a healthy lifestyle by going through the obstacles of the mindset together and gently shifting both attitude and perspective so that you can ROCK your health and nutrition goals.'
        ]);
    }
}
