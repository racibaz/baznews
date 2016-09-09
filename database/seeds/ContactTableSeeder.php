<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'contact_type_id'       => 1,
            'full_name'             => 'isim',
            'subject'               => 'konu',
            'content'               => 'içerik',
            'email'                 => 'mail adress',
            'phone'                 => '11111111111',
            'is_read'               => 0,
            'IP'                    => '121212121',
        ]);
    }
}
