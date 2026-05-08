<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
 public function index(Request $request)
{
    $search = $request->search;

    $posts = Post::where('title', 'LIKE', "%$search%")->get();

    $totalPosts = Post::count();

    $pendingPosts = Post::where('status', 'Pending')->count();

    $completedPosts = Post::where('status', 'Completed')->count();

    return view('home', compact(
        'posts',
        'totalPosts',
        'pendingPosts',
        'completedPosts'
    ));
}

    public function store(Request $request)
{
    $request->validate(

        [
            'title' => 'required',
            'content' => 'required',
        ],

        [
            'title.required' => 'Title is required',

            'content.required' => 'Content is required',
        ]

    );
$imageName = null;

if($request->hasFile('image'))
{
    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('uploads'), $imageName);
}
    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'status' => $request->status,
        'image' => $imageName,
        'category' => $request->category,
    ]);

    return redirect('/')->with('success', 'Post Added Successfully');
}
    public function delete($id)
{
    Post::find($id)->delete();

    return redirect('/');
}
public function edit($id)
{
    $post = Post::find($id);

    return view('edit', compact('post'));
}

public function update(Request $request, $id)
{
    $post = Post::find($id);

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect('/');
}
public function filter(Request $request)
{
    $posts = Post::where('category', $request->category)->get();

    return view('filter', compact('posts'));
}
public function show($id)
{
    $post = Post::find($id);

    return view('single', compact('post'));
}
public function login(Request $request)
{
    if(
        $request->email == 'admin@gmail.com'
        &&
        $request->password == '123456'
    )
    {
        session()->put('admin', true);

        return redirect('/');
    }

    return back();
}
public function filterDate(Request $request)
{
    $posts = Post::whereDate(
        'created_at',
        $request->date
    )->get();

    return view('filter', compact('posts'));
}
public function search(Request $request)
{
    $posts = Post::where(
        'title',
        'LIKE',
        '%'.$request->search.'%'
    )->get();

    return view('filter', compact('posts'));
}
public function logout()
{
    session()->forget('admin');

    return redirect('/admin/login');
}
}
