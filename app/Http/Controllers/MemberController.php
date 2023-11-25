<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Daftar Member";
        $data = Member::oldest()->get();

        return view('admin.member.index', compact('judul', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Tambah Member";

        return view('admin.member.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ortu' => 'required',
            'wa_ortu' => 'required',
            'alamat' => 'required',
            'level' => 'required',
        ], [
            'nama_anak.required' => 'Nama anak harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'sekolah.required' => 'Sekolah harus diisi',
            'nama_ortu.required' => 'Nama orang tua harus diisi',
            'wa_ortu.required' => 'Nomor wa orang tua harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'level.required' => 'level harus diisi',
        ]);

        $data = $request->all();

        $data['umur'] = $this->hitungUmur($data['tanggal_lahir']);

        Member::create($data);

        return redirect('/admin/member');
    }

    private function hitungUmur($tanggal_lahir)
    {
        $tanggal_lahir = new DateTime($tanggal_lahir);
        $tanggal_sekarang = new DateTime();
        $perbedaan = $tanggal_sekarang->diff($tanggal_lahir);
        return $perbedaan->y; // Mengembalikan umur dalam tahun
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
        $judul = "Ubah Member";
        $data = $member;

        return view('admin.member.edit', compact('data', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama_anak' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ortu' => 'required',
            'wa_ortu' => 'required',
            'alamat' => 'required',
            'level' => 'required',
        ], [
            'nama_anak.required' => 'Nama anak harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'sekolah.required' => 'Sekolah harus diisi',
            'nama_ortu.required' => 'Nama orang tua harus diisi',
            'wa_ortu.required' => 'Nomor wa orang tua harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'level.required' => 'level harus diisi',
        ]);

        $data = $request->all();

        // cek apakah tanggal lahir diubah
        if ($request->has('tanggal_lahir')) {
            $data['umur'] = $this->hitungUmur($data['tanggal_lahir']);
        } else {
            $data['umur'] = $member->umur;
        }

        $member->update($data);

        // Alert::success('Data Prodi', 'Berhasil diubah!');
        return redirect('/admin/member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        // Alert::success('Data Member', 'Berhasil dihapus!!');
        return redirect('/admin/member');
    }
}
