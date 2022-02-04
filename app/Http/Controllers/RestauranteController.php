<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RestauranteCrear;

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
            $rol = DB::table("tbl_user")->select('id_rol_fk')->where('email_usu','=',$datos['email_usu'])->where('contra_usu','=',MD5($datos['contra_usu']))->first();
            if($rol->id_rol_fk =="1"){
                $request->session()->put('nombre_admin',$request->email_usu);
            }
            return redirect('/mostrar');
        }else{
            //No establecemos session y lo enviamos a login
            return redirect('');
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

    public function mostrarRestaurante(){
        $listaRestaurante = DB::table('tbl_resta')->join('tbl_user','tbl_resta.id_gerente_fk','=','tbl_user.id_usu')->join('tbl_rol','tbl_user.id_usu','=','tbl_rol.id_rol')->select('*')->get();
        return view('mostrar', compact('listaRestaurante'));
        //return $listaRestaurante;
    }

    /*Crear*/
    public function crearRestaurante(){
        return view('crear');
    }

    public function crearRestaurantePost(RestauranteCrear  $request){
        $datos = $request->except('_token');
        $request->validate([
            'nom_resta'=>'required|string|max:30',
            'ciudad_resta'=>'required|string|max:30',
            'direccion_resta'=>'required|string|max:10|min:10',
            'ubi_resta'=>'required|int|min:18|max:130',
            'telf_resta'=>'required|string|min:9|max:9',
            'precio_resta'=>'required|string|min:9|max:9',
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
        //return redirect('mostrar');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurante $restaurante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        //
    }
}