<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /*Crear*/
    public function crearUsuario(){
        return view('crearUser');
    }

    public function crearUsuarioPost(Request  $request){
        $datos = $request->except('_token');
        $request->validate([
            'nombre_usu'=>'required|string|max:30',
            'apellido_usu'=>'required|string|max:30',
            'email_usu'=>'required|string|max:10|min:150',
            'tel_usu'=>'required|string|min:9|max:9',
            'contra_usu'=>'required|string|min:4|max:50',
            'foto_usu'=>'required|mimes:jpg,png,jpeg,webp,svg,gif'
        ]);
        if($request->hasFile('foto_usu')){
            $datos['foto_usu'] = $request->file('foto_usu')->store('uploads','public');
        }else{
            $datos['foto_usu'] = NULL;
        }

        try{
            DB::beginTransaction();
            $id = DB::table('tbl_user')->insertGetId(["nombre_usu"=>$datos['nombre_usu'],"apellido_usu"=>$datos['apellido_usu'],"email_usu"=>$datos['email_usu'],"tel_usu"=>$datos['tel_usu'],"contra_usu"=>MD5($datos['contra_usu']),"foto_usu"=>$datos['foto_usu']]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Actualizar*/
    public function modificarUsuario($id){
        $usuario=DB::table('tbl_user')->select()->where('id_usu','=',$id)->first();
        return view('modificar', compact('usuario'));
    }

    public function modificarUsuarioPut(Request $request){
        $datos=$request->except('_token','_method');
        if ($request->hasFile('foto_usu')) {
            $foto = DB::table('tbl_user')->select('foto_usu')->where('id_usu','=',$request['id_usu'])->first();
            if ($foto->foto_usu != null) {
                Storage::delete('public/'.$foto->foto_usu);
            }
            $datos['foto_usu'] = $request->file('foto_usu')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_user')->select('foto_usu')->where('id_usu','=',$request['id_usu'])->first();
            $datos['foto_usu'] = $foto->foto_usu;
        }

        try {
            DB::beginTransaction();
            DB::table('tbl_user')->where('id_usu','=',$datos['id_usu'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrar');
    }

    /*Eliminar*/
    public function eliminarUsuario($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_user')->where('id_usu','=',$id)->delete();
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
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
