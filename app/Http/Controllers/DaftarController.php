<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Daftar;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftars = Daftar::orderBy('id', 'desc')->get();
        return view('admin.data-daftar', compact('daftars'));
    }

    public function detail($id)
    {
        $daftar = Daftar::find($id);
        return view('user.detail', compact('daftar'));
    }

    public function daftarUser($category)
    {
        $user = auth()->user();
        // Misalnya, jika Anda perlu mengambil harga dari database atau lainnya, Anda bisa lakukan query di sini
        $price = Kelas::whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->value('price'); // Contoh query, sesuaikan dengan struktur database Anda

        return view('user.daftar', compact('user', 'category', 'price'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = auth()->user();
        $kelas = Kelas::where('id', $id)->with('category')->first();
        $categories = Category::all();
        return view('user.daftar', compact('user', 'categories', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'gender' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'status' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'company_phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255',
            'class' => 'required|string',
            'day_time' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $data['file'] = $file->storeAs('daftar', $filename, 'public');
        }

        Daftar::create($data);

        return redirect()->route('home')->with('success', 'Data berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // You can implement this method if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // You can implement this method if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // You can implement this method if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftar = Daftar::find($id);
        if ($daftar) {
            Storage::delete($daftar->file);
            $daftar->delete();
            return redirect()->route('data-daftar')->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->with('error', 'Data tidak ditemukan.');
        }
    }
}
