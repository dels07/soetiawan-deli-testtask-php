<?php

namespace App\Tests\Repository;

use App\Repository\RecipeRepository;
use PHPUnit\Framework\TestCase;

class RecipeRepositoryTest extends TestCase
{
    public function test_able_to_get_all_recipes()
    {
        $repo = new RecipeRepository;
        $actual = $repo->getAllRecipes();

        $this->assertObjectHasAttribute('recipes', $actual);
        $this->assertAttributeCount(4, 'recipes', $actual);
    }

    /**
     * @dataProvider recipesProvider
     */
    public function test_able_to_get_usable_recipes()
    {
        $this->assertTrue(true);
    }

    // private function recipesProvider() {
    //     return [
    //         [[], [], ]
    //     ];
    // }
}
