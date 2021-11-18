<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'articulo' => 'required'
        ]);

        Comentario::create([
            'descripcion' => $request->descripcion,
            'fecha' => date('Y-m-d H:i:s'),
            'articulo_id' => $request->articulo,
            'user_id' => Auth::id()
        ]);

        return back();
    }

    public function destroy($id)
    {
        $c = Comentario::find($id);
        $c->delete();

        return back();
    }
}
