<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Lomba KIR Tingkat Provinsi',
            'date' => Carbon::now()->addDays(5),
            'description' => 'LKIR atau Lomba Karya Ilmiah Remaja merupakan kegiatan tahunan yang diselenggarakan oleh Lembaga Ilmu Pengetahuan Indonesia (LIPI) sejak tahun 1969. Kegiatan ini bertujuan memotivasi generasi muda, khususnya para pelajar di seluruh Indonesia, untuk melakukan kegiatan penelitian mandiri.

            Setiap tahunnya, dari ratusan karya ilmiah yang masuk ditetapkan beberapa karya ilmiah sebagai finalis untuk dipresentasikan di depan dewan juri di LIPI Jakarta. Kategori karya ilmiah meliputi semua bidang ilmu, dari budaya sampai dengan ilmu alam dan rekayasa teknologi. Sampai saat ini tercatat puluhan ribu finalis LKIR (22.764 finalis pada tahun 1998).
            
            Situs ini ditujukan untuk menghimpun aneka informasi terkait dengan alumni finalis LKIR LIPI. Meski saat ini belum lengkap, secara bertahap akan terus dilengkapi dan dikembangkan sesuai dengan kebutuhan. Situs ini diawali oleh salah satu alumni yaitu Adhi S. Soembagijo pada tanggal 1 Juli 1995. Sesuai dengan sifat organisasi ini yang berupa organisasi maya, maka sejauh ini tidak diadakan pengurus maupun aneka regulasi.
            
            Bagi Anda yang ingin mengetahui informasi terkini mengenai LKIR dan aneka kompetisi ilmiah yang diselenggarakan LIPI, silahkan langsung mengakses halaman PENGUMUMAN di situs Kompetisi Ilmiah LIPI',
            'price' => 150000,
        ];
        
        Event::create($data);
    }
}
