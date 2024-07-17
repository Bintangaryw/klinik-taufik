<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class Rekam_MedisController extends Controller
{
    // simpan data rekam medis baru
    public function submit(Request $request)
    {
        $rekam_medis = new RekamMedis();
        $rekam_medis->pasien_id = $request->pasien_id;
        $rekam_medis->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $rekam_medis->rk_1 = $request->rk_1;
        $rekam_medis->rk_2 = $request->rk_2;
        $rekam_medis->rp_1 = $request->rp_1;
        $rekam_medis->rp_2 = $request->rp_2;
        $rekam_medis->pf_1 = $request->pf_1;
        $rekam_medis->pf_2 = $request->pf_2;
        $rekam_medis->diagnosis = $request->diagnosis;
        $rekam_medis->cp_1 = $request->cp_1;
        $rekam_medis->cp_2 = $request->cp_2;
        $rekam_medis->cp_3 = $request->cp_3;
        $rekam_medis->rpb_1 = $request->rpb_1;
        $rekam_medis->rpb_2 = $request->rpb_2;
        $rekam_medis->ck_1 = $request->ck_1;
        $rekam_medis->save();

        return redirect('/adminrm')->with('message', 'Catatan rekam medis baru pasien berhasil ditambahkan');
    }

    public function submitByDokter(Request $request)
    {
        $rekam_medis = new RekamMedis();
        $rekam_medis->pasien_id = $request->pasien_id;
        $rekam_medis->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $rekam_medis->rk_1 = $request->rk_1;
        $rekam_medis->rk_2 = $request->rk_2;
        $rekam_medis->rp_1 = $request->rp_1;
        $rekam_medis->rp_2 = $request->rp_2;
        $rekam_medis->pf_1 = $request->pf_1;
        $rekam_medis->pf_2 = $request->pf_2;
        $rekam_medis->diagnosis = $request->diagnosis;
        $rekam_medis->cp_1 = $request->cp_1;
        $rekam_medis->cp_2 = $request->cp_2;
        $rekam_medis->cp_3 = $request->cp_3;
        $rekam_medis->rpb_1 = $request->rpb_1;
        $rekam_medis->rpb_2 = $request->rpb_2;
        $rekam_medis->ck_1 = $request->ck_1;
        $rekam_medis->save();

        return redirect('/dokterrm')->with('message', 'Catatan rekam medis baru pasien berhasil ditambahkan');
    }
    public function updateRekamMedis(Request $request, $id)
    {
        $rekam_medis = RekamMedis::find($id);
        $rekam_medis->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $rekam_medis->rk_1 = $request->rk_1;
        $rekam_medis->rk_2 = $request->rk_2;
        $rekam_medis->rp_1 = $request->rp_1;
        $rekam_medis->rp_2 = $request->rp_2;
        $rekam_medis->pf_1 = $request->pf_1;
        $rekam_medis->pf_2 = $request->pf_2;
        $rekam_medis->diagnosis = $request->diagnosis;
        $rekam_medis->cp_1 = $request->cp_1;
        $rekam_medis->cp_2 = $request->cp_2;
        $rekam_medis->cp_3 = $request->cp_3;
        $rekam_medis->rpb_1 = $request->rpb_1;
        $rekam_medis->rpb_2 = $request->rpb_2;
        $rekam_medis->ck_1 = $request->ck_1;

        $rekam_medis->update();

        return redirect('/adminrm')->with('message', 'Rekam Medis berhasil diubah');
    }
    public function updateRekamMedisByDokter(Request $request, $id)
    {
        $rekam_medis = RekamMedis::find($id);
        $rekam_medis->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $rekam_medis->rk_1 = $request->rk_1;
        $rekam_medis->rk_2 = $request->rk_2;
        $rekam_medis->rp_1 = $request->rp_1;
        $rekam_medis->rp_2 = $request->rp_2;
        $rekam_medis->pf_1 = $request->pf_1;
        $rekam_medis->pf_2 = $request->pf_2;
        $rekam_medis->diagnosis = $request->diagnosis;
        $rekam_medis->cp_1 = $request->cp_1;
        $rekam_medis->cp_2 = $request->cp_2;
        $rekam_medis->cp_3 = $request->cp_3;
        $rekam_medis->rpb_1 = $request->rpb_1;
        $rekam_medis->rpb_2 = $request->rpb_2;
        $rekam_medis->ck_1 = $request->ck_1;

        $rekam_medis->update();

        return redirect('/dokterrm')->with('message', 'Rekam Medis berhasil diubah');
    }
}
