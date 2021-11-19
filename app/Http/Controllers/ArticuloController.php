<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Articulo;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Articulo::orderBy('fecha', 'DESC')->get();

        return view('articulos.index', [
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $a = Articulo::find($id);

        return view('articulos.show', [
            'articulo' => $a,
            'user' => Auth::user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        Articulo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha' => date('Y-m-d H:i:s'),
            'user_id' => Auth::id()
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        $a = Articulo::find($request->id);
        $a->titulo = $request->titulo;
        $a->descripcion = $request->descripcion;
        $a->save();

        return back();
    }
}
