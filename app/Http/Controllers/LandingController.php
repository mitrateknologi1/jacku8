<?php

namespace App\Http\Controllers;

use App\Models\ArsipJurnal;
use App\Models\ArsipKurikulum;
use App\Models\ArsipPenelitian;
use App\Models\BahanAjar;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Kontak;
use App\Models\Kurikulum;
use App\Models\Modul;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Prodi;
use App\Models\Rps;
use App\Models\Sejarah;
use App\Models\SkemaPenelitian;
use App\Models\SkemaPengabdian;
use App\Models\StrukturOrganisasi;
use App\Models\SumberDana;
use App\Models\TampilanBeranda;
use App\Models\Tupoksi;
use App\Models\VisiMisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class LandingController extends Controller
{
    public function index()
    {
        // Coba Update
        $kontak = Kontak::orderBy('id', 'asc')->get();
        $tampilanBeranda = TampilanBeranda::orderBy("id", 'asc')->get();
        $listBerita = Berita::orderBy('id', 'desc')->limit(3)->get();
        return view('landing.pages.landing.index', compact(['kontak', 'tampilanBeranda', 'listBerita']));
    }

    public function sejarah()
    {
        $sejarah = Sejarah::first();
        return view('landing.pages.sejarah.index', compact(['sejarah']));
    }

    public function visiMisi()
    {
        $listVisiMisi = VisiMisi::orderBy('id', 'asc')->get();
        return view('landing.pages.visiMisi.index', compact(['listVisiMisi']));
    }

    public function tupoksi()
    {
        $listTupoksi = Tupoksi::orderBy('id', 'asc')->get();
        return view('landing.pages.tupoksi.index', compact(['listTupoksi']));
    }

    public function strukturOrganisasi()
    {
        $strukturOrganisasi = StrukturOrganisasi::orderBy('id', 'asc')->get();
        return view('landing.pages.strukturOrganisasi.index', compact(['strukturOrganisasi']));
    }

    public function profilKami()
    {
        $strukturOrganisasi = StrukturOrganisasi::orderBy('id', 'asc')->get();
        return view('landing.pages.profilKami.index', compact(['strukturOrganisasi']));
    }

    public function jurnalArsip(Request $request)
    {
        if ($request->ajax()) {
            $data = ArsipJurnal::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiJurnal/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiJurnal/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        return view('landing.pages.dokumen.divisiJurnal.arsip.index');
    }

    public function penelitianArsip(Request $request)
    {
        if ($request->ajax()) {
            $data = ArsipPenelitian::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiPenelitian/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiPenelitian/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        return view('landing.pages.dokumen.divisiPenelitian.arsip.index');
    }

    public function penelitianPengabdian(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengabdian::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                            $query->orWhere('ketua', 'like', '%' . $request->search . '%');
                            $query->orWhere('anggota', 'like', '%' . $request->search . '%');
                            $query->orWhere('besar_dana', 'like', '%' . $request->search . '%');
                            $query->orWhere('tahun', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->sumberDana && $request->sumberDana != "Semua") {
                        $query->whereHas('sumberDana', function ($query) use ($request) {
                            $query->where('id', $request->sumberDana);
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->skema && $request->skema != "Semua") {
                        $query->whereHas('skemaPengabdian', function ($query) use ($request) {
                            $query->where('id', $request->skema);
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('besar_dana', function ($row) {
                    return 'Rp. ' . number_format($row->besar_dana, 0, ',', '.');
                })
                ->addColumn('skema', function ($row) {
                    return $row->skemaPengabdian->nama;
                })
                ->addColumn('sumber_dana', function ($row) {
                    return $row->sumberDana->nama;
                })
                ->addColumn('file', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/proposal/' . $row->file_proposal) .  '"><i class="fas fa-file"></i> Proposal</a><a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/laporan/' . $row->file_laporan) .  '"><i class="fas fa-file"></i> Laporan</a>
                    <a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/luaran/' . $row->file_luaran) .  '"><i class="fas fa-file"></i> Luaran</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/proposal/' . $row->file_proposal) .  '"><i class="fas fa-file"></i> Proposal</a><a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/laporan/' . $row->file_laporan) .  '"><i class="fas fa-file"></i> Laporan</a>
                    <a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/luaran/' . $row->file_luaran) .  '"><i class="fas fa-file"></i> Luaran</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'file'])
                ->make(true);
        }

        $daftarSkema = SkemaPengabdian::orderBy('nama', 'asc')->get();
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiPenelitian.pengabdian.index', compact(['daftarSkema', 'daftarSumberDana']));
    }

    public function penelitianPenelitian(Request $request)
    {
        if ($request->ajax()) {
            $data = Penelitian::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                            $query->orWhere('ketua', 'like', '%' . $request->search . '%');
                            $query->orWhere('anggota', 'like', '%' . $request->search . '%');
                            $query->orWhere('besar_dana', 'like', '%' . $request->search . '%');
                            $query->orWhere('tahun', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->sumberDana && $request->sumberDana != "Semua") {
                        $query->whereHas('sumberDana', function ($query) use ($request) {
                            $query->where('id', $request->sumberDana);
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->skema && $request->skema != "Semua") {
                        $query->whereHas('skemaPenelitian', function ($query) use ($request) {
                            $query->where('id', $request->skema);
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('besar_dana', function ($row) {
                    return 'Rp. ' . number_format($row->besar_dana, 0, ',', '.');
                })
                ->addColumn('skema', function ($row) {
                    return $row->skemaPenelitian->nama;
                })
                ->addColumn('sumber_dana', function ($row) {
                    return $row->sumberDana->nama;
                })
                ->addColumn('file', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/proposal/' . $row->file_proposal) .  '"><i class="fas fa-file"></i> Proposal</a><a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/laporan/' . $row->file_laporan) .  '"><i class="fas fa-file"></i> Laporan</a>
                    <a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/luaran/' . $row->file_luaran) .  '"><i class="fas fa-file"></i> Luaran</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/proposal/' . $row->file_proposal) .  '"><i class="fas fa-file"></i> Proposal</a><a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/laporan/' . $row->file_laporan) .  '"><i class="fas fa-file"></i> Laporan</a>
                    <a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/penelitian/luaran/' . $row->file_luaran) .  '"><i class="fas fa-file"></i> Luaran</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'file'])
                ->make(true);
        }

        $daftarSkema = SkemaPenelitian::orderBy('nama', 'asc')->get();
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiPenelitian.penelitian.index', compact(['daftarSkema', 'daftarSumberDana']));
    }

    public function kurikulumArsip(Request $request)
    {
        if ($request->ajax()) {
            $data = ArsipKurikulum::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        return view('landing.pages.dokumen.divisiKurikulum.arsip.index');
    }

    public function kurikulumKurikulum(Request $request)
    {
        if ($request->ajax()) {
            $data = Kurikulum::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                            $query->orWhere('tahun', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->prodi && $request->prodi != "Semua") {
                        $query->whereHas('prodi', function ($query) use ($request) {
                            $query->where('id', $request->prodi);
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('prodi', function ($row) {
                    return $row->prodi->nama;
                })
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('jenis_dokumen', function ($row) {
                    if ($row->jenis_dokumen == "Privat") {
                        return '<span class="badge badge-warning"><i class="far fa-eye-slash"></i> Privat</span>';
                    } else {
                        return '<span class="badge badge-success"><i class="far fa-eye"></i> Publik</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/kurikulum/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/kurikulum/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiKurikulum.kurikulum.index', compact(['listProdi']));
    }

    public function kurikulumModul(Request $request)
    {
        if ($request->ajax()) {
            $data = Modul::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->prodi && $request->prodi != "Semua") {
                        $query->whereHas('prodi', function ($query) use ($request) {
                            $query->where('id', '=', $request->prodi);
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('prodi', function ($row) {
                    return $row->prodi->nama;
                })
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/modul/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/modul/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiKurikulum.modul.index', compact(['listProdi']));
    }

    public function kurikulumBahanAjar(Request $request)
    {
        if ($request->ajax()) {
            $data = BahanAjar::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->prodi && $request->prodi != "Semua") {
                        $query->whereHas('prodi', function ($query) use ($request) {
                            $query->where('id', '=', $request->prodi);
                        });
                    };
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('prodi', function ($row) {
                    return $row->prodi->nama;
                })
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/bahanAjar/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/bahanAjar/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiKurikulum.bahanAjar.index', compact(['listProdi']));
    }

    public function kurikulumRps(Request $request)
    {
        if ($request->ajax()) {
            $data = Rps::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->prodi && $request->prodi != "Semua") {
                        $query->whereHas('prodi', function ($query) use ($request) {
                            $query->where('id', '=', $request->prodi);
                        });
                    }
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('prodi', function ($row) {
                    return $row->prodi->nama;
                })
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    if ($row->jenis_dokumen == "Publik") {
                        $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/rps/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    } else {
                        if (Auth::check()) {
                            $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/rps/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                        } else {
                            $actionBtn = '<a class="btn btn-danger btn-sm mr-1" href="' . url('/login') .  '"><i class="fas fa-file"></i> Masuk </a>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('landing.pages.dokumen.divisiKurikulum.rps.index', compact(['listProdi']));
    }

    public function detailBerita(Berita $berita)
    {
        return view('landing.pages.berita.show', compact(['berita']));
    }

    public function daftarBerita(Request $request)
    {
        $listBerita = Berita::orderBy('id', 'desc')
            ->where(function ($query) use ($request) {
                if ($request->kategori) {
                    $query->whereHas('kategoriBerita', function ($query) use ($request) {
                        $query->where('id', $request->kategori);
                    });
                };
            })
            ->where(function ($query) use ($request) {
                if ($request->sumber) {
                    $query->where('sumber', $request->sumber);
                }
            })
            ->paginate(9)
            ->withQueryString();
        $listKategori = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('landing.pages.berita.index', compact(['listBerita', 'listKategori']));
    }
}
