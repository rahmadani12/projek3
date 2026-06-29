<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->get();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required'

        ]);

        Note::create([

            'title'=>$request->title,

            'content'=>$request->content,

            'user_id'=>Auth::id()

        ]);

        return redirect('/notes');
    }

    public function edit(Note $note)
    {
        return view('notes.edit',compact('note'));
    }

   public function update(Request $request, Note $note)
    {
        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $note->refresh();
        
        broadcast(new \App\Events\NoteUpdated($note))->toOthers();

        return response()->json([
            'success' => true
        ]);
    }
    public function destroy(Note $note)
    {
        $note->delete();

        return back();
    }
}