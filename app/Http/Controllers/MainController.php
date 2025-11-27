<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\User;
use App\Models\Capitulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function destroy($slug)
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
            'capa_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dadosObra = $request->except('capa_url');

        if ($request->hasFile('capa_url')) {
            $imagem = $request->file('capa_url');

            $caminhoDestino = public_path('assets/images');
            $proximoId = Obra::count() + 1;
            $extensao = $imagem->getClientOriginalExtension();
            $nomeBase = 'obra_' . $proximoId;
            $nomeArquivo = $nomeBase . '.' . $extensao;
            $imagem->move($caminhoDestino, $nomeArquivo);
            $caminhoRelativo = 'assets/images/' . $nomeArquivo;
            $dadosObra['capa_url'] = $caminhoRelativo;
        }

        Obra::create($dadosObra);

        return redirect()->route('home');
    }


    public function show(string $slug)
    {
        $slug = trim($slug);

        $obra = Obra::where('slug', $slug)
            ->with(['capitulos' => function ($query) {
                $query->orderBy('numero', 'asc');
            }])
            ->firstOrFail();

        $isFavorite = false;

        if (Auth::check()) {
            $isFavorite = Auth::user()->favorites()
                ->where('obra_slug', $slug)
                ->exists();
        }

        return view('obra-show', compact('obra', 'isFavorite'));
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
            'nota' => 'required|numeric|min:0|max:10',
        ]);

        $obra->titulo = $request->input('titulo');
        $obra->autor = $request->input('autor');
        $obra->nota = $request->input('nota');

        $obra->save();

        return redirect()->route('obra.show', $obra->slug);
    }


    public function toggleFavorite($slug)
    {
        if (!Auth::check()) {
            return back();
        }

        $user = Auth::user();

        $user->favorites()->toggle($slug);

        return back();
    }

    public function removeFavorite($slug)
    {
        if (!Auth::check()) {
            return back();
        }

        Auth::user()->favorites()->detach($slug);

        return back();
    }
}
