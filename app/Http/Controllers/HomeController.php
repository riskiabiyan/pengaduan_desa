<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(){
        return view('laporan_saya');
    }

    public function buat_laporan(){
        return view('buat_laporan');
    }

    public function simpan_laporan(Request $request){
        try{
            $validate = $request->validate([
                'kategori_id' => 'required|exists:kategori_laporan,id',
                'status_id' => 'required|exists:status_laporan,id',
                'user_id' => 'required|exists:user,id', 
                'judul_laporan' => 'required|string|max:500',
                'isi_laporan' => 'required|string|max:500',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e){
            return back()->withErrors($e->errors())->withInput();
        }

        if ($request->hasFile('foto')) {
            $imageName = time(). '.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            
            $imageName = 'images/' . $imageName;
        }

        $laporan = new Laporan();
        $laporan->kategori_id = $validate['kategori_id'];
        $laporan->status_id = $validate['status_id'];
        $laporan->user_id = $validate['user_id'];
        $laporan->judul_laporan = $validate['judul_laporan'];
        $laporan->isi_laporan = $validate['isi_laporan'];
        $laporan->foto = $imageName;
        $laporan->save();

        session()->flash('laporan_dikirimkan');

        return redirect('/dashboard');
    }

    public function lihat_laporan(){
        $user = Auth::user();

        $laporan = Laporan::with('statusLaporan')
            ->where('user_id', $user->id)
            ->get();

        return view('lihat_laporan', compact('laporan'));
    }

    public function detail_laporan($id)
    {
        $laporan = Laporan::with('statusLaporan')->findOrFail($id);
        return view('detail_laporan', compact('laporan'));
    }
}
