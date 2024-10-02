<?php

namespace App\Http\Controllers;

use App\Models\Maset;
use App\Models\Mcabang;
use App\Models\Mvendor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maset = Maset::count();
        $masetnilai = Maset::sum('harga_total');
        $vendor = Mvendor::count();
        $user = User::count();
        $cabang = Mcabang::count();
        return view('dashboard', compact('maset','masetnilai','vendor','user','cabang') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
