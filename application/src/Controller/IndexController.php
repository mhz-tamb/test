<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Product;
use App\Service\Settings;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function index(Settings $settings): Response
    {
        $manager = $this->getDoctrine()->getManager();

        $jobs = $manager->getRepository(Job::class)->findBy(['status' => Job::STATUS_ACTIVE]);
        $products = $manager->getRepository(Product::class)->findBy(['status' => Job::STATUS_ACTIVE]);

        return $this->render('index/index.html.twig', [
            'jobs' => $jobs,
            'products' => $products
        ]);
    }
}
