<?php

namespace App\Http\Controllers;

use App\Models\Maset;
use App\Models\Mcabang;
use Illuminate\Http\Request;
use App\Models\penyerahancabang;

class PenyerahanCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pucab=penyerahancabang::All();
        return view('PenyerahanCabang.index', compact('pucab'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pucab=penyerahancabang::all();
        $maset = Maset::all();
        $mcabang = Mcabang::all();
        return view('PenyerahanCabang.create', compact('pucab','maset','mcabang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_cabang' => 'required',
            'nama_aset' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',

        ]);
        penyerahancabang::create([
            'tanggal'=> $request->input('tanggal'),
            'nama_cabang'=> $request->input('nama_cabang'),
            'nama_aset'=> $request->input('nama_aset'),
            'satuan'=> $request->input('satuan'),
            'jumlah'=> $request->input('jumlah'),
            'kondisi'=>$request->input('kondisi')
        ]);

        return redirect('penyerahancabang')->with('success', 'Data Berhasi Disimpan.');
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
        $pucab = penyerahancabang::findOrFail($id);
        $maset = Maset::all();
        $mcabang = Mcabang::all();
        return view('PenyerahanCabang.edit', compact('pucab','maset','mcabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_cabang' => 'required',
            'nama_aset' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',

        ]);
        $pucab=[
            'tanggal'=> $request->input('tanggal'),
            'nama_cabang'=> $request->input('nama_cabang'),
            'nama_aset'=> $request->input('nama_aset'),
            'satuan'=> $request->input('satuan'),
            'jumlah'=> $request->input('jumlah'),
            'kondisi'=>$request->input('kondisi')
        ];

        penyerahancabang::where('id',$id)->update($pucab);

        return redirect('penyerahancabang')->with('success', 'Data Berhasi Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pucab = penyerahancabang::where('id', $id)->firstOrFail(); {
            $pucab->delete();
            return redirect('penyerahancabang')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
