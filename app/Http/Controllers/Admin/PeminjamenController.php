<?php

namespace App\Http\Controllers\Admin;

use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePeminjamenRequest;
use App\Http\Requests\Admin\UpdatePeminjamenRequest;

class PeminjamenController extends Controller
{
    /**
     * Display a listing of Peminjaman.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('peminjaman_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('peminjaman_delete')) {
                return abort(401);
            }
            $peminjamen = Peminjaman::onlyTrashed()->get();
        } else {
            $peminjamen = Peminjaman::all();
        }

        return view('admin.peminjamen.index', compact('peminjamen'));
    }

    /**
     * Show the form for creating new Peminjaman.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('peminjaman_create')) {
            return abort(401);
        }
        
        $namas = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $judul_bukus = \App\Product::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.peminjamen.create', compact('namas', 'judul_bukus'));
    }

    /**
     * Store a newly created Peminjaman in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamenRequest $request)
    {
        if (! Gate::allows('peminjaman_create')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::create($request->all());



        return redirect()->route('admin.peminjamen.index');
    }


    /**
     * Show the form for editing Peminjaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('peminjaman_edit')) {
            return abort(401);
        }
        
        $namas = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $judul_bukus = \App\Product::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $peminjaman = Peminjaman::findOrFail($id);

        return view('admin.peminjamen.edit', compact('peminjaman', 'namas', 'judul_bukus'));
    }

    /**
     * Update Peminjaman in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamenRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamenRequest $request, $id)
    {
        if (! Gate::allows('peminjaman_edit')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());



        return redirect()->route('admin.peminjamen.index');
    }


    /**
     * Display Peminjaman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('peminjaman_view')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::findOrFail($id);

        return view('admin.peminjamen.show', compact('peminjaman'));
    }


    /**
     * Remove Peminjaman from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('peminjaman_delete')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('admin.peminjamen.index');
    }

    /**
     * Delete all selected Peminjaman at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('peminjaman_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Peminjaman::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Peminjaman from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('peminjaman_delete')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::onlyTrashed()->findOrFail($id);
        $peminjaman->restore();

        return redirect()->route('admin.peminjamen.index');
    }

    /**
     * Permanently delete Peminjaman from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('peminjaman_delete')) {
            return abort(401);
        }
        $peminjaman = Peminjaman::onlyTrashed()->findOrFail($id);
        $peminjaman->forceDelete();

        return redirect()->route('admin.peminjamen.index');
    }
}
