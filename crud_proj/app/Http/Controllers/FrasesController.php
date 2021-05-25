<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FrasesFormRequest;
use App\Frase;

class FrasesController extends Controller
{
    public function index(Request $request) {
        $frases = Frase::all();
        $mensagem = $request->session()->get("mensagem");
        return view("frases.index", compact("frases", "mensagem"));
    }

    public function indexEnglishAZ(Request $request) {
        $frases = Frase::query()->orderBy('english')->get();
        $mensagem = $request->session()->get("mensagem");
        return view("frases.index", compact("frases", "mensagem"));
    }

    public function indexPortugueseAZ(Request $request) {
        $frases = Frase::query()->orderBy('portuguese')->get();
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

    public function updatePage(Request $request) {

        $frase = Frase::find($request->id);
        $english = $frase->english;
        $portuguese = $frase->portuguese;
        
        var_dump($english);
        var_dump($portuguese);

        return view("frases.update", ["frase" => $frase]);
    }

    public function update(FrasesFormRequest $request) {
        
        $frase = Frase::find($request->id);
        $english = $request->get("english");
        $portuguese = $request->get("portuguese");

        $frase->update([
            "english" => $english, 
            "portuguese" => $portuguese
        ]);

        $request->session()->flash('mensagem', "Sentence updated successfully!");
        return redirect()->route('listar');
    }
}