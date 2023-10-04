<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view("profile.resep",compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("profile.tulisresep");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_resep' => 'required',
            'deskripsi_resep' => 'required',
            'porsi' => 'required',
            'lama_memasak' => 'required',
            'bahan_bahan' => 'required',
            'langkah_langkah' => 'required',
            'gambar' => 'image|file|max:1024',
        ]);
        
        $resep = new Recipe();
        $resep->author_id = $request->author_id;
        $resep->judul_resep = $request->judul_resep;
        $resep->deskripsi_resep = $request->deskripsi_resep;
        $resep->porsi = $request->porsi;
        $resep->lama_memasak = $request->lama_memasak;
        $resep->bahan_bahan = $request->bahan_bahan;
        $resep->langkah_langkah = $request->langkah_langkah;
        if($request->file('gambar')) {
            $resep->gambar = $request->file('gambar')->store('gambar_resep');
        }
      
        $resep->save();

        return redirect('/resep')->with('success','Resep Anda Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
