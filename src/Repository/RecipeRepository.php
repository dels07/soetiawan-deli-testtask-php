<?php

namespace App\Repository;

class RecipeRepository
{
    /**
     * Get all recipes.
     *
     * @return object
     */
    public function getAllRecipes()
    {
        $json = file_get_contents(__DIR__ . '../../Entity/Recipe/data.json');

        return json_decode($json);
    }

    /**
     * Get usable recipes based on fresh & unfresh ingredients.
     * Note: Recipes with unfresh ingredients will be on bottom list.
     *
     * @param array $freshIngredients
     * @param array $unfreshIngredients
     * @return array
     */
    public function getUsableRecipes($freshIngredients, $unfreshIngredients)
    {
        $allRecipes = $this->getAllRecipes();
        $freshRecipes = [];
        $unfreshRecipes = [];
        $allIngredients = array_merge($freshIngredients, $unfreshIngredients);

        foreach ($allRecipes->recipes as $recipe) {
            if (array_intersect($recipe->ingredients, $freshIngredients) === $recipe->ingredients) {
                $freshRecipes[] = $recipe;
            } elseif (array_intersect($recipe->ingredients, $allIngredients) === $recipe->ingredients) {
                $unfreshIngredients[] = $recipe;
            }
        }

        return array_merge($freshRecipes, $unfreshRecipes);
    }
}
