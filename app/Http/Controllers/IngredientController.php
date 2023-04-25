<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function indexIngredient() {
        return view('page.Ingredient.indexIngredient');
    }
    public function ingredientStore(Request $request) {
        $newIngredient= $request->all();
        $newIngredient['total_price_ingredient'] = $request->price_ingredient * $request->quantity_ingredient;
        Ingredient::create($newIngredient);
        return response()->json([
            'status' => true,
            'message' => 'Add ingredient successfully'
        ]);
    }
    public function recieveIngredient(Request $request) {
        $ingredient_data = Ingredient::get();
        return response()->json([
            'newData' => $ingredient_data,
        ]);
    }
    public function updateIngredient(Request $request) {
        $newUpdateIngredient = $request->all();
        $updateIngredient = Ingredient::where('id', $request->id)->first();
        $newUpdateIngredient['total_price_ingredient'] = $request->price_ingredient * $request->quantity_ingredient;
        $updateIngredient->update($newUpdateIngredient);
        return response()->json([
            'updateIngredientData' => true,
        ]);
    }
    public function removeIngredient(Request $request) {
        $deleteIngredientData = Ingredient::where('id', $request->id)->first()->delete();
        return response()->json([
            'deleteIngredientStatus' => true,
            'deleteMessage' => 'Delete Ingredient Successfully'
        ]);
    }

    public function switchIngredientStatus(Request $request) {
        $ingredientEdit = Ingredient::where('id', $request->id)->first();
        $ingredientEdit->status_ingredient =! $ingredientEdit->status_ingredient;
        $ingredientEdit->save();
    }
}
