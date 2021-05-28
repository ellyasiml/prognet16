<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http ::withHeaders([
            'key'=>'276608483cd4ba62f8bb72239c56a647'
        ])->get('https://api.rajaongkir.com/starter/province');
        $provincies = $response['rajaongkir']['results'];
        foreach ($provincies as $provincie){
            $data_province[]=[
                'id' => $provincie['province_id'],
                'provincie' => $provincie ['province']
            ];
        }
        Province::insert($data_province);
    }
}
