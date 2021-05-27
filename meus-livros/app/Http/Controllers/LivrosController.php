<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LivrosFormRequest;
use App\Livro;

class LivrosController extends Controller
{
    public function index(Request $request)
    {
        $livros = Livro::all();
        $mensagem = $request->session()->get("mensagem");
        return view("livros.listar", compact("livros", "mensagem"));
    }

    public function indexLidos(Request $request)
    {
        $livros = Livro::where("lido", true)->get();
        $mensagem = $request->session()->get("mensagem");
        return view("livros.listar", compact("livros", "mensagem"));
    }

    public function indexNaoLidos(Request $request)
    {
        $livros = Livro::where("lido", false)->get();
        $mensagem = $request->session()->get("mensagem");
        return view("livros.listar", compact("livros", "mensagem"));
    }

    public function buscar(Request $request)
    {
        return view("livros.buscar");
    }

    public function search(Request $request)
    {
        $valorBuscado = $request->get("buscar");
        $livros = Livro::query()->where('titulo', 'iLIKE', "%{$valorBuscado}%")
                                ->orWhere('autor', 'iLIKE', "%{$valorBuscado}%")
                                ->get();

        return view("livros.listar", compact("livros"));
    }

    public function adicionar(Request $request)
    {
        return view("livros.adicionar");
    }

    public function store(LivrosFormRequest $request)
    {
        $titulo = $request->titulo;
        $autor = $request->autor;
        $paginas = $request->paginas;
        $lido = $request->lido;

        $livro = new Livro();
        $livro->titulo = $titulo;
        $livro->autor = $autor;
        $livro->paginas = $paginas;
        $livro->lido = $lido ? true : false;
        $livro->save();

        $request->session()->flash('mensagem', "Livro adicionado com sucesso!");
        return redirect("/livros/listar");
    }

    public function destroy(Request $request)
    {
        Livro::destroy($request->id);

        $request->session()->flash('mensagem', "Livro removido com sucesso!");
        return redirect("/livros/listar/todos");
    }

    public function atualizar(Request $request)
    {
        $livro = Livro::find($request->id);
        return view("livros.atualizar", compact("livro"));
    }

    public function update(LivrosFormRequest $request)
    {
        $livro = Livro::find($request->id);
        $livro->update([
            "titulo" => $request->get("titulo"), 
            "autor" => $request->get("autor"), 
            "paginas" => $request->get("paginas"), 
            "lido" => $request->get("lido") ? true : false
        ]);

        $request->session()->flash('mensagem', "Livro atualizado com sucesso!");
        return redirect("/livros/listar/todos");
    }
}