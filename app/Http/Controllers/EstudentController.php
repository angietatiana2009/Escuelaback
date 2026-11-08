<?php

namespace App\Http\Controllers;
use App\Models\Estudent;
use Illuminate\Http\Request;

// Controlador que devuelve respuestas JSON para el recurso estudents.
class EstudentController extends Controller
{
    // Devuelve todos los estudiantes ordenados de la mas reciente a la mas antigua.
    public function index()
    {
        // Consulta la tabla estudents y prepara una respuesta JSON.
        return response()->json(Estudent::orderByDesc('id')->get());
    }

    // Crea una nueva estudiante con los datos recibidos desde la API.
    public function store(Request $request)
    {
        // Valida que el nombre exista, sea texto y no supere 255 caracteres.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:255'],
        ]);

        // Guarda el registro usando los campos permitidos por el modelo.
        $estudent = Estudent::create($data);

        // Devuelve el registro creado con el estado HTTP 201.
        return response()->json($estudent, 201);
    }

    // Devuelve un estudiante especifico usando su identificador de la URL.
    public function show(Estudent $estudent)
    {
        // Laravel inyecta automaticamente el registro solicitado.
        return response()->json($estudent);
    }

    // Actualiza un estudiante existente con los datos enviados por la API.
    public function update(Request $request, Estudent $estudent)
    {
        // Valida nuevamente el nombre antes de modificar el registro.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:255'],
        ]);

        // Actualiza solamente los campos validados.
        $estudent->update($data);

        // Devuelve el registro despues de aplicar los cambios.
        return response()->json($estudent);
    }

    // Elimina un estudiante especifico usando su identificador.
    public function destroy(Estudent $estudent)
    {
        // Borra el registro encontrado por el enlace de modelo de Laravel.
        $estudent->delete();

        // Confirma al cliente que la eliminacion fue realizada.
        return response()->json([
            'message' => 'Estudiante eliminado correctamente.',
        ]);
    }
}
