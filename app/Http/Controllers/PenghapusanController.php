<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maset;
use App\Models\penghapusan;


class PenghapusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghapusan = penghapusan::all();
        return view('Penghapusan.index',compact('penghapusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penghapusan = penghapusan::all();
        $maset = Maset::all();
        return view('Penghapusan.create', compact('penghapusan','maset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal'=>'required',
            'nama_aset' => 'required|exists:masets,id',
            'jumlah_hapus' => 'required|numeric|min:1',
            'kondisi' => 'required',
        ]);

        // Ambil data aset berdasarkan id yang dipilih
        $maset = Maset::findOrFail($request->input('nama_aset'));

        // Validasi jumlah yang akan dihapus
        if ($request->input('jumlah_hapus') > $maset->jumlah) {
            return redirect()->route('Penghapusan.create')->with('error', 'Jumlah yang dihapus melebihi jumlah yang tersedia.');
        }

        Penghapusan::create([
            'tanggal'=>$request->input('tanggal'),
            'nama_aset' => $request->input('nama_aset'),
            'jumlah_hapus' => $request->input('jumlah_hapus'),
            'kondisi' => $request->input('kondisi'),
            'keterangan' => $request->input('keterangan'),
        ]);

        // Kurangkan jumlah aset dalam tabel data aset
        $maset->update(['jumlah' => $maset->jumlah - $request->input('jumlah_hapus')]);

        return redirect('penghapusan')->with('success', 'Penghapusan aset berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penghapusan = penghapusan::findOrFail($id);
        $maset = Maset::all();
        return view('Penghapusan.edit', compact('penghapusan','maset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal'=>'required',
            'nama_aset' => 'required|exists:masets,id',
            'jumlah_hapus' => 'required|numeric|min:1',
            'kondisi' => 'required',
        ]);

        // Ambil data aset berdasarkan id yang dipilih
        $maset = Maset::findOrFail($request->input('nama_aset'));

        // Validasi jumlah yang akan dihapus
      
        $penghapusan=[
            'tanggal'=>$request->input('tanggal'),
            'nama_aset' => $request->input('nama_aset'),
            'jumlah_hapus' => $request->input('jumlah_hapus'),
            'kondisi' => $request->input('kondisi'),
            'keterangan' => $request->input('keterangan'),
        ];
        penghapusan::where('id',$id)->update($penghapusan);

        // Kurangkan jumlah aset dalam tabel data aset
        $maset->update(['jumlah' => $maset->jumlah - $request->input('jumlah_hapus')]);

        return redirect('penghapusan')->with('success', 'Ubah Penghapusan aset berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penghapusan = penghapusan::where('id', $id)->firstOrFail(); {
            $penghapusan->delete();
            return redirect('penghapusan')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
