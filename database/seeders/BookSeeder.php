<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Atomic Habits',
                'pengarang' => 'James Clear',
                'kategori' => 'Pengembangan Diri',
                'sinopsis' => 'Perubahan kecil yang memberikan hasil luar biasa. Buku ini membahas bagaimana kebiasaan kecil dapat membawa perubahan besar dalam hidup Anda melalui sistem yang praktis dan terbukti.',
                'stok' => 5
            ],
            [
                'judul' => 'Rich Dad Poor Dad',
                'pengarang' => 'Robert T. Kiyosaki',
                'kategori' => 'Keuangan',
                'sinopsis' => 'Pelajaran keuangan penting yang diajarkan orang kaya kepada anak-anak mereka yang tidak diajarkan orang miskin dan kelas menengah kepada anak-anak mereka.',
                'stok' => 3
            ],
            [
                'judul' => 'Filosofi Teras',
                'pengarang' => 'Henry Manampiring',
                'kategori' => 'Filsafat',
                'sinopsis' => 'Pengenalan filsafat Stoa yang memberi cara praktis untuk mengatasi kecemasan dan overthinking dalam kehidupan sehari-hari.',
                'stok' => 4
            ],
            [
                'judul' => 'Laut Bercerita',
                'pengarang' => 'Leila S. Chudori',
                'kategori' => 'Novel',
                'sinopsis' => 'Novel yang mengisahkan tentang aktivis yang hilang pada masa Orde Baru, menggambarkan periode kelam dalam sejarah Indonesia.',
                'stok' => 3
            ],
            [
                'judul' => 'Sebuah Seni untuk Bersikap Bodo Amat',
                'pengarang' => 'Mark Manson',
                'kategori' => 'Pengembangan Diri',
                'sinopsis' => 'Pendekatan berani dan pragmatis untuk hidup bahagia dengan menerima keterbatasan diri dan berhenti memaksakan kesempurnaan.',
                'stok' => 5
            ],
            [
                'judul' => 'Dunia Sophie',
                'pengarang' => 'Jostein Gaarder',
                'kategori' => 'Filsafat',
                'sinopsis' => 'Perjalanan Sophie dalam memahami filsafat melalui surat-surat misterius yang mengajarkan berbagai konsep filosofis.',
                'stok' => 2
            ],
            [
                'judul' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'pengarang' => 'Yuval Noah Harari',
                'kategori' => 'Sejarah',
                'sinopsis' => 'Perjalanan epik umat manusia dari spesies yang tidak signifikan menjadi penguasa planet bumi.',
                'stok' => 4
            ],
            [
                'judul' => 'Bicara Itu Ada Seninya',
                'pengarang' => 'Oh Su Hyang',
                'kategori' => 'Komunikasi',
                'sinopsis' => 'Panduan praktis untuk berkomunikasi dengan efektif dan membangun hubungan yang lebih baik dengan orang lain.',
                'stok' => 6
            ],
            [
                'judul' => 'Mindset: The New Psychology of Success',
                'pengarang' => 'Carol S. Dweck',
                'kategori' => 'Psikologi',
                'sinopsis' => 'Bagaimana cara berpikir kita dapat mempengaruhi kesuksesan dalam berbagai aspek kehidupan.',
                'stok' => 3
            ],
            [
                'judul' => 'Berani Tidak Disukai',
                'pengarang' => 'Ichiro Kishimi & Fumitake Koga',
                'kategori' => 'Psikologi',
                'sinopsis' => 'Dialog filosofis yang mengajarkan keberanian untuk hidup bebas dan bahagia berdasarkan psikologi Adler.',
                'stok' => 5
            ]
        ];
        
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
