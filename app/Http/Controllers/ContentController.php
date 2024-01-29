<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function create()
{
    return view('contents.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    Content::create([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
    ]);

    return redirect()->route('contents.index')->with('success', 'Content created successfully.');
}
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('contents.show', compact('content'));
    }
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $content = Content::findOrFail($id);
        $content->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('contents.index')->with('success', 'Content updated successfully.');
    }
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Content deleted successfully.');
    }

}
