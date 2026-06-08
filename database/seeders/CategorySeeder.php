<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Infrastruktur',
                'description' => 'Laporan terkait jalan rusak, jembatan, lampu jalan, dan fasilitas fisik umum lainnya.',
            ],
            [
                'name' => 'Kebersihan & Lingkungan',
                'description' => 'Laporan terkait tumpukan sampah, saluran air tersumbat, pencemaran lingkungan, dll.',
            ],
            [
                'name' => 'Keamanan & Ketertiban',
                'description' => 'Laporan terkait gangguan keamanan, kriminalitas, ketertiban umum, dan konflik sosial.',
            ],
            [
                'name' => 'Pelayanan Publik',
                'description' => 'Laporan terkait kualitas pelayanan administrasi dan birokrasi di tingkat wilayah.',
            ],
            [
                'name' => 'Kesehatan',
                'description' => 'Laporan terkait fasilitas kesehatan, posyandu, puskesmas, kebersihan sanitasi, dan wabah.',
            ],
            [
                'name' => 'Pendidikan',
                'description' => 'Laporan terkait fasilitas sekolah, beasiswa, sarana prasarana belajar, dan kegiatan pendidikan.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
