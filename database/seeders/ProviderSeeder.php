<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = [
            'Telkomsel',
            'Indosat Ooredoo',
            'XL Axiata',
            'AXIS',
            'Smartfren',
        ];

        foreach ($providers as $key => $data) {
            Provider::create([
                'nama' => $data
            ]);
        }
    }
}
