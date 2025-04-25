<?php

namespace App\Http\Controllers;


use App\Models\Gestion;
use App\Models\Empresa;
use App\Models\Camion;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_gestiones = Gestion::count();
        $total_empresas = Empresa::count();
        $total_camiones = Camion::count();
        return view('admin.index',compact('total_gestiones','total_empresas','total_camiones'));
    }
}
