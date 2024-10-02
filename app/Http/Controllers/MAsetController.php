<?php

namespace App\Http\Controllers;


use App\Models\Maset;
use App\Models\Mvendor;
use Illuminate\Http\Request;

class MAsetController extends Controller
{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $maset=Maset::All();
        return view('MAset.index', compact('maset'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = Mvendor::all();
        $nextCode = Maset::generateNextCode(); // Menampilkan kode berikutnya

        return view('MAset.create', compact('nextCode','vendor'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);
        $idaset = Maset::generateNextCode();
        $hargaTotal = $request->input('jumlah') * $request->input('harga_satuan');

        Maset::create([
            'tanggal' => $request->input('tanggal'),
            'id_aset' => $idaset,
            'nama_aset' => $request->input('nama_aset'),
            'kategori' => $request->input('kategori'),
            'nama_vendor' => $request->input('nama_vendor'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'harga_satuan' => $request->input('harga_satuan'),
            'harga_total'=> $hargaTotal,

        ]);

        return redirect('maset')->with('success', 'Data Berhasi Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maset = Maset::findOrFail($id);
        $vendor = Mvendor::all();
        return view('MAset.edit',compact('maset','vendor'));
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);

        $hargaTotal = $request->input('jumlah') * $request->input('harga_satuan');

        $maset =[
            'tanggal' => $request->input('tanggal'),
            'nama_aset' => $request->input('nama_aset'),
            'kategori' => $request->input('kategori'),
            'nama_vendor' => $request->input('nama_vendor'),
            'satuan' => $request->input('satuan'),
            'jumlah' => $request->input('jumlah'),
            'harga_satuan' => $request->input('harga_satuan'),
            'harga_total'=> $hargaTotal,
        ];
        
        Maset::where('id',$id)->update($maset);

        return redirect('maset')->with('success', 'Data Berhasi Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maset = Maset::where('id', $id)->firstOrFail(); {
            $maset->delete();
            return redirect('maset')->with('success', 'Data Berhasi Dihapus.');
        }
    }
    

    
}
