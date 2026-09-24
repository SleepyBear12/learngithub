<?php

namespace App\Http\Controllers;

use App\Models\LokasiPengisian;
use App\Models\SesiPengisian;
use Illuminate\Http\Request;

class PenggunaDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $userId = auth()->user()->getAuthIdentifier();

        $sesiAktif = SesiPengisian::with(['pengisiDaya.lokasi'])
            ->where('id_pengguna', $userId)
            ->where('status', 'berlangsung')
            ->latest('waktu_mulai')
            ->first();

        $stasiun = LokasiPengisian::with(['tarif' => function ($query) {
            $query->where('status', 'aktif')->latest('periode_mulai');
        }])
            ->withCount(['pengisiDaya as charger_tersedia_count' => function ($query) {
                $query->where('status', 'tersedia');
            }])
            ->where('status', '!=', 'pemeliharaan')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama_lokasi', 'like', "%{$search}%")
                        ->orWhere('alamat', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->limit(5)
            ->get();

        return view('pengguna.dashboard', compact('sesiAktif', 'stasiun', 'search'));
    }
}