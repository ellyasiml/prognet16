lg<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\City;

class CitySeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/city');
        $cities = $response['rajaongkir']['results'];
        foreach ($cities as $city){
            $data_city[]=[
                'id' => $city['city_id'],
                'province_id' => $city ['province_id'],
                'city_name' => $city ['city_name'],
                'type' => $city ['type'],
                'postal_code' => $city ['postal_code']
            ];
        }
        City::insert($data_city);
    }
}
