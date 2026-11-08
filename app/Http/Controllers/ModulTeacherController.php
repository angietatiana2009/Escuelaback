<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulTeacherController extends Controller
{
    <?php

namespace App\Http\Controllers;

// Importa el modelo que representa la tabla areas.
use App\Models\Areas;
// Permite recibir y validar los datos enviados por Postman.
use Illuminate\Http\Request;

// Controlador que devuelve respuestas JSON para el recurso areas.
class AreasController extends Controller
{
    // Devuelve todas las areas ordenadas de la mas reciente a la mas antigua.
    public function index()
    {
        // Consulta la tabla areas y prepara una respuesta JSON.
        return response()->json(Areas::orderByDesc('id')->get());
    }

    // Crea una nueva area con los datos recibidos desde la API.
    public function store(Request $request)
    {
        // Valida que el nombre exista, sea texto y no supere 255 caracteres.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Guarda el registro usando los campos permitidos por el modelo.
        $area = Areas::create($data);

        // Devuelve el registro creado con el estado HTTP 201.
        return response()->json($area, 201);
    }

    // Devuelve una area especifica usando su identificador de la URL.
    public function show(Areas $area)
    {
        // Laravel inyecta automaticamente el registro solicitado.
        return response()->json($area);
    }

    // Actualiza una area existente con los datos enviados por la API.
    public function update(Request $request, Areas $area)
    {
        // Valida nuevamente el nombre antes de modificar el registro.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Actualiza solamente los campos validados.
        $area->update($data);

        // Devuelve el registro despues de aplicar los cambios.
        return response()->json($area);
    }

    // Elimina una area especifica usando su identificador.
    public function destroy(Areas $area)
    {
        // Borra el registro encontrado por el enlace de modelo de Laravel.
        $area->delete();

        // Confirma al cliente que la eliminacion fue realizada.
        return response()->json([
            'message' => 'Area eliminada correctamente.',
        ]);
    }
}

}
