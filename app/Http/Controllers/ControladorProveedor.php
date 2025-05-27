<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Contracts\View\Factory;

class ControladorProveedor extends Controller
{

    public function listar_proveedores(){
        $listar = Proveedor::listar_proveedores();
        return response()->json($listar);
    }
    
}
