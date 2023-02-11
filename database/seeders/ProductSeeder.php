<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterData\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'One Piece 100',
                'description' => 'One Piece merupakan salah satu manga yang sudah berjalan sangat lama sejak tahun 1997. Petualangan kru bajak laut Luffy sudah berjalan selama hampir 25 tahun dan baru-baru ini, Elex Media Komputindo selaku penerbit One Piece di Indonesia baru saja menerbitkan volume ke-100 dari One Piece!',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Funiculi Funicula : Kisah-Kisah Yang Baru Terungkap',
                'description' => 'Funiculi Funicula adalah sebuah kafe yang bertempat di salah satu gang sempit di Tokyo. Kafe ini bukan kafe yang biasa karena para pelanggan yang ada di sana memiliki kesempatan untuk memutar waktu ke masa lalu atau masa depan dengan duduk di salah satu kursinya. Dengan mengikuti aturan yang diberikan, para pelanggan bisa bertemu dengan seseorang yang sangat ingin mereka temui di masa yang diinginkan.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Melangkah',
                'description' => 'Empat sahabat baru saja mendarat di kota Sumba saat mereka menyaksikan listrik di seluruh Jawa dan Bali tiba-tiba padam! Mereka berempat tidak menyangka kalau nasib banyak orang akan berada di tangan mereka karena mereka harus menghadapi pasukan berkuda yang bisa mengalirkan listrik.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Marple: Twelve New Stories',
                'description' => 'Jane Marple, atau yang lebih dikenal dengan sebutan Miss Marple adalah karakter yang muncul di seri novel misteri Agatha Christie. Ia pertama muncul di cerita pendek yang diterbitkan pada tahun 1927 dan pertama muncul di novel Pembunuhan di Wisma Pendeta. Di umurnya yang sudah tua, ia merupakan seorang detektif yang sangat hebat dengan memecahkan kasus yang terbilang sulit. Ia bahkan memiliki kemampuan hebat lainnya, yaitu ia dapat mengaitkan komentar kasual dengan kasus yang tidak ia tangani.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Spy x Family 07',
                'description' => 'Operasi Strix berlanjut! Operasi penting untuk perdamaian Westalis dan Ostania ini sepertinya mulai berjalan mulus karena Twilight akhirnya berhasil memiliki kontak langsung dengan target mereka, Donovan Desmond. Walau berhasil kontak, ia tetap harus menjalankan rencana lainnya dari operasi Strix. Apakah perdamaian Westalis dan Ostania semakin dekat? Baca komiknya untuk mengetahuinya!',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ensiklopedia Anak Hebat Negara',
                'description' => 'Anak kecil cenderung gampang bosan saat sedang belajar dan malas belajar sejak dini. Hal ini jelas bukan hal yang diinginkan oleh para orang tua, yang pastinya ingin anak kesayangannya tumbuh besar dan menjadi anak cerdas. Para orang tua bisa menarik para anak-anak belajar dengan memberikan buku-buku yang pastinya akan menarik dilihat oleh para anak-anak.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Era Baru Batubara Indonesia',
                'description' => 'Penggunaan energi fosil di Indonesia sudah digunakan sejak dulu dan bergantung pada energi itu. Penggunaannya membuat Indonesia menjadi salah satu penyebab kenaikan suhu bumi yang mengakibatkan pemanasan global. Pemerintah pun akhirnya memutuskan untuk mengurangi penggunaan energi fosil, salah satunya dengan pengembangan Energi Baru dan Terbarukan. Langkah ini diambil dengan harapan Indonesia mencapai nol emisi karbon.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Menjadi: Seni Membangun Kesadaran tentang Diri dan Sekitar',
                'description' => 'Kemampuan berpikir adalah sebuah perjalanan yang akan menumbuhkan pemahaman tentang diri, kemampuan memecahkan masalah, terbuka terhadap pemikiran baru, dan memiliki empati yang lebih baik dengan manusia lain.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Secrets of a Divine Love: A Spiritual Journey into the Heart of Islam',
                'description' => 'Sebagai seorang manusia, mungkin pernah muncul pertanyaan di benak, “Kenapa saya dilahirkan?”, “Saya ini orang yang tidak berguna”, atau bahkan ketidakyakinan kepada Tuhan dan tidak dapat mencintai Tuhan Yang Maha Esa.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'The Design Thinking Playbook',
                'description' => 'Dalam melakukan pekerjaan, akan ada waktu ketika muncul masalah yang kemungkinan membutuhkan penyelesaian rumit. Di saat itulah ada bagusnya memiliki pemikiran desain. Pemikiran desain adalah metode berpikir yang berpusat pada masalah manusia dengan solusi yang diharapkan dapat menjadi inovasi untuk pengembangan lebih baik.',
                'enable' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
