<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Resources\AnimalResource;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return AnimalResource::collection($animals);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $animal = Animal::create($validated);
        return new AnimalResource($animal);
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $animal->update($validated);
        return new AnimalResource($animal);
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response()->json(null, 204);
    }
}