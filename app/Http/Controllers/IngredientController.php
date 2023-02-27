<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function indexIngredient() {
        return view('page.Category.indexIngredient');
    }
    public function ingredientStore(Request $request) {
        $newIngredient= $request->all();
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
}
