<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //get all siswas
        $siswas = Siswa::paginate(10);

        //render view with siswas
        return view('siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('siswas.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request): RedirectResponse    
    {

        //create image
        $image = $request->file('image');
        $image->storeAs('public/siswa', $image->hashName());

        //create siswa
        Siswa::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get siswa by id
        $siswa = Siswa::findOrFail($id);

        //render view with siswa
        return view('siswas.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get siswa by id
        $siswa = Siswa::findorFail($id);

        //render view with siswa
        return view('siswas.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, $id): RedirectResponse
    {
        
        //get siswa by id
        $siswa = Siswa::findorFail($id);

        //check if image upload
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/siswa', $image->hashName());

            //delete old image
            Storage::delete('public/siswa/' . $siswa->image);

            //update siswa with new image
            $siswa->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address
            ]);

        } else {
            //update siswa without image
        $siswa->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        }
        
        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get siswa by id
        $siswa = Siswa::findorFail($id);

        //delete image
        Storage::delete('public/siswa/' . $siswa->image);

        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
} 