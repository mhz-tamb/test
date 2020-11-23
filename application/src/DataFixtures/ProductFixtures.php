<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $products = [
            [
                'status' => Product::STATUS_ACTIVE,
                'slug' => 'fluxcortex',
                'name' => 'fluxCortex',
                'description' => '<p><b>fluxCortex Azu®</b> — next-generation Evolving AI hybrid architecture based on genetic algorithms and reinforcement learning.</p>
                    <p>Virtual Beings solution for natural interaction with emotional feedback and ability for real-time acquisition of skills.</p>',
                'content' => null,
                'tags' => ['ai', 'evolvingai', 'virtualbeings']
            ],
            [
                'status' => Product::STATUS_ACTIVE,
                'slug' => 'fluxneat',
                'name' => 'fluxNEAT',
                'description' => '<p><b>fluxNEAT®</b> — evolving Neural Networks solution capable of learning skills in real-time with zero to minimal pre-training data.</p>
                    <p>Self-learning system for application in games providing human-like, evolving behaviors of computer-controlled characters.</p>',
                'content' => null,
                'tags' => ['ai', 'genetic', 'bots', 'npc']
            ],
            [
                'status' => Product::STATUS_ACTIVE,
                'slug' => 'riflecore',
                'name' => 'Riflecore',
                'description' => '<p><b>Riflecore</b> fuses brawling fundamentals with tactical gunplay. Take map control with your teammates and demolish the enemies in a truly competitive way.</p>
                    <p>Your victories and choices will shape the tides of the ongoing hybrid war on the world map, and decide the fate of key characters with each new season rollout.</p>',
                'content' => '<p><b>Riflecore</b> fuses brawling fundamentals with tactical gunplay. Take map control with your teammates and demolish the enemies in a truly competitive way.</p>
                    <p>Your victories and choices will shape the tides of the ongoing hybrid war on the world map, and decide the fate of key characters with each new season rollout.</p>
                    <p><img src="assets/images/riflecore.jpg" alt="Riflecore"></p>
                    <p class="list_heading"></p>
                    <ul>
                        <li>Precision and drive sculpted for the competitive online gaming scene</li>
                        <li>Crisp hand-drawn line art graphics infused with modern rendering tech</li>
                        <li>AI companions with customizable behaviors driven by groundbreaking evolving neural networks technology</li>
                        <li>Meta game — each fight leaves a mark on the world map, engaging players in a global tug of war for influence</li>
                        <li>Seasonal story mode where players get to defend their narrative decisions on a worldwide scale</li>
                    </ul>',
                'tags' => ['gamedevelopment', 'onlinegame', 'brawler']
            ]
        ];

        $tagRepository = $manager->getRepository(Tag::class);

        foreach ($products as $product) {
            $entity = new Product();
            $entity->setStatus($product['status']);
            $entity->setSlug($product['slug']);
            $entity->setName($product['name']);
            $entity->setDescription($product['description']);
            $entity->setContent($product['content']);

            foreach ($product['tags'] as $tag) {
                $tagEntity = $tagRepository->findOneBy(['name' => $tag]);
                if (null === $tagEntity) {
                    $tagEntity = new Tag();
                    $tagEntity->setName($tag);
                    $manager->persist($tagEntity);
                }

                $entity->addTag($tagEntity);
            }

            $manager->persist($entity);
        }

        $manager->flush();
    }
}
