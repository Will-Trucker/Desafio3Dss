<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        // if(Auth::user()->userType == 'user'){
        //     return view('dashboard');
        // } else {
        //     return view('admin.home');
        // } 
        $empleados = null;
        // Si el usuario es administrador, obtenemos los empleados
        if(Auth::user()->userType == 'admin'){
            $empleados = Empleado::all();
        }
        if(Auth::user()->userType == 'user'){
            return view('dashboard');
        } else {
            // Pasar los empleados a la vista admin.home
            return view('admin.home', ['empleados' => $empleados]);
        } 
    }

    public function page(){
        return view('adminpage');
    }
}
