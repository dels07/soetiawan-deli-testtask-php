<?php

namespace App\Service;

use App\Repository\FridgeRepository;
use App\Repository\RecipeRepository;

class LunchService
{
    protected $fridgeRepo;
    protected $recipeRepo;

    public function __construct(FridgeRepository $fridge, RecipeRepository $recipe)
    {
        $this->fridgeRepo = $fridge;
        $this->recipeRepo = $recipe;
    }

    public function getLunchRecipes()
    {
        $today = date('Y-m-d');

        $freshIngredients = $this->fridgeRepo->getFreshIngredients($today);
        $unfreshIngredients = $this->fridgeRepo->getUnfreshIngredients($today);

        $lunchRecipes = $this->recipeRepo->getUsableRecipes($freshIngredients, $unfreshIngredients);

        return $lunchRecipes;
    }
}
