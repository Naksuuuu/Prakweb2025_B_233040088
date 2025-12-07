<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::where('user_id', Auth::user()->id)->where('title', 'like', '%' . request('search') . '%')->latest();
        return view('dashboard.posts.index', [
            'posts' => $post->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->title, '-');

        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image-posts', 'public');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required' => 'Title Wajib diisi.',
            'title.max' => 'Title tidak boleh lebih dari 255 karakter.',
            'excerpt.required' => 'Excerpt Wajib diisi.',
            'excerpt.max' => 'Excerpt tidak boleh lebih dari 500 karakter.',
            'body.required' => 'Body Wajib diisi.',
            'category_id.required' => 'Category Wajib diisi.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('dashboard.posts.index'))->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = Post::where('id', $post->id)->where('user_id', Auth::user()->id)->firstOrFail();
        $categories = Category::all();
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::where('id', $post->id)->where('user_id', Auth::user()->id)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required' => 'Title Wajib diisi.',
            'title.max' => 'Title tidak boleh lebih dari 255 karakter.',
            'excerpt.required' => 'Excerpt Wajib diisi.',
            'excerpt.max' => 'Excerpt tidak boleh lebih dari 500 karakter.',
            'body.required' => 'Body Wajib diisi.',
            'category_id.required' => 'Category Wajib diisi.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image-posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect(route('dashboard.posts.index'))->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::where('id', $post->id)->where('user_id', Auth::user()->id)->firstOrFail();
        $post->delete();

        return redirect(route('dashboard.posts.index'))->with('success', 'Post has been deleted!');
    }
}
