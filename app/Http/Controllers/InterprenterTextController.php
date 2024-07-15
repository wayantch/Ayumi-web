<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class InterprenterTextController extends Controller
{
    public function index()
    {
        $texts = Text::orderBy('id', 'desc')->get();
        return view('admin.data-text', compact('texts'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('user.text', compact('user'));
    }

    public function detail()
    {
        return view('user.detail.detail-text');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'company' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        Text::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $text = Text::find($id);
        $text->delete();
        return redirect()->back();
    }
}
