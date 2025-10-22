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
                'judul' => 'Inequity Under the Skies of Lumina',
                'pengarang' => 'Farrel A. Fabian',
                'kategori' => 'Fantasy',
                'sinopsis' => 'Di negeri Lumina, dua ras hidup dalam ketimpangan — manusia biasa yang berkuasa dan manusia sihir yang ditindas. Seorang anak bernama Ravel tanpa sengaja mengungkap kekuatan terlarangnya, memaksanya melarikan diri dari dunia yang menolak dirinya. Di tengah keputusasaan, ia bertemu seorang penyihir misterius yang mengubah jalan hidupnya. Saat Ravel tumbuh dewasa dan menatap masa lalunya yang kelam, ia bertekad menentang ketidakadilan yang telah lama membelenggu negerinya.
                Namun, mampukah Ravel menghadapi kekuatan tirani yang menguasai Lumina dan menemukan arti sebenarnya dari kekuatan yang ia miliki?',
                'stok' => 1
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
