<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.data-kelas', compact('data'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create.tambah-kelas', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_title' => 'required|string|max:255',
            'discount' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'heading1' => 'required|string|max:255',
            'heading2' => 'required|string|max:255',
        ]);
    
        Kelas::create($data);
    
        return redirect('admin/kelas')->with('success', 'Data Berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::find($id);
        $categories = Category::all();
        return view('admin.create.edit-kelas', compact('kelas', 'categories'));
    }
    
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_title' => 'required|string|max:255',
            'discount' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'heading1' => 'required|string|max:255',
            'heading2' => 'required|string|max:255',
        ]);
    
        $kelas = Kelas::find($id);
        $kelas->update($data);
    
        return redirect('admin/kelas')->with('success', 'Data Berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return redirect('admin/kelas')->with('success', 'Data Berhasil dihapus');
    }
}
