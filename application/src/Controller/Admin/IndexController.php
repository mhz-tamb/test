<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use App\Entity\Settings;
use App\Form\SettingsType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class IndexController extends AbstractController
{
    private $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    /**
     * @Route("/admin", name="admin_index")
     * @IsGranted("ROLE_ADMIN");
     */
    public function index(Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $settings = $manager->getRepository(Settings::class)->findOneBy([]);
        if (null === $settings) {
            $settings = new Settings();
        }

        $form = $this->createForm(SettingsType::class, $settings);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bannerImage = $form->get('banner_image')->getData();

            if ($bannerImage) {
                $bannerImageFilename = $this->fileUploader->upload($bannerImage);
                $settings->setBannerImage($bannerImageFilename);
            }

            $settings->setBannerText($form->get('banner_text')->getData());

            $manager->persist($settings);
            $manager->flush();

            $this->addFlash('success', 'Your changes were saved!');

            return $this->redirectToRoute('admin_index');
        }

        $jobs = $manager->getRepository(Job::class)->findAll();

        return $this->render('admin/index/index.html.twig', [
            'settingsForm' => $form->createView(),
            'jobs' => $jobs
        ]);
    }
}
