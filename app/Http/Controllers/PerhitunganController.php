<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function normalisasi()
    {
        $kriterias = Kriteria::all(); // ambil semua kriteria
        $pegawais = Pegawai::with('penilaians')->get(); // relasi penilaian

        $matrix = [];
        $sumKuadrat = [];

        // 1. Susun Matriks Penilaian dan Hitung Jumlah Kuadrat per Kriteria
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? 0;

                $matrix[$pegawai->id][$kriteria->id] = $nilai;

                // hitung jumlah kuadrat nilai per kriteria
                if (!isset($sumKuadrat[$kriteria->id])) {
                    $sumKuadrat[$kriteria->id] = 0;
                }

                $sumKuadrat[$kriteria->id] += pow($nilai, 2);
            }
        }

        // 2. Hitung Matriks Normalisasi
        $normalisasi = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $matrix[$pegawai->id][$kriteria->id];
                $pembagi = sqrt($sumKuadrat[$kriteria->id]);

                $normalisasi[$pegawai->id][$kriteria->id] = $pembagi > 0 ? $nilai / $pembagi : 0;
            }
        }


        return view('superadmin.normalisasi.index', compact('pegawais', 'kriterias', 'normalisasi'));
    }

    public function terbobot()
    {
        $kriterias = Kriteria::all();
        $pegawais = Pegawai::with('penilaians')->get();

        // === Step 1: Bangun Matriks Penilaian dan Sum Kuadrat ===
        $matrix = [];
        $sumKuadrat = [];

        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? 0;
                $matrix[$pegawai->id][$kriteria->id] = $nilai;
                $sumKuadrat[$kriteria->id] = ($sumKuadrat[$kriteria->id] ?? 0) + pow($nilai, 2);
            }
        }

        // === Step 2: Normalisasi ===
        $normalisasi = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $pembagi = sqrt($sumKuadrat[$kriteria->id]);
                $nilai = $matrix[$pegawai->id][$kriteria->id];
                $normalisasi[$pegawai->id][$kriteria->id] = $pembagi > 0 ? $nilai / $pembagi : 0;
            }
        }

        // === Step 3: Matriks Terbobot ===
        $terbobot = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $bobot = $kriteria->bobot / 100; // Ubah bobot jadi desimal
                $rij = $normalisasi[$pegawai->id][$kriteria->id];
                $terbobot[$pegawai->id][$kriteria->id] = $rij * $bobot;
            }
        }

        return view('superadmin.terbobot.index', compact('pegawais', 'kriterias', 'terbobot'));
    }
    public function solusi()
    {
        $kriterias = Kriteria::all();
        $pegawais = Pegawai::with('penilaians')->get();

        // === Step 1: Buat Matriks Penilaian & Normalisasi & Terbobot ===
        $matrix = [];
        $sumKuadrat = [];

        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? 0;
                $matrix[$pegawai->id][$kriteria->id] = $nilai;
                $sumKuadrat[$kriteria->id] = ($sumKuadrat[$kriteria->id] ?? 0) + pow($nilai, 2);
            }
        }

        $normalisasi = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $pembagi = sqrt($sumKuadrat[$kriteria->id]);
                $nilai = $matrix[$pegawai->id][$kriteria->id];
                $normalisasi[$pegawai->id][$kriteria->id] = $pembagi > 0 ? $nilai / $pembagi : 0;
            }
        }

        $terbobot = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $bobot = $kriteria->bobot / 100;
                $rij = $normalisasi[$pegawai->id][$kriteria->id];
                $terbobot[$pegawai->id][$kriteria->id] = $rij * $bobot;
            }
        }

        // === Step 2: Solusi Ideal + dan -
        $idealPositif = [];
        $idealNegatif = [];

        foreach ($kriterias as $kriteria) {
            $nilaiKolom = array_column(array_map(function ($v) use ($kriteria) {
                return [$kriteria->id => $v[$kriteria->id]];
            }, $terbobot), $kriteria->id);

            if ($kriteria->jenis == 'benefit') {
                $idealPositif[$kriteria->id] = max($nilaiKolom);
                $idealNegatif[$kriteria->id] = min($nilaiKolom);
            } else { // cost
                $idealPositif[$kriteria->id] = min($nilaiKolom);
                $idealNegatif[$kriteria->id] = max($nilaiKolom);
            }
        }

        return view('superadmin.solusi.index', compact('kriterias', 'idealPositif', 'idealNegatif'));
    }
    public function jarak()
    {
        $kriterias = Kriteria::all();
        $pegawais = Pegawai::with('penilaians')->get();

        // === Step 1: Matriks Penilaian, Normalisasi, Terbobot ===
        $matrix = [];
        $sumKuadrat = [];

        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? 0;
                $matrix[$pegawai->id][$kriteria->id] = $nilai;
                $sumKuadrat[$kriteria->id] = ($sumKuadrat[$kriteria->id] ?? 0) + pow($nilai, 2);
            }
        }

        $normalisasi = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $pembagi = sqrt($sumKuadrat[$kriteria->id]);
                $nilai = $matrix[$pegawai->id][$kriteria->id];
                $normalisasi[$pegawai->id][$kriteria->id] = $pembagi > 0 ? $nilai / $pembagi : 0;
            }
        }

        $terbobot = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $bobot = $kriteria->bobot / 100;
                $rij = $normalisasi[$pegawai->id][$kriteria->id];
                $terbobot[$pegawai->id][$kriteria->id] = $rij * $bobot;
            }
        }

        // === Step 2: Hitung Solusi Ideal ===
        $idealPositif = [];
        $idealNegatif = [];

        foreach ($kriterias as $kriteria) {
            $nilaiKolom = array_column(array_map(fn($v) => [$kriteria->id => $v[$kriteria->id]], $terbobot), $kriteria->id);

            if ($kriteria->jenis === 'benefit') {
                $idealPositif[$kriteria->id] = max($nilaiKolom);
                $idealNegatif[$kriteria->id] = min($nilaiKolom);
            } else {
                $idealPositif[$kriteria->id] = min($nilaiKolom);
                $idealNegatif[$kriteria->id] = max($nilaiKolom);
            }
        }

        // === Step 3: Hitung D+ dan D− untuk masing-masing pegawai
        $jarak = [];

        foreach ($pegawais as $pegawai) {
            $dPlus = 0;
            $dMinus = 0;

            foreach ($kriterias as $kriteria) {
                $yij = $terbobot[$pegawai->id][$kriteria->id];
                $dPlus += pow($yij - $idealPositif[$kriteria->id], 2);
                $dMinus += pow($yij - $idealNegatif[$kriteria->id], 2);
            }

            $jarak[$pegawai->id] = [
                'nama' => $pegawai->nama,
                'd_plus' => sqrt($dPlus),
                'd_minus' => sqrt($dMinus),
            ];
        }

        return view('superadmin.jarak.index', compact('jarak'));
    }
    public function preferensi()
    {
        $kriterias = Kriteria::all();
        $pegawais = Pegawai::with('penilaians')->get();

        // === Matriks Penilaian, Normalisasi, dan Terbobot ===
        $matrix = [];
        $sumKuadrat = [];

        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? 0;
                $matrix[$pegawai->id][$kriteria->id] = $nilai;
                $sumKuadrat[$kriteria->id] = ($sumKuadrat[$kriteria->id] ?? 0) + pow($nilai, 2);
            }
        }

        $normalisasi = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $pembagi = sqrt($sumKuadrat[$kriteria->id]);
                $nilai = $matrix[$pegawai->id][$kriteria->id];
                $normalisasi[$pegawai->id][$kriteria->id] = $pembagi > 0 ? $nilai / $pembagi : 0;
            }
        }

        $terbobot = [];
        foreach ($pegawais as $pegawai) {
            foreach ($kriterias as $kriteria) {
                $bobot = $kriteria->bobot / 100;
                $rij = $normalisasi[$pegawai->id][$kriteria->id];
                $terbobot[$pegawai->id][$kriteria->id] = $rij * $bobot;
            }
        }

        // === Solusi Ideal + dan -
        $idealPositif = [];
        $idealNegatif = [];

        foreach ($kriterias as $kriteria) {
            $nilaiKolom = array_column(array_map(fn($v) => [$kriteria->id => $v[$kriteria->id]], $terbobot), $kriteria->id);

            if ($kriteria->jenis == 'benefit') {
                $idealPositif[$kriteria->id] = max($nilaiKolom);
                $idealNegatif[$kriteria->id] = min($nilaiKolom);
            } else {
                $idealPositif[$kriteria->id] = min($nilaiKolom);
                $idealNegatif[$kriteria->id] = max($nilaiKolom);
            }
        }

        // === Hitung Jarak dan Preferensi
        $hasil = [];

        foreach ($pegawais as $pegawai) {
            $dPlus = 0;
            $dMinus = 0;

            foreach ($kriterias as $kriteria) {
                $yij = $terbobot[$pegawai->id][$kriteria->id];
                $dPlus += pow($yij - $idealPositif[$kriteria->id], 2);
                $dMinus += pow($yij - $idealNegatif[$kriteria->id], 2);
            }

            $dPlus = sqrt($dPlus);
            $dMinus = sqrt($dMinus);
            $vi = ($dPlus + $dMinus) > 0 ? $dMinus / ($dPlus + $dMinus) : 0;

            $hasil[] = [
                'nama' => $pegawai->nama,
                'd_plus' => $dPlus,
                'd_minus' => $dMinus,
                'preferensi' => $vi,
            ];
        }

        // Urutkan berdasarkan preferensi tertinggi
        usort($hasil, fn($a, $b) => $b['preferensi'] <=> $a['preferensi']);

        return view('superadmin.preferensi.index', compact('hasil'));
    }
}
