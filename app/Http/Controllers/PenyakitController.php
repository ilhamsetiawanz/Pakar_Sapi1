<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use App\Models\Solusi;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('penyakit.index', compact('penyakit'));
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
    public function store(StorePenyakitRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'Penyakit' => 'required',
            'KodePenyakit' => 'required',
            'deskripsi' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'solusi' => 'required|string',
            'Pencegahan' => 'required|string',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/asset', $image->hashName());

        $penyakit = Penyakit::create([
            'Penyakit' => $request->Penyakit,
            'KodePenyakit' => $request->KodePenyakit,
            'image' => $image->hashName(),
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Simpan solusi terkait penyakit
        $solusi = new Solusi([
            'solusi' => $request->solusi,
            'Pencegahan' => $request->Pencegahan,
        ]);
    
        $penyakit->Solusi()->save($solusi);

        return redirect('penyakit');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyakitRequest $request, Penyakit $penyakit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        //
    }
}
