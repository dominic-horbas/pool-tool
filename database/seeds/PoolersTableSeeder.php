<?php

use Illuminate\Database\Seeder;
use App\Pooler;

class PoolersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poolers')->delete();
        Pooler::create(['name' => 'Alex']);
        Pooler::create(['name' => 'Ced']);
        Pooler::create(['name' => 'Dom']);
        Pooler::create(['name' => 'K7']);
        Pooler::create(['name' => 'Brek']);
        Pooler::create(['name' => 'JD']);
        Pooler::create(['name' => 'Jubin']);
        Pooler::create(['name' => 'Gil']);
        Pooler::create(['name' => 'Martin']);
        Pooler::create(['name' => 'Joe']);
        Pooler::create(['name' => 'Denis']);
    }
}
