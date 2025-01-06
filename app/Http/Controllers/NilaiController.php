<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get all nilais
        $nilais = Nilai::paginate(10);

        //render view with nilais
        return view('nilais.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('nilais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse   
    {
        // dd($request->all());
        
        //create nilai
        Nilai::create([
            'matematika'    =>$request->matematika,
            'fisika'        =>$request->fisika,
            'biologi'       =>$request->biologi,
            'kimia'         =>$request->kimia,
            'akutansi'      =>$request->akutansi,
        ]);

        //redirect type
        return redirect()->route('nilais.index')->with(['success'=> 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
         //get nilai by ID
         $nilai = Nilai::findOrFail($id);

         //render view with nilai
         return view('nilais.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get nilai by ID
        $nilai = Nilai::findOrFail($id);

        //render view with nilai
        return view('nilais.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNilaiRequest $request, $id): RedirectResponse
    {
        
        //get nilai by ID
        $nilai = Nilai::findOrFail($id);

        //update nilai
        $nilai->update([
            'matematika'    =>$request->matematika,
            'fisika'        =>$request->fisika,
            'biologi'       =>$request->biologi,
            'kimia'         =>$request->kimia,
            'akutansi'      =>$request->akutansi,
        ]);

        return redirect()->route('nilais.index')->with(['success'=> 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get nilai by ID
        $nilai = Nilai::findOrFail($id);

        //delete nilai
        $nilai->delete();

        //redirect to index
        return redirect()->route('nilais.index')->with(['success'=> 'Data Berhasil Dihapus!']);
    }
}
