<?php

namespace App\Http\Controllers;

use App\Models\Gadget;
use Illuminate\Http\Request;

class GadgetController extends Controller
{
    public function index()
    {
        $gadgets = Gadget::all();
        return view('gadgets.index', compact('gadgets'));
    }

    public function create()
    {
        return view('gadgets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);

        Gadget::create($request->all());
        return redirect()->route('gadgets.index')->with('success', 'Gadget berhasil ditambahkan!');
    }

    public function show(Gadget $gadget)
    {
        return view('gadgets.show', compact('gadget'));
    }

    public function edit(Gadget $gadget)
    {
        return view('gadgets.edit', compact('gadget'));
    }

    public function update(Request $request, Gadget $gadget)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);

        $gadget->update($request->all());
        return redirect()->route('gadgets.index')->with('success', 'Gadget berhasil diupdate!');
    }

    public function destroy(Gadget $gadget)
    {
        $gadget->delete();
        return redirect()->route('gadgets.index')->with('success', 'Gadget berhasil dihapus!');
    }
}
