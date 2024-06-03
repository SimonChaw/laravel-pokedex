<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(int $trainer_id) {
        $allItems = Items::where('trainer_id', $trainer_id)->get();
        return view ('items.index', [
            'allItems' => $allItems,
            'trainerId' => $trainer_id
        ]);
    }

    /*public function show(int $trainer_id, int $id) {
        $showItem = Items::where('trainer_id', $trainer_id)->find($id);
        return view('items.show', ['showItem' => $showItem]);
    }*/

    public function create(int $trainer_id) {
        return view('items.create', ['trainer_id' => $trainer_id]);
    }

    public function store(Request $request, int $trainer_id) {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer'
        ]);

        $data = [
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'trainer_id' => $trainer_id
        ];
        
        $data = $request->only(['name', 'quantity']);
        $data['trainer_id'] = $trainer_id;

        $saveItem = Items::create($data);

        //return redirect("/trainers/{$trainer_id}/items/{$saveItem->id}");
        return redirect("/trainers/{$trainer_id}/items");
    }

    public function edit(int $trainer_id, int $id) {
        $editItem = Items::where('trainer_id', $trainer_id)->find($id);
        return view('items.edit', ['editItem' => $editItem, 'trainer_id' => $trainer_id, 'id' => $id]);
    }

    public function update(int $trainer_id, int $id, Request $request) {
        $request->validate([
            'quantity' => 'required|integer'
        ]);
        $updateItem = Items::where('trainer_id', $trainer_id)->find($id);
        $updateItem->update($request->only(['name', 'quantity']));
        //$updateMon->save();
        return redirect("/trainers/{$trainer_id}/items");
    }

    public function destroy(int $trainer_id, int $id) {
        $deleteItem = Items::where('trainer_id', $trainer_id)->find($id);
        $deleteItem->delete();
        return redirect("/trainers/{$trainer_id}/items");
    }
}