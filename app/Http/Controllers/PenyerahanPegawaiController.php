<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Maset;
use App\Models\PenyerahanPegawai;
use Illuminate\Http\Request;

class PenyerahanPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pwai=PenyerahanPegawai::All();
        return view('PenyerahanPegawai.index', compact('pwai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pwai=PenyerahanPegawai::all();
        $maset = Maset::all();
        $users = user::all();
        return view('PenyerahanPegawai.create', compact('pwai','maset','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'name' => 'required',
            'nama_aset' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',

        ]);
        PenyerahanPegawai::create([
            'tanggal'=> $request->input('tanggal'),
            'name'=> $request->input('name'),
            'nama_aset'=> $request->input('nama_aset'),
            'satuan'=> $request->input('satuan'),
            'jumlah'=> $request->input('jumlah'),
            'kondisi'=>$request->input('kondisi')
        ]);

        return redirect('penyerahanpegawai')->with('success', 'Data Berhasi Disimpan.');
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
        $pwai = PenyerahanPegawai::findOrFail($id);
        $maset = Maset::all();
        $users = user::all();
        return view('PenyerahanPegawai.edit', compact('pwai','maset','users'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'name' => 'required',
            'nama_aset' => 'required',
            'satuan' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',

        ]);
        $pwai=[
            'tanggal'=> $request->input('tanggal'),
            'name'=> $request->input('name'),
            'nama_aset'=> $request->input('nama_aset'),
            'satuan'=> $request->input('satuan'),
            'jumlah'=> $request->input('jumlah'),
            'kondisi'=>$request->input('kondisi')
        ];

        PenyerahanPegawai::where('id',$id)->update($pwai);

        return redirect('penyerahanpegawai')->with('success', 'Data Berhasi Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pwai = PenyerahanPegawai::where('id', $id)->firstOrFail(); {
            $pwai->delete();
            return redirect('penyerahanpegawai')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
