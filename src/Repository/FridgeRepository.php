<?php

namespace App\Repository;

class FridgeRepository
{
    /**
     * Get all ingredients from fridge.
     *
     * @return object
     */
    public function getAllIngredients()
    {
        $json = file_get_contents(__DIR__ . '../../Entity/Ingredient/data.json');
        $ingredients = str_replace(['best-before', 'use-by'], ['best_before', 'use_by'], $json);

        return json_decode($ingredients);
    }

    /**
     * Get list of fresh ingredients based on date.
     *
     * @param string $date
     * @return array
     */
    public function getFreshIngredients($date)
    {
        $allIngredients = $this->getAllIngredients();
        $date = strtotime($date);
        $freshIngredients = [];

        foreach ($allIngredients->ingredients as $ingredient) {
            $bestBefore = strtotime($ingredient->best_before);
            $useBy = strtotime($ingredient->use_by);

            if ($useBy > $date && $bestBefore > $date) {
                $freshIngredients[] = $ingredient->title;
            }
        }

        return $freshIngredients;
    }

    /**
     * Get list of unfresh ingredients based on date.
     *
     * @param string $date
     * @return array
     */
    public function getUnfreshIngredients($date)
    {
        $allIngredients = $this->getAllIngredients();
        $date = strtotime($date);
        $unFreshIngredients = [];

        foreach ($allIngredients->ingredients as $ingredient) {
            $bestBefore = strtotime($ingredient->best_before);
            $useBy = strtotime($ingredient->use_by);

            if ($useBy > $date && $bestBefore < $date) {
                $unFreshIngredients[] = $ingredient->title;
            }
        }

        return $unFreshIngredients;
    }
}
