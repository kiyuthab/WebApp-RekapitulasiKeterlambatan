<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombel = Rombel::all();
        return view('admin.rombel.index', compact('rombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel'=>'required',
        ]);

        Rombel::create([
            'rombel'=>$request->rombel,
        ]);

        return redirect()->back()->with('success', 'Data berhasil di tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rombel = Rombel::find($id);
        return view('admin.rombel.index', compact('rombel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rombel = Rombel::find($id);
        return view('admin.rombel.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rombel'=>'required'
        ]);

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel
        ]);
        
        return redirect()->route('rombel.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rombel::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data !');
    }
}
