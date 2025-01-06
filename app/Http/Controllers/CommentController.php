<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $comments = Comment::paginate(10);
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $image = $request->file('image');
        $image->storeAs('public/comments', $image->hashName());

        Comment::create([
            'image'     => $image->hashName(),
            'name'      => $request->name,
            'review'    => $request->review,
            'phone'     => $request->phone,
            'date'      => $request->date,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        

        $comment = Comment::findOrFail($id);

        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/comments', $image->hashName());
            
            Storage::disk('local')->delete('public/comments/' . $number->image);

            $comment->update([
                'image'     => $image->hashName(),
                'name'      => $request->name,
                'review'    => $request->review,
                'phone'     => $request->phone,
                'date'      => $request->date,
            ]);

        } else {
            $comment->update([
                'image'     => $image->hashName(),
                'name'      => $request->name,
                'review'    => $request->review,
                'phone'     => $request->phone,
                'date'      => $request->date,
            ]);

            return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);

        Storage::disk('local')->delete('public/comments/' . $comment->image);
        
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
