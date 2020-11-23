<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Settings;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function index(): Response
    {
        $manager = $this->getDoctrine()->getManager();

        $jobs = $manager->getRepository(Job::class)->findBy(['status' => Job::STATUS_ACTIVE]);
        $settings = $manager->getRepository(Settings::class)->findOneBy([]);

        return $this->render('index/index.html.twig', [
            'jobs' => $jobs,
            'settings' => $settings
        ]);
    }
}
