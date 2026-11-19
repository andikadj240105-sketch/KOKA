<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'nama' => 'Kosan jek',
                'deskripsi' => 'Layanan antar jemput cepat dan aman.',
                'is_active' => true,
                'total_order' => 12540,
            ],
            [
                'nama' => 'Kosan Move',
                'deskripsi' => 'Pengiriman paket dan dokumen.',
                'is_active' => true,
                'total_order' => 8230,
            ],
            [
                'nama' => 'Kosan Clean',
                'deskripsi' => 'Jasa pembersihan kamar kos.',
                'is_active' => true,
                'total_order' => 4500,
            ],
            [
                'nama' => 'Kosan Fix',
                'deskripsi' => 'Perawatan & perbaikan fasilitas kos.',
                'is_active' => true,
                'total_order' => 15420,
],
            [
                'nama' => 'Kosan Laundry',
                'deskripsi' => 'Jasa cuci dan setrika pakaian.',
                'is_active' => true,
                'total_order' => 6100,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
