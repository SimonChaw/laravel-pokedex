<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $showAll = Pokemon::all();
        //$showAll->only(['name', 'description', 'url', 'type']);
        return view('pokemon.index', ['pokemon' => $showAll]);
    }

    public function show(int $id)
    {
        $showOne = Pokemon::find($id);
        return view('pokemon.show', ['mon' => $showOne]);
    }

    public function create()
    {
        return view('pokemon.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:100',
            'url' => 'required|url:png,jpg,jpeg,gif,webp',
            'type' => 'required'
        ]);

        $inputMon = new Pokemon;
        // $inputMon->fill($request->only(['name', 'description', 'url', 'type']));
        $inputMon->name = $request->input('name');
        $inputMon->description = $request->input('description');
        $inputMon->url = $request->input('url');
        $inputMon->type = $request->input('type');
        $inputMon->save();
        return redirect("/pokemon/{$inputMon->id}");
        //('profile', [$user])
    }

    public function destroy($id)
    {
        $deleteMon = Pokemon::find($id);
        $deleteMon->delete();
        return redirect('/pokemon');
    }

    public function edit(int $id)
    {
        $editMon = Pokemon::find($id);
        return view('pokemon.edit', ['editMon' => $editMon]);
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:100',
            'url' => 'required|url:https',
            'type' => 'required'
        ]);

        $updateMon = Pokemon::find($id);
        $updateMon->update($request->only(['name', 'description', 'url', 'type']));
        //$updateMon->save();
        return redirect("/pokemon/{$updateMon->id}");
    }
}