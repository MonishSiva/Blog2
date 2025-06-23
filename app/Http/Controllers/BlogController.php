<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainBlog;
use App\Models\SubBlog;

class BlogController extends Controller
{
    //

     public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $main = MainBlog::create(['title' => $request->title]);

        foreach ($request->heading as $index => $heading) {
            $image = null;

            if ($request->hasFile('image') && isset($request->image[$index])) {
                $image = $request->image[$index]->store('images', 'public');
            }

            SubBlog::create([
                'main_blog_id' => $main->id,
                'heading' => $heading,
                'image' => $image,
                'description' => $request->description[$index],
            ]);
        }

        return redirect()->route('blog.show', $main->id);
    }

    public function show($id)
    {
        $main = MainBlog::with('subBlogs')->findOrFail($id);
        return view('blog.show', compact('main'));
    }

 public function allBlogs()
{
    $mainBlogs = \App\Models\MainBlog::with(['subBlogs' => function ($query) {
        $query->orderBy('id', 'asc'); // so first() will get min(id)
    }])->get();

    return view('blog.all', compact('mainBlogs'));
}

public function edit($id) {
    $main = MainBlog::with('subBlogs')->findOrFail($id);
    return view('blog.edit', compact('main'));
}

public function update(Request $request, $id)
{
    $main = MainBlog::findOrFail($id);
    $main->title = $request->title;
    $main->save();

    foreach ($request->sub_ids as $i => $subId) {
        $sub = SubBlog::find($subId);

        $sub->heading = $request->heading[$i];
        $sub->description = $request->description[$i];

        if ($request->hasFile('image') && isset($request->image[$i])) {
            $sub->image = $request->image[$i]->store('images', 'public');
        }

        $sub->save();
    }

    return redirect()->route('blog.all')->with('success', 'Blog updated!');
}


public function destroy($id) {
    $main = MainBlog::findOrFail($id);
    $main->subBlogs()->delete(); // delete sub blogs first
    $main->delete();

    return redirect()->route('blog.all')->with('success', 'Blog deleted!');
}



}
