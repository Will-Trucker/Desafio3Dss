<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'apellido' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email|unique:empleados|max:255',
            'telefono' => 'required|string|max:20',
            'salario' => 'required|numeric|min:300',
            'cargo' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif'
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.alpa' => 'El nombre solo puede contener letras',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellid.alpa' => 'El apellido solo puede tener letras',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.regex' => 'El correo electrónico debe ser de Gmail, Outlook, iCloud o Yahoo.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.max' => 'El teléfono no puede tener más de 8 caracteres.',
            'salario.required' => 'El salario es obligatorio.',
            'salario.numeric' => 'El salario debe ser numérico.',
            'salario.max' => 'El salario minimo es $300.',
            'cargo.required' => 'El cargo es obligatorio.',
            'cargo.alpa' => 'El cargi solo puede contener letras',
            'foto.image' => 'La foto debe ser una imagen.',
            'foto.mimes' => 'La foto debe ser de tipo jpeg, png, jpg o gif.'
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->salario = $request->input('salario');
        $empleado->cargo = $request->input('cargo');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('foto', $fileName, 'public');
            $empleado->foto = $filePath;
        }

        $empleado->save();

        if(Auth::user()->userType == 'admin'){
            return redirect()->route('index')->with('success','Empleado agregado correctamente'); 
        } else {
           return redirect()->route('login');
        } 
    }

    public function edit($id){
        $empleado = Empleado::findOrFail($id);
        return view('admin.edit',compact('empleado'));
    }

    public function update(Request $request, $id){
       
        $request->validate([
            'nombre' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'apellido' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'salario' => 'required|numeric|min:300',
            'cargo' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.alpa' => 'El nombre solo puede contener letras',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellid.alpa' => 'El apellido solo puede tener letras',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.regex' => 'El correo electrónico debe ser de Gmail, Outlook, iCloud o Yahoo.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.max' => 'El teléfono no puede tener más de 8 caracteres.',
            'salario.required' => 'El salario es obligatorio.',
            'salario.numeric' => 'El salario debe ser numérico.',
            'salario.max' => 'El salario minimo es $300.',
            'cargo.required' => 'El cargo es obligatorio.',
            'cargo.alpa' => 'El cargi solo puede contener letras',
            'foto.image' => 'La foto debe ser una imagen.',
            'foto.mimes' => 'La foto debe ser de tipo jpeg, png, jpg o gif.'
        ]);
        

        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->salario = $request->input('salario');
        $empleado->cargo = $request->input('cargo');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('foto', $fileName, 'public');
            Storage::disk('public')->delete($empleado->foto);
            $empleado->foto = $filePath;
        }



        $empleado->save();
        
        if(Auth::user()->userType == 'admin'){
            return redirect()->route('index')->with('success','Empleado editado correctamente'); 
        } else {
           return redirect()->route('login');
        } 
        
    }

    public function destroy($id){
        $empleado = Empleado::findOrFail($id);

        // Eliminar la foto asociada del almacenamiento si existe
        if ($empleado->foto) {
            Storage::disk('public')->delete($empleado->foto);
        }
    
        // Eliminar al empleado
        $empleado->delete();
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Empleado eliminado correctamente.');
    }
}
