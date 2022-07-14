<?php

namespace App\Http\Controllers;

use App\Cocktail;
use App\Ingredient;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktails = Cocktail::all()->sortByDesc('id');

        return view('cocktail.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        return view('cocktail.form', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate($this->getValidationRules());

        $data = $request->all();
        $cocktail = new Cocktail();
        $cocktail->fill($data);
        $cocktail->save();

        if(isset($data['ingredients'])) {
            $cocktail->ingredients()->sync($data['ingredients']);
        }
        
        return redirect()->route('cocktails.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cocktail    = Cocktail::findOrFail($id);
        $ingredients = Ingredient::all();

        return view('cocktail.form', compact('cocktail', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());

        $data     = $request->all();
        $cocktail = Cocktail::findOrFail($id);

        $cocktail->update($data);

        if(isset($data['ingredients'])) {
            $cocktail->ingredients()->sync($data['ingredients']);
        } else {
            $cocktail->ingredients()->sync([]);
        }

        return redirect()->route('cocktails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cocktail  $cocktail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cocktail $id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->ingredients()->sync([]);
        $cocktail->delete();

        return redirect()->route('cocktails.index');
    }

    private function getValidationRules() {

        return [
            'name'        => 'required|max:255',
            'image'       => 'nullable|max:30000',
            'istructions' => 'nullable|max:30000',
            'ingredients' => 'nullable|exists:ingredients,id'
        ];
    }
}
