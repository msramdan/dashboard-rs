<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Http\Requests\{StoreAdministrasiRequest, UpdateAdministrasiRequest};
use Yajra\DataTables\Facades\DataTables;

class AdministrasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:administrasi view')->only('index', 'show');
        $this->middleware('permission:administrasi create')->only('create', 'store');
        $this->middleware('permission:administrasi edit')->only('edit', 'update');
        $this->middleware('permission:administrasi delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $administrasi = Administrasi::query();

            return DataTables::of($administrasi)
                ->addColumn('action', 'administrasi.include.action')
                ->toJson();
        }

        return view('administrasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministrasiRequest $request)
    {

        Administrasi::create($request->validated());

        return redirect()
            ->route('administrasi.index')
            ->with('success', __('The administrasi was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Administrasi $administrasi)
    {
        return view('administrasi.show', compact('administrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrasi $administrasi)
    {
        return view('administrasi.edit', compact('administrasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministrasiRequest $request, Administrasi $administrasi)
    {

        $administrasi->update($request->validated());

        return redirect()
            ->route('administrasi.index')
            ->with('success', __('The administrasi was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrasi $administrasi)
    {
        try {
            $administrasi->delete();

            return redirect()
                ->route('administrasi.index')
                ->with('success', __('The administrasi was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('administrasi.index')
                ->with('error', __("The administrasi can't be deleted because it's related to another table."));
        }
    }
}
