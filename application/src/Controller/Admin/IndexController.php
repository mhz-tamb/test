<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use App\Entity\Product;
use App\Service\Settings;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class IndexController extends AbstractController
{
    private $settings;
    private $fileUploader;

    public function __construct(Settings $settings, FileUploader $fileUploader)
    {
        $this->settings = $settings;
        $this->fileUploader = $fileUploader;
    }

    /**
     * @Route("/admin", name="admin_index")
     * @IsGranted("ROLE_ADMIN");
     */
    public function index(Request $request): Response
    {
        $manager = $this->getDoctrine()->getManager();

        $currentData = [
            'banner_image' => $this->settings->get('banner_image'),
            'banner_text' => $this->settings->get('banner_text')
        ];

        $form = $this->createFormBuilder($currentData)
            ->add('banner_image', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/svg+xml']
                    ])
                ]
            ])
            ->add('banner_text', TextareaType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bannerImage = $form->get('banner_image')->getData();

            if ($bannerImage) {
                $bannerImageFilename = $this->fileUploader->upload($bannerImage);
                $this->settings->set('banner_image', $bannerImageFilename);
            }

            $this->settings->set('banner_text', $form->get('banner_text')->getData());
            $this->addFlash('success', 'Your changes were saved!');

            return $this->redirectToRoute('admin_index');
        }

        $jobs = $manager->getRepository(Job::class)->findAll();
        $products = $manager->getRepository(Product::class)->findAll();

        return $this->render('admin/index/index.html.twig', [
            'settingsForm' => $form->createView(),
            'jobs' => $jobs,
            'products' => $products
        ]);
    }
}
