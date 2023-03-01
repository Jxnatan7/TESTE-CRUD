<?php

namespace Database\Seeders;

use App\Models\Models\ModelBovino;
use Illuminate\Database\Seeder;

class BovinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelBovino::create([
            "peso"=>"234",
            "leiteProduzido"=>"32",
            "racaoConsumida"=>"35",
            "data_nasc"=>"2019-07-07",
            "abatido"=>"0"
        ]);

        ModelBovino::create([
            "peso"=>"372",
            "leiteProduzido"=>"40",
            "racaoConsumida"=>"50",
            "data_nasc"=>"2020-05-05",
            "abatido"=>"0"
        ]);

        ModelBovino::create([
            "peso"=>"334",
            "leiteProduzido"=>"7",
            "racaoConsumida"=>"23",
            "data_nasc"=>"2017-03-07",
            "abatido"=>"0"
        ]);
    }
}
