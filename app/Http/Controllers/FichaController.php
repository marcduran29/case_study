<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use Illuminate\Support\Facades\Auth;

class FichaController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'estudiante') {
            $fichas = Ficha::where('student_id', $user->id)->get();
        } else {
            $fichas = Ficha::where('profesor_id', $user->id)->get();
        }

        return response()->json($fichas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|array',
        ]);

        $ficha = Ficha::create([
            'profesor_id' => Auth::id(),
            'nombre' => $request->nombre,
            'contenido' => json_encode($request->contenido), // Almacena como JSON
        ]);

        return response()->json($ficha, 201);
    }

    public function show(Ficha $ficha)
    {
        return response()->json($ficha);
    }

    public function update(Request $request, Ficha $ficha)
    {
        if ($ficha->profesor_id !== Auth::id()) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'contenido' => 'required|array',
        ]);

        $ficha->update([
            'nombre' => $request->nombre,
            'contenido' => json_encode($request->contenido),
        ]);

        return response()->json($ficha);
    }

    public function destroy(Ficha $ficha)
    {
        if ($ficha->profesor_id !== Auth::id()) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $ficha->delete();
        return response()->json(['message' => 'Ficha eliminada']);
    }
}
