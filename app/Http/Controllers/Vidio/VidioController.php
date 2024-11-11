<?php

namespace App\Http\Controllers\Vidio;

use App\Http\Controllers\Controller;
use App\Models\Vidio;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    public function index()
    {
        $data = Vidio::first(); // Mendapatkan data video pertama (asumsi hanya satu video yang diperbarui)

        return view('pages.vidio.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Vidio::first(); // Mendapatkan data video pertama (asumsi hanya satu video yang diperbarui)

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|url', // Validasi untuk URL video
        ]);

        // Jika data video ditemukan, lakukan update
        if ($data) {
            $data->update([
                'title' => $request->title,
                'description' => $request->description,
                'url' => $request->url,
            ]);
        } else {
            // Jika data video tidak ditemukan, buat data baru
            Vidio::create([
                'title' => $request->title,
                'description' => $request->description,
                'url' => $request->url,
            ]);
        }

        return redirect()->back()->with('success', 'Video updated successfully');
    }
}
