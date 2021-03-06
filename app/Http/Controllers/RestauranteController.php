<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RestauranteCrear;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class RestauranteController extends Controller
{
    /*LogIn y LogOut*/
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $datos = $request->except('_token','_method');
        $user = DB::table("tbl_user")->where('email_usu','=',$datos['email_usu'])->where('contra_usu','=',MD5($datos['contra_usu']))->count();
        if($user == 1){
            //Establecemos session y lo enviamos a la pag que toca
            $id_usu=DB::select('select id_usu, email_usu from tbl_user where email_usu="'.$datos['email_usu'].'";');
            Session::put('id_usu',$id_usu[0]->id_usu);
            $rol = DB::table("tbl_user")->select('id_rol_fk')->where('email_usu','=',$datos['email_usu'])->where('contra_usu','=',MD5($datos['contra_usu']))->first();
            if($rol->id_rol_fk == 1){
                $request->session()->put('nombre_admin',$request->email_usu);
            }elseif($rol->id_rol_fk == 2){
                $request->session()->put('nombre_cliente',$request->email_usu);
            }
            return redirect('/mostrar');
        }else{
            //No establecemos session y lo enviamos a login
            return redirect('login');
        }
        return $user;
    }

    public function logout(Request $request){
        //Olvidas
        $request->session()->forget('nombre_admin');
        //Eliminar todo
        $request->session()->flush();
        return redirect('/');
    }

    /*Mostrar*/
    public function mostrarRestaurante(){
        $listaRestaurante = DB::table('tbl_resta')->select('id_tipo_fk')->select('id_gerente_fk')->join('tbl_user','tbl_resta.id_gerente_fk','=','tbl_user.id_usu')->join('tbl_tipo','tbl_resta.id_tipo_fk','=','tbl_tipo.id_tipo')->select('*')->get();
        return view('mostrar', compact('listaRestaurante'));
        //return $listaRestaurante;
    }

    /*Crear*/
    public function crearRestaurante(){
        $user=DB::select('select u.id_usu, u.nombre_usu from tbl_user u inner join tbl_rol r on u.id_rol_fk=r.id_rol where u.id_rol_fk=3;');
        $tipo=DB::select('select id_tipo, nom_tipo from tbl_tipo;');
        return view('crear', compact('user','tipo'));
    }

    public function crearRestaurantePost(Request  $request){
        $datos = $request->except('_token');
        $request->validate([
            'nom_resta'=>'required|string|max:30',
            'ciudad_resta'=>'required|string|max:30',
            'direccion_resta'=>'required|string|max:200',
            'ubi_resta'=>'required|string|max:130',
            'telf_resta'=>'required|string|min:9|max:9',
            'precio_resta'=>'required|string|min:1|max:3',
            'foto_resta'=>'required|mimes:jpg,png,jpeg,webp,svg,gif',
            'id_gerente_fk'=>'required|',
            'id_tipo_fk'=>'required|',
            'cp_resta'=>'required|string|max:5'
        ]);
        if($request->hasFile('foto_resta')){
            $datos['foto_resta'] = $request->file('foto_resta')->store('uploads','public');
        }else{
            $datos['foto_resta'] = NULL;
        }

        try{
            DB::beginTransaction();
            DB::table('tbl_resta')->insertGetId(["nom_resta"=>$datos['nom_resta'],"ciudad_resta"=>$datos['ciudad_resta'],"direccion_resta"=>$datos['direccion_resta'],"ubi_resta"=>$datos['ubi_resta'],"telf_resta"=>$datos['telf_resta'],"precio_resta"=>$datos['precio_resta'],"foto_resta"=>$datos['foto_resta'],"id_gerente_fk"=>$datos['id_gerente_fk'],"id_tipo_fk"=>$datos['id_tipo_fk'],"cp_resta"=>$datos['cp_resta']]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Eliminar*/
    public function eliminarRestaurante($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_resta')->where('id_resta','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Actualizar*/
    public function modificarRestaurante($id){
        $restaurante=DB::table('tbl_resta')->join('tbl_user','tbl_resta.id_gerente_fk','=','tbl_user.id_usu')->join('tbl_tipo','tbl_resta.id_tipo_fk','=','tbl_tipo.id_tipo')->select()->where('id_resta','=',$id)->first();
        $user=DB::select('select u.id_usu, u.nombre_usu from tbl_user u inner join tbl_rol r on u.id_rol_fk=r.id_rol where u.id_rol_fk=3;');
        $tipo=DB::select('select id_tipo, nom_tipo from tbl_tipo;');
        return view('modificar', compact('restaurante','user','tipo'));
    }

    public function modificarRestaurantePut(Request $request){
        $datos=$request->except('_token','_method');
        if ($request->hasFile('foto_resta')) {
            $foto = DB::table('tbl_resta')->select('foto_resta')->where('id_resta','=',$request['id_resta'])->first();
            if ($foto->foto_resta != null) {
                Storage::delete('public/'.$foto->foto_resta);
            }
            $datos['foto_resta'] = $request->file('foto_resta')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_resta')->select('foto_resta')->where('id_resta','=',$request['id_resta'])->first();
            $datos['foto_resta'] = $foto->foto_resta;
        }
        
        try {
            DB::beginTransaction();
            DB::table('tbl_resta')->where('id_resta','=',$datos['id_resta'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Filtro restaurantes*/
    public function filtroController(Request $request){
        $query = "SELECT * FROM tbl_resta inner join tbl_tipo on tbl_resta.id_tipo_fk=tbl_tipo.id_tipo WHERE id_resta>0"; //QUERY PRINCIPAL
        if(!empty($request->input('cocina'))){
            $query .= " AND nom_tipo IN('".$request->input('cocina')."')"; //FILTRO TIPOS DE COCINA
        }
        $query .= " AND nom_resta like '%".$request->input('filtro')."%';"; //FILTRO NOMBRES
        $datos=DB::select($query);
        return response()->json($datos);
    
    }

    /*Ficha restaurante*/
    public function fichaRestaurante($id){
        $restaurante=DB::table('tbl_resta')->join('tbl_user','tbl_resta.id_gerente_fk','=','tbl_user.id_usu')->join('tbl_tipo','tbl_resta.id_tipo_fk','=','tbl_tipo.id_tipo')->select()->where('id_resta','=',$id)->first();
        $reviews=DB::select('select r.id_rev, r.valoracion_rev, r.texto_rev, r.id_usu_fk, r.id_resta_fk, re.id_resta, u.id_usu, u.nombre_usu, u.apellido_usu from tbl_review r inner join tbl_resta re on r.id_resta_fk=re.id_resta inner join tbl_user u on r.id_usu_fk=id_usu where re.id_resta='.$id.';');
        return view('ficharestaurante', compact('restaurante','reviews'));
    }

    /*Crear review*/
    public function creaReview(Request $request){
        $datos = $request->except('_token');
        // $request->validate([
        //     'nota_resta'=>'required|'
        // ]);
        try{
            DB::beginTransaction();
            DB::table('tbl_review')->insertGetId(["id_usu_fk"=>$datos['id_usu'],"id_resta_fk"=>$datos['id_resta'],"valoracion_rev"=>$datos['nota_resta'],"texto_rev"=>$datos['texto_rev']]);
            DB::commit();
            //$reviews=DB::select('select r.id_rev, r.valoracion_rev, r.texto_rev, r.id_usu_fk, r.id_resta_fk, re.id_resta, u.id_usu, u.nombre_usu, u.apellido_usu from tbl_review r inner join tbl_resta re on r.id_resta_fk=re.id_resta inner join tbl_user u on r.id_usu_fk=id_usu where re.id_resta='.$datos['id_resta'].';');
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return Redirect::to('fichaRestaurante/'.$datos['id_resta']);
    }


}
