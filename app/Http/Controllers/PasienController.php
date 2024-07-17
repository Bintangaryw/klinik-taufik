<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function register(Request $request)
    {
        // Mendapatkan nomor RM terakhir
        $lastPasien = Pasien::orderBy('nomor_rm', 'desc')->first();

        // Menentukan nomor RM baru
        $newNomorRm = $lastPasien ? $lastPasien->nomor_rm + 1 : 1000;

        // Menyimpan data pasien baru
        $pasien = new Pasien();
        $pasien->username = $request->username;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->username = $request->username;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->nomor_telepon = $request->nomor_telepon;
        $pasien->password = Hash::make($request->password);
        $pasien->nomor_rm = $newNomorRm;
        $pasien->save();

        return redirect('/')->with('message', 'Pendaftaran berhasil');
    }

    public function registerByAdmin(Request $request)
    {
        // Mendapatkan nomor RM terakhir
        $lastPasien = Pasien::orderBy('nomor_rm', 'desc')->first();

        // Menentukan nomor RM baru
        $newNomorRm = $lastPasien ? $lastPasien->nomor_rm + 1 : 1000;

        // Menyimpan data pasien baru
        $pasien = new Pasien();
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->username = $request->username;
        $pasien->nomor_telepon = $request->nomor_telepon;
        $pasien->password = Hash::make($request->password);
        $pasien->nomor_rm = $newNomorRm;
        $pasien->save();

        return redirect('/adminlistpasien')->with('message', 'Pendaftaran berhasil');
    }

    public function riwayatPerjanjian($id)
    {
        // Pastikan pasien yang sedang login adalah pemilik riwayat perjanjian ini
        $pasien = Auth::guard('pasien')->user();
        if ($pasien->id != $id) {
            return redirect()->back()->withErrors(['error' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        // Ambil riwayat perjanjian pasien
        $perjanjian = Perjanjian::where('pasien_id', $id)->get();

        return view('pasien.pasienriwayatperjanjian', compact('perjanjian'));
    }

    public function updateProfile(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->username = $request->username;
        $pasien->nomor_telepon = $request->nomor_telepon;
        $pasien->update();

        return redirect('/dashboardpasien')->with('message', 'Profil berhasil diperbarui');
    }

    public function updateProfileByAdmin(Request $request, $id)
    {
        // Pengecekan apakah nomor RM sudah digunakan oleh pasien lain
        $existingPasien = Pasien::where('nomor_rm', $request->nomor_rm)->first();
        if ($existingPasien && $existingPasien->id != $id) {
            return redirect('/adminlistpasien')->with('error', 'Nomor rekam medis sudah digunakan');
        }

        // Update data pasien
        $pasien = Pasien::find($id);
        $pasien->nomor_telepon = $request->nomor_telepon;
        $pasien->nomor_rm = $request->nomor_rm;
        $pasien->update();

        return redirect('/adminlistpasien')->with('message', 'Data pasien diperbarui');
    }

    // Mengubah password
    public function updatePassword(Request $request, $id)
    {
        // Mendapatkan pasien yang sedang login
        $pasien = Pasien::find($id);

        if ($request->password_baru === $request->konfirmasi_password_baru) {
            if (Hash::check($request->password_saat_ini, $pasien->password)) {
                $pasien->password = $request->password_baru;
                $pasien->save();
                return redirect('/dashboardpasien')->with('message', 'Password berhasil diubah');
            } else {
                return redirect('/dashboardpasien')->with('error', 'Password saat ini salah');
            }
        } else {
            return redirect('/dashboardpasien')->with('error', 'Password baru tidak dapat dikonfirmasi');
        }
    }
}
