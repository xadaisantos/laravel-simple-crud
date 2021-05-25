<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FrasesFormRequest;
use App\Frase;

class FrasesController extends Controller
{
    public function index(Request $request) {
        //$frases = Frase::all();
        $frases = Frase::query()->orderBy('english')->get();
        //$frases = Frase::query()->orderBy('portuguese')->get();
        $mensagem = $request->session()->get("mensagem");
        return view("frases.index", compact("frases", "mensagem"));
    }

    public function create() {
        return view("frases.create");
    }

    public function store(FrasesFormRequest $request) {

        $english = $request->get("english");
        $portuguese = $request->get("portuguese");

        Frase::create([
            "english" => $english, 
            "portuguese" => $portuguese
        ]);

        $request->session()->flash('mensagem', "Sentence created successfully!");

        return redirect()->route('listar');
    }

    public function destroy(Request $request) {
        Frase::destroy($request->id);
        $request->session()->flash('mensagem', "Sentence removed successfully!");
        return redirect()->route('listar');
    }
}