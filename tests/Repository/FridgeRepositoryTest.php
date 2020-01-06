<?php

namespace App\Tests\Repository;

use App\Repository\FridgeRepository;
use PHPUnit\Framework\TestCase;

class FridgeRepositoryTest extends TestCase
{
    public function test_able_to_get_all_ingredients()
    {
        $repo = new FridgeRepository;
        $actual = $repo->getAllIngredients();

        $this->assertObjectHasAttribute('ingredients', $actual);
        $this->assertAttributeCount(16, 'ingredients', $actual);
    }

    public function test_able_to_get_fresh_ingredients()
    {
        $repo = new FridgeRepository;
        $date = '2019-03-14';
        $expected = ['Ham', 'Bread', 'Butter', 'Bacon', 'Eggs', 'Mushrooms', 'Sausage', 'Hotdog Bun', 'Ketchup', 'Mustard', 'Lettuce', 'Tomato', 'Cucumber', 'Beetroot'];

        $actual = $repo->getFreshIngredients($date);

        $this->assertEquals($expected, $actual);
    }

    public function test_able_to_get_unfresh_ingredients()
    {
        $repo = new FridgeRepository;
        $date = '2019-03-14';
        $expected = ['Ham', 'Bread', 'Butter', 'Bacon', 'Eggs', 'Mushrooms', 'Sausage', 'Hotdog Bun', 'Ketchup', 'Mustard', 'Lettuce', 'Tomato', 'Cucumber', 'Beetroot'];

        $actual = $repo->getFreshIngredients($date);

        $this->assertEquals($expected, $actual);
    }
}
