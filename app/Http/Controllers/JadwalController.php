<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function submit(Request $request)
    {
        // Simpan data jadwal
        $jadwal = new Jadwal();
        $jadwal->tanggal = $request->tanggal;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->status_aktif = $request->status_aktif;
        $jadwal->pasien_maksimum = $request->pasien_maksimum;
        $jadwal->pasien_limit = '0';
        $jadwal->dokter_id = $request->dokter_id;
        $jadwal->save();

        return redirect('/dokterjadwalsaya')
            ->with('message', 'Jadwal baru berhasil dibuat');
    }
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('dokter.doktereditjadwal', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->tanggal = $request->tanggal;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->status_aktif = $request->status_aktif;
        $jadwal->update();

        return redirect('/dokterjadwalsaya')
            ->with('message', 'Jadwal berhasil diperbarui');
    }
}
