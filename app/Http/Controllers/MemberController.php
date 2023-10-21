<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Data Member";
        $data = Member::orderBy('id', 'asc')->get();
        
        return view('admin.member.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Tambah Member";

        $member = Member::all();

        return view('admin.member.create', compact('judul', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'sekolah' => 'required',
            'wa_ortu' => 'required|numeric',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'tempat_lahir.required' => 'tempat_lahir wajib diisi',
            'tanggal_lahir.required' => 'tanggal_lahir wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'sekolah.required' => 'sekolah wajib diisi',
            'wa_ortu.required' => 'Nomor Orang Tua wajib diisi',
            'wa_ortu.numeric' => 'Nomor Orang Tua wajib diisi dengan angka',
        ]);


        $data = [
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'sekolah' => $request->input('sekolah'),
            'wa_ortu' => $request->input('wa_ortu'),
        ];

        Member::create($data);

        return redirect('/admin/member');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
