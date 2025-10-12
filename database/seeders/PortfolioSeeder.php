<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'id_user' => '1',
            'title' => 'test title',
            'kategori' => 'terserah',
            'gambar'=> 'portfolio.jpg',
        ]);
            
        
    }
}
