<?php

namespace App\Http\Controllers;

use App\Models\DataGejala;

use App\Http\Requests\StoreDataGejalaRequest;
use App\Http\Requests\UpdateDataGejalaRequest;
use Illuminate\Support\Facades\Validator;

class DataGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataGejala = DataGejala::all();
    
        return view('pages.admin.Gejala.index',[
            'gejalas' => $dataGejala
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('pages.admin.Gejala.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataGejalaRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'KodeGejala' => 'required',
            'NamaGejala' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gejalas = DataGejala::create([
            'KodeGejala' => $request->KodeGejala,
            'NamaGejala' => $request->NamaGejala,
        ]);

        return redirect('gejala');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataGejala $dataGejala)
    {
        return response()->view('pages.admin.Gejala.edit', compact('dataGejala'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataGejalaRequest $request, DataGejala $dataGejala)
    {
        $validator = Validator::make($request->all(), [
            'KodeGejala' => 'required',
            'NamaGejala' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dataGejala->update([
            'KodeGejala' => $request->KodeGejala,
            'NamaGejala' => $request->NamaGejala,
        ]);

        return redirect('gejala');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataGejala $dataGejala)
    {
        // Menghapus aturan yang berelasi
        $dataGejala->aturan()->delete();
    
        // Menghapus DataGejala
        $dataGejala->delete();
        
        return redirect('gejala')->with('success', 'Data gejala dan aturan yang terkait telah dihapus.');
    }     
}
