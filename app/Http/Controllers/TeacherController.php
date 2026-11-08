<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

// Controlador que devuelve respuestas JSON para el recurso teachers.
class TeacherController extends Controller
{
    // Devuelve todos los docentes ordenados de la mas reciente a la mas antigua.
    public function index()
    {
        // Consulta la tabla teachers y prepara una respuesta JSON.
        return response()->json(Teacher::orderByDesc('id')->get());
    }

    // Crea una nueva teacher con los datos recibidos desde la API.
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
        $teacher = Teacher::create($data);

        // Devuelve el registro creado con el estado HTTP 201.
        return response()->json($teacher, 201);
    }

    // Devuelve un docente especifico usando su identificador de la URL.
    public function show(Teacher $teacher)
    {
        // Laravel inyecta automaticamente el registro solicitado.
        return response()->json($teacher);
    }

    // Actualiza un docente existente con los datos enviados por la API.
    public function update(Request $request, Teacher $teacher)
    {
        // Valida nuevamente el nombre antes de modificar el registro.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:255'],
        ]);

        // Actualiza solamente los campos validados.
        $teacher->update($data);

        // Devuelve el registro despues de aplicar los cambios.
        return response()->json($teacher);
    }

    // Elimina un docente especifico usando su identificador.
    public function destroy(Teacher $teacher)
    {
        // Borra el registro encontrado por el enlace de modelo de Laravel.
        $teacher->delete();

        // Confirma al cliente que la eliminacion fue realizada.
        return response()->json([
            'message' => 'Docente eliminado correctamente.',
        ]);
    }
}
