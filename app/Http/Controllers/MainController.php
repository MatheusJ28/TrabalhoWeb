<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Capitulo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $nome = $request->input('nome');

        $obrasQuery = Obra::query();

        if ($nome) {
            $obrasQuery->where('titulo', 'LIKE', "%{$nome}%")
                ->orWhere('autor', 'LIKE', "%{$nome}%");
        } else {
            $obrasQuery->orderBy('nota', 'desc');
        }

        $obras = $obrasQuery->get();

        return view('home', compact('obras'));
    }

    public function destroy(string $titulo)
    {
        $obra = Obra::where('titulo', $titulo)->firstOrFail();

        $obra->delete();

        return redirect()->route('home');
    }

    public function create()
    {
        return view('obra-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255|unique:obras,titulo',
            'autor' => 'required|string|max:255',
            'nota' => 'required|numeric|min:0|max:10',
            'capa_url' => 'required|string',
        ]);

        try {
            Obra::create($request->all());

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->back()->withInput();
        }
    }

    public function show(string $obraTitulo)
    {
        $obraTitulo = trim($obraTitulo);
        $obra = Obra::where('titulo', $obraTitulo)
            ->with(['capitulos' => function ($query) {
                $query->orderBy('numero', 'asc');
            }])
            ->firstOrFail();

        return view('obra-show', compact('obra'));
    }

    public function capitulo(string $obraTitulo, int $numero)
    {
        $obraTitulo = trim($obraTitulo);
        $obra = Obra::where('titulo', $obraTitulo)->firstOrFail();
        $capitulo = Capitulo::where('obra_id', $obra->id)
            ->where('numero', $numero)
            ->firstOrFail();

        return view('capitulo', compact('obra', 'capitulo'));
    }

    public function edit($titulo)
    {
        $obra = Obra::where('titulo', $titulo)->firstOrFail();
        return view('obra-edit', compact('obra'));
    }

    public function update(Request $request, $titulo)
    {
        $obra = Obra::where('titulo', $titulo)->firstOrFail();
        $request->validate([
            'titulo' => 'required|string|max:255|unique:obras,titulo,' . $obra->id,
            'autor' => 'required|string|max:255',
            'capa_url' => 'required|string|max:255',
        ]);

        $obra->titulo = $request->input('titulo');
        $obra->autor = $request->input('autor');
        $obra->capa_url = $request->input('capa_url');

        $obra->save();

        return redirect()->route('obra.show', $obra->titulo);
    }
}
