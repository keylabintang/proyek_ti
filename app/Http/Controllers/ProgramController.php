<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Data Program";
        $data = Program::orderBy('id_program', 'asc')->get();
        
        return view('admin.program.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Tambah Program";

        $program = Program::all();

        return view('admin.program.create', compact('judul', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
        ], [
            'nama.required' => 'Nama Program wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'waktu.required' => 'Waktu wajib diisi',
            'tempat.required' => 'Tempat wajib diisi',
        ]);


        $data = [
            'nama' => $request->input('nama'),
            'tanggal' => $request->input('tanggal'),
            'hari' => $request->input('hari'),
            'waktu' => $request->input('waktu'),
            'tempat' => $request->input('tempat'),
        ];

        Program::create($data);

        return redirect('/admin/program');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $judul = "Edit Program";

        return view('admin/program/edit', compact('program', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
        ], [
            'nama.required' => 'Nama Program wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'waktu.required' => 'Waktu wajib diisi',
            'tempat.required' => 'Tempat wajib diisi',
        ]);


        $data = [
            'nama' => $request->input('nama'),
            'tanggal' => $request->input('tanggal'),
            'hari' => $request->input('hari'),
            'waktu' => $request->input('waktu'),
            'tempat' => $request->input('tempat'),
        ];

        $program->update($data);

        return redirect('/admin/program');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        // Alert::success('Data Member', 'Berhasil dihapus!!');
        return redirect('/admin/program');
    }
}
