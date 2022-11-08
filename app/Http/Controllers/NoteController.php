<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::paginate(5)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NoteRequest  $request
     * @return Note
     */
    public function store(NoteRequest $request)
    {
        $result = Note::create($request->validated());
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Note
     */
    public function show(int $id)
    {
        return $note = Note::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\NoteRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NoteRequest $request, int $id)
    {
        $note = Note::findOrFail($id);
        $note->fill($request->except(['id']));
        $note->save();
        return response()->json($note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $note = Note::findOrFail($id);
        if ($note->delete()) return response(null, 204);
    }
}
