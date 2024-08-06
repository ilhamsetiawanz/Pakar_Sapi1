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
     * Display the specified resource.
     */
    public function show(DataGejala $dataGejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataGejala $dataGejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataGejalaRequest $request, DataGejala $dataGejala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataGejala $dataGejala)
    {
        $dataGejala->delete();
        
        return redirect('gejala');
    }
}
