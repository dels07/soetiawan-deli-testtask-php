<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LunchService;

class LunchController extends AbstractController
{
    protected $lunchService;

    public function __construct(LunchService $lunchService)
    {
        $this->lunchService = $lunchService;
    }

    /**
     * @Route("/lunch", name="lunch")
     */
    public function index()
    {
        $lunchRecipes = $this->lunchService->getLunchRecipes();
        $response = new Response(json_encode($lunchRecipes, JSON_PRETTY_PRINT), 200, ['Content-Type' => 'application/json']);

        return $response->send();
    }
}
