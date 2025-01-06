<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ReporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get all reporters
        $reporters = Reporter::paginate(10);

        //return view with reporters
        return view('reporters.index', compact('reporters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('reporters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/reporters', $image->hashName());

        //create reporter
        Reporter::create([
            'image'     => $image->hashName(),
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'age'       => $request->age,
            'address'   => $request->address,
        ]);

        return redirect()->route('reporters.index')->with('success', 'Reporter created successfully.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $reporter = Reporter::findOrFail($id);

        return view('reporters.show', compact('reporter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $reporter = Reporter::findOrFail($id);

        return view('reporters.edit', compact('reporter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
     {
        //validate form
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:255',
            'age'       => 'required|numeric',
            'address'   => 'required|string|max:255',
        ]);

        //get reporter
        $reporter = Reporter::findOrFail($id);

        //check if image is uploaded
        if($request->hasFile('image')) {
            //delete old image
            Storage::delete('public/reporters/'.$reporter->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/reporters', $image->hashName());

            $reporter->update([
                'image'     => $image->hashName(),
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'age'       => $request->age,
                'address'   => $request->address,
            ]);
        } else {
            $reporter->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'age'       => $request->age,
                'address'   => $request->address,
            ]);
        }

        return redirect()->route('reporters.index')->with('success', 'Reporter updated successfully.');
     }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get reporter
        $reporter = Reporter::findOrFail($id);

        //delete image
        Storage::delete('public/reporters/'.$reporter->image);

        //delete reporter
        $reporter->delete();

        return redirect()->route('reporters.index')->with('success', 'Reporter deleted successfully.');
    }
}
