<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestauranteController extends Controller
{
    /* public function leerController(Request $request){
        $datos=DB::select('select * from tbl_resta where nom_resta like ?',['%'.$request->input('filtro').'%']);
        return response()->json($datos);
    } */

    public function filtroController(Request $request){
        $query = "SELECT * FROM tbl_resta inner join tbl_tipo on tbl_resta.id_tipo_fk=tbl_tipo.id_tipo WHERE id_resta>0";
        if(!empty($request->input('cocina'))){
            $query .= " AND nom_tipo IN('".$request->input('cocina')."')";
        }
        $query .= " AND nom_resta like '%".$request->input('filtro')."%';"; //FILTRO NOMBRES
        $datos=DB::select($query);
        return response()->json($datos);
    
    } 
}
