<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    function submit(Request $request)
    {
        $dokter = new Dokter();
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->nomor_telepon_dokter = $request->nomor_telepon_dokter;
        $dokter->email = $request->email;
        $dokter->password = $request->password;
        $dokter->save();

        return redirect('/adminlistdokter')->with('message', 'Akun dokter baru berhasil ditambahkan');
    }

    public function jadwalSaya($id)
    {
        // Pastikan pasien yang sedang login adalah pemilik riwayat perjanjian ini
        $dokter = Auth::guard('dokter')->user();
        if ($dokter->id != $id) {
            return redirect()->back()->withErrors(['error' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        // Ambil riwayat perjanjian pasien
        $jadwal = Jadwal::where('dokter_id', $id)->get();

        return view('dokter.dokterjadwalsaya', compact('jadwal'));
    }

    public function updateProfile(Request $request, $id)
    {
        $dokter = Dokter::find($id);
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->nomor_telepon_dokter = $request->nomor_telepon_dokter;
        $dokter->email = $request->email;
        $dokter->update();

        return redirect('/dokterdashboard')->with('message', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request, $id)
    {
        // Mendapatkan pasien yang sedang login
        $dokter = Dokter::find($id);

        if ($request->password_baru === $request->konfirmasi_password_baru) {
            if (Hash::check($request->password_saat_ini, $dokter->password)) {
                $dokter->password = $request->password_baru;
                $dokter->save();
                return redirect('/dokterdashboard')->with('message', 'Password berhasil diubah');
            } else {
                return redirect('/dokterdashboard')->with('error', 'Password saat ini salah');
            }
        } else {
            return redirect('/dokterdashboard')->with('error', 'Password baru tidak dapat dikonfirmasi');
        }
    }
}
