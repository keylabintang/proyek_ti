<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Data Jadwal";
        $data = Jadwal::orderBy('id_jadwal', 'asc')->get();
        
        return view('admin.jadwal.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Tambah Jadwal";

        $jadwal = Jadwal::all();

        return view('admin.jadwal.create', compact('judul', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'hari' => 'required',
            'tempat' => 'required',
        ], [
            'tanggal.required' => 'tanggal wajib diisi',
            'waktu.required' => 'waktu wajib diisi',
            'hari.required' => 'hari wajib diisi',
            'tempat.required' => 'tempat wajib diisi',
        ]);


        $data = [
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu'),
            'hari' => $request->input('hari'),
            'tempat' => $request->input('tempat'),
        ];

        Jadwal::create($data);

        return redirect('/admin/jadwal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $judul = "Edit Jadwal";

        return view('admin/jadwal/edit', compact('jadwal', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'hari' => 'required',
            'tempat' => 'required',
        ], [
            'tanggal.required' => 'tanggal wajib diisi',
            'waktu.required' => 'waktu wajib diisi',
            'hari.required' => 'hari wajib diisi',
            'tempat.required' => 'tempat wajib diisi',
        ]);


        $data = [
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu'),
            'hari' => $request->input('hari'),
            'tempat' => $request->input('tempat'),
        ];

        $jadwal->update($data);

        return redirect('/admin/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        // Alert::success('Data Member', 'Berhasil dihapus!!');
        return redirect('/admin/jadwal');
    }
}
