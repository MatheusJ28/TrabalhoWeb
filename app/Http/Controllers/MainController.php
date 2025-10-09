<?php

namespace App\Http\Controllers;

use App\Models\Obra;
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
            $obrasQuery->limit(4);
        }

        $obras = $obrasQuery->get();

        return view('home', compact('obras'));
    }

    public function obra1()
    {
        return view('obra1');
    }

    public function obra2()
    {
        return view('obra2');
    }

    public function obra3()
    {
        // $obra = Obra::findOrFail(3);
        // $capitulos = $obra->capitulos()->orderBy('numero', 'asc')->get();
        // return view('obra3', compact('obra', 'capitulos'));
        return view('obra3');
    }

    public function obra4()
    {
        return view('obra4');
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

    public function show(string $titulo)
    {
        $obra = Obra::where('titulo', $titulo)->firstOrFail();

        return view('obra.show', compact('obra'));
    }

    public function obra1_cap1()
    {
        return view('obra1Cap1');
    }

    public function obra1_cap2()
    {
        return view('obra1Cap2');
    }

    public function capitulo(string $obraSlug, int $numero)
{
    $obra = Obra::where('slug', $obraSlug)->firstOrFail();
    $capitulo = Capitulos::where('obra_id', $obra->id)
                         ->where('numero', $numero)
                         ->firstOrFail();
    return view('capitulo', compact('obra', 'capitulo'));
}
}
