<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use App\Models\Mcabang;
use Illuminate\Support\Facades\Validator;


class MCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabang=Mcabang::All();
        return view('MCabang.index', compact('cabang'), [
            "title" => "Master Cabang"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MCabang.create');
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'nama_cabang'=> 'required',
        'alamat'=>'required'
       ]);
       Mcabang::create([
        'nama_cabang'=>$request->input('nama_cabang'),
        'alamat'=>$request->input('alamat'),
       ]);
      
       return redirect('mcabang')->with('success', 'Data Berhasil Disimpan');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cabang = Mcabang::findOrFail($id);
        return view('MCabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cabang' => 'required|string',
            'alamat' => 'required|string',
        ]);
        $cabang=[
            'nama_cabang'=> $request->input('nama_cabang'),
            'alamat'=> $request->input('alamat'),
        ];

        Mcabang::where('id',$id)->update($cabang);

        return redirect('mcabang')->with('success', 'Data Berhasi Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabang = Mcabang::where('id', $id)->firstOrFail(); {
            $cabang->delete();
            return redirect('mcabang')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
