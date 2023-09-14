<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;


class TagsController extends Controller
{
    public function index() {
    
        $tag_list = Tag::all();
 
        return view('tags.index', compact('tag_list'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request) {
 
        Tag::create($request->validated());

        return redirect()->route('tags.index')->with('message', 'タグを追加しました。');
    }

    public function edit($id) {
        $tag = Tag::findOrFail($id);
 
        return view('tags.edit', compact('tag'));
    }
 
    public function update(TagRequest $request, $id) {
        $tag = Tag::findOrFail($id);
 
        $tag->update($request->validated());
 
        return redirect()->route('tags.index')->with('message', 'タグを更新しました。');
    }

    
    public function destroy($id) {
 
        $tag = Tag::findOrFail($id);
        $tag->delete();
 
        return redirect()->route('tags.index')->with('message', 'タグを削除しました。');
    }
    
}
