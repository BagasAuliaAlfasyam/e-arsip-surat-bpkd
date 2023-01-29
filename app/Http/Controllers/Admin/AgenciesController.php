<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agencies;

use Yajra\DataTables\Facades\DataTables;

class AgenciesController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Agencies::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal' . $item->id . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('agencies.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action'])
                ->make();
        }
        $agencies = Agencies::all();

        return view('pages.admin.agencies.index', [
            'agencies' => $agencies
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Agencies::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('agencies.index')
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Agencies::where('id', $id)
            ->update([
                'name' => $request->name
            ]);

        return redirect()
            ->route('agencies.index')
            ->with('success', 'Sukses! 1 Data telah diperbarui');
    }

    public function destroy($id)
    {
        $item = Agencies::findorFail($id);

        $item->delete();

        return redirect()
            ->route('agencies.index')
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
