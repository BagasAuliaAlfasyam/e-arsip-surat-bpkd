<?php

namespace App\Http\Controllers\Admin;

use App\Models\Letter;
use App\Models\Agencies;

use App\Models\Disposisi;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DisposisiController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

        $letters = Letter::all();
        $agencies = Agencies::all();
        return view('pages.admin.disposisi.create', [
            'agencies' => $agencies,
            'letters' => $letters,
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'letter_id' => 'required',
            'agency_id' => 'required',
            'tgl_surat' => 'required',
            'no_agenda' => 'required',
            'tgl_diterima' => 'required',
            'tgl_penyelesaian' => 'required',
            'hal' => 'required',
            'diteruskan_kpd' => 'required',
            'instruksi' => 'required',
            'letter_file' => 'mimes:pdf|file'
        ]);

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
        }
        if ($request->input('diteruskan_kpd')) {
            $validatedData['diteruskan_kpd'] = implode(',', $request->diteruskan_kpd);
        }

        //   ddd($request->all());

        $redirect = 'surat-disposisi';

        Disposisi::create($validatedData);
        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function disposisi_form()
    {
        if (request()->ajax()) {
            $query = Disposisi::with(['letter', 'agency'])->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-disposisi', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('disposisi.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <a class="btn btn-secondary btn-xs" href="' . route('disposisi-surat', $item->id) . '" target="_blank">
                            <i class="fas fa-print"></i> &nbsp; Cetak
                        </a>
                        <form action="' . route('disposisi.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'post_status'])
                ->make();
        }

        return view('pages.admin.disposisi.incoming');
    }

    public function show($id)
    {
        $item = Disposisi::with(['letter', 'agency'])->findOrFail($id);

        return view('pages.admin.disposisi.show', [
            'item' => $item,
        ]);
    }
    public function disposisiprint($id)
    {
        $item = Disposisi::with(['letter', 'agency'])->findOrFail($id);

        return view('pages.admin.disposisi.print-incoming', [
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Disposisi::findOrFail($id);

        $letters = Letter::all();
        $agency = Agencies::all();

        return view('pages.admin.disposisi.edit', [
            'letters' => $letters,
            'agency' => $agency,
            'item' => $item,
            'diteruskan_kpd' => explode(',', $item->diteruskan_kpd),
        ]);
    }

    public function download_letter($id)
    {
        $item = Disposisi::findOrFail($id);

        return Storage::download($item->letter_file);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'letter_id' => 'required',
            'agency_id' => 'required',
            'tgl_surat' => 'required',
            'no_agenda' => 'required',
            'tgl_diterima' => 'required',
            'tgl_penyelesaian' => 'required',
            'hal' => 'required',
            'diteruskan_kpd' => 'required',
            'instruksi' => 'required',
            'letter_file' => 'mimes:pdf|file'
        ]);

        $item = Disposisi::findOrFail($id);

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
        }
        if ($request->input('diteruskan_kpd')) {
            $validatedData['diteruskan_kpd'] = implode(',', $request->diteruskan_kpd);
        }
        $redirect = 'surat-disposisi';

        // dd($request->all());

        $item->update($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = Disposisi::findorFail($id);
        $redirect = 'surat-disposisi';
        Storage::delete($item->letter_file);

        $item->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
