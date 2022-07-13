<?php

use App\Cocktail;
use App\Ingredient;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CocktailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [];
        for ($i = 0; $i < 20; $i++) {
            $data = file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/random.php');
            $data = json_decode($data)->drinks[0];
            $cocktail = new Cocktail();
            $cocktail->name = $data->strDrink;
            $cocktail->description = strip_tags($data->strInstructionsIT);
            $cocktail->image = $data->strDrinkThumb;
            $cocktail->istructions = strip_tags($data->strInstructionsIT);

            $k = 1;
            $ingredients = [];
            do {
                $key = 'strIngredient' . $k++;
                $name = $data->$key ?? '';

                if (!strlen($name)) {
                    continue;
                }

                $ingredient = Ingredient::where('name', '=', $name)->first();

                if (!$ingredient) {
                    $ingredient = new Ingredient();
                    $ingredient->name = $name;
                    $ingredient->save();
                }
 
                $ingredients[] = $ingredient->id;
                echo $name . "\n";
            } while (strlen($name));
            
            $cocktail->save();
            $cocktail->ingredients()->sync($ingredients);
        }
    }
}
