<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Organizacja ceremonii pogrzebowej',
                'opis' => 'Pełne zaplanowanie i przeprowadzenie ceremonii pogrzebowej zgodnie z życzeniami rodziny.',
                'price' => 1500.00,
            ],
            [
                'name' => 'Transport zwłok',
                'opis' => 'Transport zwłok z miejsca zgonu do domu pogrzebowego lub miejsca pochówku.',
                'price' => 500.00,
            ],
            [
                'name' => 'Kremacja',
                'opis' => 'Przeprowadzenie procesu kremacji zwłok.',
                'price' => 800.00,
            ],
            [
                'name' => 'Zakup trumny',
                'opis' => 'Dostarczenie i sprzedaż trumny na cele pogrzebowe.',
                'price' => 1000.00,
            ],
            [
                'name' => 'Usługi florystyczne',
                'opis' => 'Dostarczenie kwiatów i dekoracji na ceremonię pogrzebową.',
                'price' => 300.00,
            ],
            [
                'name' => 'Zakup nagrobka',
                'opis' => 'Dostarczenie i sprzedaż nagrobka lub pomnika na cmentarz.',
                'price' => 2000.00,
            ],
        ]);
    }
}
