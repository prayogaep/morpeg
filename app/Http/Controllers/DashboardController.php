<?php

namespace App\Http\Controllers;

use App\Models\KelolaMonitoring;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'monitoring' => KelolaMonitoring::get(),
            'totalTask' => KelolaMonitoring::count(),
            'totalPegawai' => User::where('role_id', 2)->count(),
        ];
        return view('dashboard.index', $data)->with('toast_success', 'Login Berhasil!');
    }

    public function kelola_monitoring()
    {
        return view('kelola_monitoring.kelolamonitoring');
    }

    public function kelola_pegawai()
    {
        return view('kelola_pegawai.kelolapegawai');
    }

    public function laporan()
    {
        return view('laporan.laporan');
    }
}
