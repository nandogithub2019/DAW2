<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class filmController extends Controller
{


    public function eloquent(){

        /* $consulta = clientes::all();  // devuelve todos los registros de la tabla clientes
        return $consulta;  */

        //['id','nombre','apellido','correo','id_tipo_clientes'];
        /*
        Inserción de un registro en la tabla clientes

        $clientes = new clientes;
        $clientes->id = 3;
        $clientes->nombre = 'Noe';
        $clientes->apellido = 'García';
        $clientes->correo = 'noe@garcia.com';
        $clientes->id_tipo_clientes = 2;
        $clientes->save();
        return "operación realizada";  */


        /*
        Otra manera de hacer ua inserción
        $clientes = clientes::create(['id'=>6,'nombre'=>'ja','apellido'=>'Pé','correo'=>'ja@pe.com','id_tipo_clientes'=>1],['id'=>7,'nombre'=>'Pedro','apellido'=>'Péres','correo'=>'pedro@peres.com','id_tipo_clientes'=>2]
        );
        return "operacines realizada"; */

        /*
        Modifica un registro buscando por el id  que es la clave primaria
        $clientes = clientes::find(3);
        $clientes->nombre = 'Carlos';
        $clientes->apellido = 'Garcia';
        $clientes->save();

        return "modificación realizada"; */

        /* 
        También modifica un registro, cuando el nombre es Paco lo actualiza a Cristi. Se pueden encadenar más clausulas where
        clientes::where('nombre','Paco')
        ->update(['nombre'=>'Cristi']);

        return "modificación realizada"; */

        /* 
        eliminar uun registro con id = 1
        clientes::destroy(1);

        return "eliminación realizada"; */

        /* 
        elimina un registro sabiendo la llave primaria
        $clientes = clientes::find(3);
        $clientes->delete();

        return "eliminado registro"; */

        $clientes = clientes::where('id_tipo_clientes',1)
        ->where('nombre','javi')
        ->delete();

        return "eliminado registro";


    }


    public function inicio(){
        
        return view('inicio');
    }

    public function pelicula(){
        if (Auth::check()) {
            return view('pelicula');
        }else{
            return view('inicio');
        }
        
    }

    
    
    public function contacta(){
        
        return view('contacta');
    }


    

    public function vistaCategories()
    {
        return view('categories');
    }

    
    public function vistaBootstrap()
    {
        return view('layout');
    }

  


}
