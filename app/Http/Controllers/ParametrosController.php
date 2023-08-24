<?php

namespace App\Http\Controllers;

use App\Parametros;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    public function getPrestamosList(){
        $prestamos = Parametros::where('codigo', 'Prestamo')->get();

        $response = array('error' => false, 'prestamos' => $prestamos);

        return response()->json($response);
    }

    
}
