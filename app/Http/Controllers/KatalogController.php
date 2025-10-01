<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        if ($request->search) {
            $query->where('judul', 'like', '%'.$request->search.'%')
                  ->orWhere('pengarang', 'like', '%'.$request->search.'%')
                  ->orWhere('kategori', 'like', '%'.$request->search.'%');
        }
        $books = $query->get();
        return view('katalog.index', compact('books'));
    }
}
