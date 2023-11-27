<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generar(){
        $elementos = Empleado::join('cargos', 'empleados.id_cargo', '=', 'cargos.id_cargo')
        ->select('dni', 'nombre', 'apellidos', 'descripcion', 'telefono')
        ->get();
    
        $pdf = Pdf::loadView('reporte', ['elementos' => $elementos]);
        $pdf->setOption(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    
        return $pdf->download('personal.pdf');
    }

    public function generarReporteAsistencia(){
        $elementos = Empleado::join('asistencias','empleados.dni', '=', 'asistencias.dni')
        ->join('cargos', 'empleados.id_cargo', '=', 'cargos.id_cargo')
        ->select('asistencias.dni', 'apellidos', 'nombre', 'descripcion', 'entrada', 'salida')
        ->get();
        
        $pdf = Pdf::loadView('reporteAsistencia', ['elementos' => $elementos]);
        $pdf->setOption(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->download('asistencia.pdf');
    }
}
