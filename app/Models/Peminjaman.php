<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class, 'book_id');
    }

    // Fix: set table name to match migration
    protected $table = 'peminjamen';

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'queue_number',
    ];
}
