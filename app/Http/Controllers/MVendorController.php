<?php

namespace App\Http\Controllers;

use App\Models\Mvendor;
use Illuminate\Http\Request;

class MVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mvendor=Mvendor::All();

        return view('MVendor.index', compact('mvendor'), [
            "title" => "Master vendor"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MVendor.create', [
            'title'=> "Tambah Data"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mvendor = new Mvendor();
        $mvendor->nama_vendor = $request->nama_vendor;
        $mvendor->nama_principalsales = $request->nama_principalsales;
        $mvendor->nomorhp = $request->nomorhp;
        $mvendor->alamat = $request->alamat;

        $mvendor->save();

        return redirect('mvendor')->with('success', 'Data Berhasi Disimpan.');
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
        $mvendor = Mvendor::findOrFail($id); 
            return view('MVendor.edit',compact('mvendor'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama_vendor'=> 'required',
            'nama_principalsales'=> 'required',
            'nomorhp'=>'required',
            'alamat'=>'required'
        ]);

        $mvendor=[
            'nama_vendor' => $request->input('nama_vendor'),
            'nama_principalsales' => $request->input('nama_principalsales'),
            'nomorhp' => $request->input('nomorhp'),
            'alamat' => $request->input('alamat'),
        ];
        Mvendor::where('id',$id)->update($mvendor);
        return redirect('mvendor')->with('success', 'Data Berhasi Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mvendor = Mvendor::where('id', $id)->firstOrFail(); {
            $mvendor->delete();
            return redirect('mvendor')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
