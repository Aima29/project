<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('user.laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tujuan' => 'required',
            'isi_laporan' => 'required',
        ]);

        $laporan = Laporan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'tujuan' => $request->tujuan,
            'isi_laporan' => $request->isi_laporan,
            'status' => 'baru',
        ]);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        $this->authorize('view', $laporan);
        return view('user.laporan.show', ['laporan' => $laporan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $this->authorize('update', $laporan);
        return view('user.laporan.edit', ['laporan' => $laporan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tujuan' => 'required',
            'isi_laporan' => 'required',
        ]);

        $laporan = Laporan::findOrFail($id);
        $this->authorize('update', $laporan);

        $laporan->update([
            'judul' => $request->judul,
            'tujuan' => $request->tujuan,
            'isi_laporan' => $request->isi_laporan,
        ]);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $this->authorize('delete', $laporan);
        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus');
    }
}
