<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use App\Models\Solusi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('pages.admin.Penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.Penyakit.add');
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
        return view('pages.admin.Penyakit.edit', compact('penyakit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyakitRequest $request, Penyakit $penyakit)
    {
        $validator = Validator::make($request->all(), [
            'Penyakit' => 'required',
            'KodePenyakit' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'solusi' => 'required|string',
            'Pencegahan' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($penyakit->image) {
                Storage::delete('public/asset/' . $penyakit->image);
            }
    
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/asset', $image->hashName());
            $imageName = $image->hashName();
        } else {
            // Keep the existing image if no new image is uploaded
            $imageName = $penyakit->image;
        }
    
        // Update penyakit details
        $penyakit->update([
            'Penyakit' => $request->Penyakit,
            'KodePenyakit' => $request->KodePenyakit,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
        ]);
    
        // Check if the penyakit has a solution or create a new one if not
        $penyakit->Solusi()->updateOrCreate(
            ['kd_penyakit' => $penyakit->id], // Condition to check for existing record
            [
                'solusi' => $request->solusi,
                'Pencegahan' => $request->Pencegahan,
            ]
        );
    
        return redirect('penyakit');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();

        return redirect()->route('Penyakit');
    }
}
