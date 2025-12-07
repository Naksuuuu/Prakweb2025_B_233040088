<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('name', 'like', '%' . request('search') . '%')->latest();
        return view('dashboard.categories.index', [
            'categories' => $category->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        return view('dashboard.categories.create', [
            // 'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori Wajib diisi.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'name.exists' => 'Kategori yang dipilih tidak valid.',
            'name.unique'   => 'Nama kategori ini sudah ada, mohon gunakan nama lain.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create([
            'name' => $request->name,
        ]);


        return redirect(route('dashboard.categories.index'))->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::where('id', $category->id)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori Wajib diisi.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            'name.exists' => 'Kategori yang dipilih tidak valid.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update([
            'name' => $request->name,
        ]);


        return redirect(route('dashboard.categories.index'))->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::where('id', $category->id)->firstOrFail();
        $category->delete();

        return redirect(route('dashboard.categories.index'))->with('success', 'Category has been deleted!');
    }
}
