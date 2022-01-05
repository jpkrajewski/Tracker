<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Post;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(StoreNoteRequest $request)
    {
        $note = Note::create($request->all());

        dump($note);
        return back()->withSuccess('Note has been added.');
    }

    public function create()
    {
        dd('here');
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    public function destroy(Note $note)
    {
        //
    }
}
