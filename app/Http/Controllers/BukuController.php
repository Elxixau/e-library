<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{   
    function filter(Request $request){
        $searchTerm = $request->input('search');
        $buku = Buku::where('judul', 'LIKE', "%$searchTerm%")
                    ->orWhere('penulis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('kategori', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $searchTerm . '%')
                    ->paginate(10); // Sesuaikan jumlah data yang ingin ditampilkan per halaman
        return view('dashboard/buku', compact('buku', 'searchTerm'));
    }

    function create()
    {
        $kategoriOptions = [
            'Fiksi',
            'Non-Fiksi',
            'Pendidikan',
            'Sains',
            'Teknologi',
            'Reliji',
            'Anime',
            'Seni',
        ];
    
        $buku = Buku::all(); 
        return view('dashboard/upload', compact('kategoriOptions'));
    }

    function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori' => 'array|min:1',
            'pdf_path' => 'required|url',
            'gambar_sampul_url' => 'required|url', 
        ]);

        $kategoriCheckbox = $request->input('kategori', []);

        $kategoriLain = $request->input('kategori_lain');

        if (!empty($kategoriLain)) {
            $kategoriCheckbox[] = $kategoriLain;
        }

        $kategoriString = implode(', ', $kategoriCheckbox);
        
        $buku = new Buku([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'kategori' => $kategoriString,
            'pdf_path' => $request->input('pdf_path'),
            'gambar_sampul' => $request->input('gambar_sampul_url'), // Gunakan URL langsung
        ]);

        $buku->save();

        return redirect()->route('admin')->with('success', 'Buku berhasil diunggah.');
    }

    function edit($id)
    {   
        $buku = Buku::findOrFail($id);
        $kategoriOptions = [
            'Fiksi',
            'Non-Fiksi',
            'Pendidikan',
            'Sains',
            'Teknologi',
            'Reliji',
            'Anime',
            'Seni',
        ];

        $kategoriBuku = is_array($buku->kategori) ? $buku->kategori : [];
       
        return view('dashboard/edit', compact('buku', 'kategoriOptions', 'kategoriBuku')); // Menampilkan tampilan edit dengan data buku
    }

   function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori' => 'array',
        ]);

        $buku = Buku::findOrFail($id);

        // Ambil kategori yang dipilih dari checkbox
        $kategoriCheckbox = $request->input('kategori', []);

        // Ambil kategori lain dari input teks
        $kategoriLain = $request->input('kategori_lain');

        // Jika kategori lain diinput, tambahkan ke array kategori
        if (!empty($kategoriLain)) {
            $kategoriCheckbox[] = $kategoriLain;
        }

        // Konversi array kategori menjadi string dengan koma sebagai pemisah
        $kategoriString = implode(', ', $kategoriCheckbox);

        // Update data buku dengan data baru, termasuk kategori yang sudah dikonversi
        $buku->update([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'kategori' => $kategoriString,
        ]);

        return redirect()->route('buku')->with('success', 'Buku berhasil diperbarui.');
    }
    
    function search(Request $request)
    {
    $searchTerm = $request->input('search');

    $books = Buku::where(function ($query) use ($searchTerm) {
        $query->where('judul', 'like', '%' . $searchTerm . '%')
              ->orwhere('penulis', 'like', '%' . $searchTerm . '%')
              ->orwhere('kategori', 'like', '%' . $searchTerm . '%');
    })->get();    

    return view('books/hasil', compact('books', 'searchTerm'));
    }

    function download($id)
    {
    $buku = Buku::findOrFail($id);

    $pdfUrl = $buku->pdf_path;

    return redirect($pdfUrl);
    }


    function cari()
    {   
    $buku = Buku::all(); 
    return view('layouts.search', compact('buku')); 
    }

    function destroy($id)
    {
    $buku = Buku::findOrFail($id);

    // Delete the book record from the database
    $buku->delete();

    return redirect()->route('buku')->with('success', 'Buku berhasil dihapus.');
    }


}
