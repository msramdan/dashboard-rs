<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use App\Http\Requests\{StoreLaboratoriumRequest, UpdateLaboratoriumRequest};
use Yajra\DataTables\Facades\DataTables;

class LaboratoriumController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laboratorium view')->only('index', 'show');
        $this->middleware('permission:laboratorium create')->only('create', 'store');
        $this->middleware('permission:laboratorium edit')->only('edit', 'update');
        $this->middleware('permission:laboratorium delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('laboratoriums.index');
    }
}
