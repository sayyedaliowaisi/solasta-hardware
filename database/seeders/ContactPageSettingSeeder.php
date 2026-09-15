<?php

namespace Database\Seeders;

use App\Models\ContactPageSetting;
use Illuminate\Database\Seeder;

class ContactPageSettingSeeder extends Seeder
{
    public function run(): void
    {
        ContactPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'badge' => 'CONTACT US',

                'title' =>
                    'Let’s Discuss Your Hardware Requirement',

                'description' =>
                    'Contact M R Hardware for product availability, model-wise details and enquiries.',

                'form_title' =>
                    'Send Your Enquiry',

                'form_description' =>
                    'Fill in the form and our team can follow up regarding your requirement.',

                'show_map' => false,

                'show_contact_cards' => true,
            ]
        );
    }
}