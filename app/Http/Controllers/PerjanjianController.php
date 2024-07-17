<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Perjanjian;
use Illuminate\Http\Request;

class PerjanjianController extends Controller
{
    public function submit(Request $request)
    {
        // Simpan data perjanjian
        $perjanjian = new Perjanjian();
        $perjanjian->pasien_id = $request->pasien_id;
        $perjanjian->dokter_id = $request->dokter_id;
        $perjanjian->jadwal_id = $request->jadwal_id;
        $perjanjian->status_perjanjian = 'belum_selesai';
        $perjanjian->save();

        // Perbarui pasien_limit pada jadwal terkait
        $jadwal = Jadwal::find($request->jadwal_id);
        $jadwal->perbaruiPasienLimit();

        // Redirect ke halaman lain setelah berhasil menyimpan
        return redirect('/adminperjanjian')->with('message', 'Perjanjian pasien berhasil dibuat');
    }

    public function pasienSubmit(Request $request)
    {
        // Simpan data perjanjian
        $perjanjian = new Perjanjian();
        $perjanjian->pasien_id = $request->pasien_id;
        $perjanjian->dokter_id = $request->dokter_id;
        $perjanjian->jadwal_id = $request->jadwal_id;
        $perjanjian->status_perjanjian = 'belum_selesai';
        $perjanjian->save();

        // Perbarui pasien_limit pada jadwal terkait
        $jadwal = Jadwal::find($request->jadwal_id);
        $jadwal->perbaruiPasienLimit();

        // Redirect ke halaman lain setelah berhasil menyimpan
        return redirect('/pasienriwayatperjanjian')
            ->with('message', 'Perjanjian berhasil dibuat');
    }

    public function selesai($id)
    {
        $perjanjian = Perjanjian::find($id);
        $perjanjian->status_perjanjian = 'selesai';
        $perjanjian->update();

        // Dapatkan jadwal terkait dan perbarui pasien_limit
        $jadwal = $perjanjian->jadwal;
        $jadwal->perbaruiPasienLimit();

        return redirect('/adminperjanjian')->with('message', 'Status perjanjian diubah menjadi selesai');
    }

    public function batalkan($id)
    {
        $perjanjian = Perjanjian::find($id);
        $perjanjian->status_perjanjian = 'dibatalkan';
        $perjanjian->update();

        // Dapatkan jadwal terkait dan perbarui pasien_limit
        $jadwal = $perjanjian->jadwal;
        $jadwal->perbaruiPasienLimit();

        return redirect('/adminperjanjian')->with('message', 'Perjanjian berhasil dibatalkan');
    }
    public function dokterSelesai($id)
    {
        $perjanjian = Perjanjian::find($id);
        $perjanjian->status_perjanjian = 'selesai';
        $perjanjian->update();

        // Dapatkan jadwal terkait dan perbarui pasien_limit
        $jadwal = $perjanjian->jadwal;
        $jadwal->perbaruiPasienLimit();

        return redirect('/dokterlp')->with('message', 'Status perjanjian diubah menjadi selesai');
    }
    public function dokterBatalkan($id)
    {
        $perjanjian = Perjanjian::find($id);
        $perjanjian->status_perjanjian = 'dibatalkan';
        $perjanjian->update();

        // Dapatkan jadwal terkait dan perbarui pasien_limit
        $jadwal = $perjanjian->jadwal;
        $jadwal->perbaruiPasienLimit();

        return redirect('/dokterlp')->with('message', 'Perjanjian berhasil dibatalkan');
    }
    public function pasienBatalkan($id)
    {
        $perjanjian = Perjanjian::find($id);
        $perjanjian->status_perjanjian = 'dibatalkan';
        $perjanjian->update();

        // Dapatkan jadwal terkait dan perbarui pasien_limit
        $jadwal = $perjanjian->jadwal;
        $jadwal->perbaruiPasienLimit();

        return redirect('/pasienriwayatperjanjian')->with('message', 'Perjanjian berhasil dibatalkan');
    }
}
