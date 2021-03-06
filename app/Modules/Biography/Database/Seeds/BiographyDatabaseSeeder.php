<?php

namespace App\Modules\Biography\Database\Seeds;

use Illuminate\Database\Seeder;

class BiographyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BiographiesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(SitemapsTableSeeder::class);
        $this->call(RssTableSeeder::class);
        $this->call(SearchListsTableSeeder::class);
    }
}
