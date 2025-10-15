<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Capitulo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function destroy(string $slug)
    {
        $obra = Obra::where('slug', $slug)->firstOrFail();

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
            $dados = $request->all();

            $dados['slug'] = Str::slug($request->titulo);

            Obra::create($dados);

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->back()->withInput();
        }
    }

    public function show(string $slug)
    {
        $slug = trim($slug);
        $obra = Obra::where('slug', $slug)  
            ->with(['capitulos' => function ($query) {
                $query->orderBy('numero', 'asc');
            }])
            ->firstOrFail();

        return view('obra-show', compact('obra'));
    }

    public function capitulo(string $slug, int $numero)
    {
        $obra = Obra::where('slug', $slug)->firstOrFail();
        $capitulo = Capitulo::where('obra_id', $obra->id)
            ->where('numero', $numero)
            ->firstOrFail();

        return view('capitulo', compact('obra', 'capitulo'));
    }

    public function edit($slug)
    {
        $obra = Obra::where('slug', $slug)->firstOrFail();
        return view('obra-edit', compact('obra'));
    }

    public function update(Request $request, $slug)
    {
        $obra = Obra::where('slug', $slug)->firstOrFail();
        $request->validate([
            'titulo' => 'required|string|max:255|unique:obras,titulo,' . $obra->id,
            'autor' => 'required|string|max:255',
            'capa_url' => 'required|string|max:255',
        ]);

        $obra->titulo = $request->input('titulo');
        $obra->autor = $request->input('autor');
        $obra->capa_url = $request->input('capa_url');

        $obra->save();

        return redirect()->route('obra.show', $obra->slug);
    }
}
