<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Hambúrguer completo',
                'image' => 'https://www.hydealimentos.com.br/wp-content/uploads/2019/11/Hamburguer_de_Tofu_com_Carne_Moida-500x500.jpg'
            ],
            [
                'title' => 'Pizza calabresa',
                'image' => 'https://www.hydealimentos.com.br/wp-content/uploads/2019/11/Hamburguer_de_Tofu_com_Carne_Moida-500x500.jpg'
            ],
            [
                'title' => 'Cuscuz',
                'image' => 'https://www.saborbrasil.it/wp-content/uploads/2021/06/Cuscuz-nordestino-768x576.jpg'
            ],
            [
                'title' => 'Tapioca saborosa',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZGpjlzxufX1OXprJQVNQTsI4gdhJxoXNytGUD1daxPh8sFgXkRR2xwsl2&s=10'
            ],
            [
                'title' => 'Panelada',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGGDWaMOvwTsFf0oT-RKaroooE9GxpRevYq24pj--JOQS2Eqkp6_qEr9Kf&s=10'
            ],
            [
                'title' => 'Refrigerante de caju',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0bNzLIEErU8jO1iixj27ZOw8vprYV7uboZA&usqp=CAU'
            ],
            [
                'title' => 'Café',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6WdiknIXJGYekbrdTtVSIXDqvXpb7YP9_VA&usqp=CAU'
            ],
            [
                'title' => 'Bolo de chocolate',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVMey9f790xKjkpQV_uAnQMi0ucxvQwcEBOTQhogmcjkkr5h48CFQvQ4lL&s=10'
            ],
            [
                'title' => 'Suco de maracujá',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbjgSvHS7OpJDRntqdFTVWQDh4eehKXnwXig&usqp=CAU'
            ],
            [
                'title' => 'Pão francês',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKvS9j0kRYOK9-GSW1IIVB5wbtfMLOvrltt8_aV1Wb6MP50uSBxe6FNka-&s=10'
            ]
        ];


        foreach ($data as $key => $value) {
            $data[$key]['created_at'] = Carbon::now();
            $data[$key]['updated_at'] = Carbon::now();
        }

        DB::table('foods')->insert($data);
    }
}
