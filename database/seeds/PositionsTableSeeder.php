<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('positions')->delete();
        Position::create(['name' => 'Attquant']);
        Position::create(['name' => 'Défenseur']);
    }
}
