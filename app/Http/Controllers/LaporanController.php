<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Klien;
use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\Profil;
use App\Models\Dokumen;
use App\Models\Pegawai;
use App\Models\Program;
use App\Models\Rencana;
use App\Models\Ruangan;
use App\Models\Dataumum;
use App\Models\Evaluasi;
use App\Models\Karyawan;
use App\Models\Komponen;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Prestasi;
use App\Models\Pengaduan;
use App\Models\Penilaian;
use App\Models\Transaksi;
use App\Models\Distribusi;
use App\Models\Inventaris;
use App\Models\Kodefikasi;
use App\Models\LaporKerja;
use App\Models\Pembiayaan;
use App\Models\Perusahaan;
use App\Models\Verifikasi;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function klien()
    {
        return view('superadmin.laporan.klien');
    }
    public function dokumen()
    {
        return view('superadmin.laporan.dokumen');
    }
    public function verifikasi()
    {
        return view('superadmin.laporan.verifikasi');
    }
    public function evaluasi()
    {
        return view('superadmin.laporan.evaluasi');
    }
    public function index()
    {
        return view('superadmin.laporan.index');
    }

    public function kriteria()
    {
        $data = Kriteria::get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_kriteria', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function pegawai()
    {
        $data = Pegawai::get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_pegawai', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function penilaian()
    {
        $data = Penilaian::get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_penilaian', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function hasil()
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

        $pdf = Pdf::loadView('superadmin.laporan.pdf_hasil', compact('hasil'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
}
