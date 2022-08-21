<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{

    #[Route('/numbers')]
    public function number(): Response
    {
        try {
            $number = random_int(0, 100);
        } catch (Exception $e) {
        }

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}