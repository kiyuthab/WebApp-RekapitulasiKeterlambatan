<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{

    public function index()
    {
        $rombel = Rombel::all();
        return view('admin.rombel.index', compact('rombel'));
    }

    public function create()
    {
        return view('admin.rombel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ]);

        Rombel::create([
            'rombel' => $request->rombel,
        ]);

        return redirect()->back()->with('success', 'Data berhasil di tambahkan !');
    }

    public function show(string $id)
    {
        $rombel = Rombel::find($id);
        return view('admin.rombel.index', compact('rombel'));
    }

    public function edit(string $id)
    {
        $rombel = Rombel::find($id);
        return view('admin.rombel.edit', compact('rombel'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('rombel.home')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        Rombel::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data !');
    }
}
