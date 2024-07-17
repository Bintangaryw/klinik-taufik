<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function submit(Request $request)
    {
        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->penulis = $request->penulis;
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->route('adminartikel');
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.admineditartikel', compact('artikel'));
    }
    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->judul = $request->judul;
        $artikel->penulis = $request->penulis;
        $artikel->isi = $request->isi;
        $artikel->update();

        return redirect()->route('adminartikel');
    }
    public function delete($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        return redirect('/adminartikel');
    }
}
