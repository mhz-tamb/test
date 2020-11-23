<?php

namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $jobs = [
            [
                'status'      => Job::STATUS_ACTIVE,
                'slug'        => 'core_engineer',
                'name'        => 'C++ Core Engineer',
                'description' => 'Experienced C++ engineer for development of core artificial intelligence technology framework and integration modules.',
                'content'     => '
                    <p class="list_heading"><b>Responsibilities:</b></p>
                    <ul>
                        <li>Take part in design and develop core artificial intelligence technology framework and integration modules</li>
                        <li>Deploy machine learning models to the cloud</li>
                        <li>Analyze, profile and optimize AI technology stack</li>
                    </ul>
                    <p class="list_heading"><b>Requirements:</b></p>
                    <ul>
                        <li>Strong C++ coding and software engineering skills</li>
                        <li>Strong understanding of computer science data structures and algorithms</li>
                    </ul>
                    <p class="list_heading"><b>Nice to have:</b></p>
                    <ul>
                        <li>Experience with neural networks and artificial intelligence development</li>
                    </ul>
                    <p><b>Apply:</b></p>
                    <p><a href="mailto:job@temporal.games" class="mailto">job@temporal.games</a></p>
                ',
                'tags' => ['engineering', 'full-time', 'remote', 'fluxcortex']
            ],
            [
                'status'      => Job::STATUS_ACTIVE,
                'slug'        => 'vfx_artist',
                'name'        => 'VFX Artist',
                'description' => 'Specialist capable of designing and implementing highly stylized visual effects, improving tools and optimizing pipelines.',
                'content'     => '
                    <p>Join us as a versatile visual effects artist specialized in creation of stylised and captivating visual effects fit for Riflecore’s artistic vision, utilizing already designed solutions and further develop an approach for our visual effects. Become a part of our art team, work under supervision and in collaboration with the project\'s Art-Director and Technical Artist.</p>
                    <p class="list_heading"><b>Responsibilities:</b></p>
                    <ul>
                        <li>Forming a stylistic approach to VFX for a brawler-like game reliant on clear visual feedback</li>
                        <li>Collaborating and communicating with the entire game development team to ensure cohesion between game mechanics and visual effects</li>
                        <li>Producing high-quality stylized animated effects</li>
                        <li>Managing the balance between quality and resources available for the best game experience</li>
                        <li>Participating in planning, organizing and following the delivery plan on your own tasks</li>
                    </ul>
                    <p class="list_heading"><b>Requirements:</b></p>
                    <ul>
                        <li>A portfolio containing in-engine works of high quality visual effects</li>
                        <li>Capability of delivering artistic and technical ideas to the entire team and to the technical artist</li>
                        <li>Knowledge of essential techniques and design principles of visual effects in traditional animation</li>
                        <li>Experience in designing a combination of hand-drawn, particle and code based (affected by shaders) visual effects</li>
                        <li>Understanding essentials of Unity game engine or at least strong experience with other game engines, like Unreal Engine</li>
                        <li>Capability of working with and setting up materials and prefabs, post-processing</li>
                        <li>Understanding of particle effects-based workflows</li>
                        <li>Understanding of modeling and texturing</li>
                        <li>Fundamental understanding of shaders, the way modern day graphics function from concept to implementation and optimisation</li>
                    </ul>
                    <p><b>Apply:</b></p>
                    <p><a href="mailto:job@temporal.games" class="mailto">job@temporal.games</a></p>
                ',
                'tags' => ['techart', 'remote', 'riflecore']
            ],
            [
                'status'      => Job::STATUS_ACTIVE,
                'slug'        => 'ui_designer',
                'name'        => 'UI Designer',
                'description' => 'Experienced UI/UX designer with a portfolio of game projects, capable of conceptualizing and implementing UI for Riflecore.',
                'content'     => '
                    <p>Experienced UI/UX designer with a portfolio of game projects, capable of both conceptualizing and implementing UI for Riflecore.</p>
                    <p class="list_heading"><b>Responsibilities:</b></p>
                    <ul>
                        <li>High-level planning of Riflecore’s UI systems</li>
                        <li>Designing overall flow of user experience accommodating various Riflecore’s modes and experiences</li>
                        <li>Ensuring the UI is designed in unison with the game’s art direction</li>
                        <li>Production and implementation of UI assets</li>
                        <li>Assessing feedback and fine tuning user experience</li>
                    </ul>
                    <p class="list_heading"><b>Requirements:</b></p>
                    <ul>
                        <li>Demonstrated UI/UX design experience in shipped game products</li>
                        <li>Capability to work in collaboration with art lead, technical artist and programmers on implementation of UI design ideas</li>
                        <li>Testing your work in-game and iterating based on feedback coming from testers and the team</li>
                        <li>Understanding of graphics design, usability and practical approach for visual information presentation</li>
                        <li>Knowledge of graphic editors, animation tools and prototyping tools</li>
                        <li>Understanding videogame tech budget limitations</li>
                        <li>Familiarity with Unity game engine and its UI tools</li>
                        <li>Preparation of graphics assets and their in-game implementation into working systems</li>
                    </ul>
                    <p class="list_heading"><b>Nice to have:</b></p>
                    <ul>
                        <li>Technical knowledge, understanding of shaders and scripting language, knowledge of 3D software, deep knowledge of Unity components</li>
                    </ul>
                    <p><b>Apply:</b></p>
                    <p><a href="mailto:job@temporal.games" class="mailto">job@temporal.games</a></p>
                ',
                'tags' => ['ui', 'ux', 'gui', 'remote'. 'riflecore']
            ],
            [
                'status'      => Job::STATUS_ACTIVE,
                'slug'        => 'data_scientist',
                'name'        => 'Data Scientist',
                'description' => 'Experienced data scientist interested in developing new advanced technologies related to simulating convincing human-like behavior in learning, motion, speech and decision making.',
                'content'     => '
                    <p class="list_heading"><b>Responsibilities:</b></p>
                    <ul>
                        <li>Take part in research to advance the state-of-the-art in virtual beings</li>
                        <li>Develop new advanced technologies related to simulating convincing human-like behavior in learning, motion, speech and decision making</li>
                        <li>Collaborate with the team to prototype solutions, experiments, and concepts</li>
                    </ul>
                    <p class="list_heading"><b>Requirements:</b></p>
                    <ul>
                        <li>Strong background in data science and machine learning engineering</li>
                        <li>Knowledge of standard Python-based data science stack plus DL frameworks (e.g. PyTorch)</li>
                        <li>Demonstrated software engineer experience via an internship, work experience, coding competitions, or widely used contributions in open source repositories (e.g. GitHub)</li>
                    </ul>
                    <p><b>Apply:</b></p>
                    <p><a href="mailto:job@temporal.games" class="mailto">job@temporal.games</a></p>
                ',
                'tags' => ['engineering', 'full-time', 'remote', 'fluxcortex']
            ]
        ];

        $tagRepository = $manager->getRepository(Tag::class);

        foreach ($jobs as $job) {
            $entity = new Job();
            $entity->setStatus($job['status']);
            $entity->setSlug($job['slug']);
            $entity->setName($job['name']);
            $entity->setContent($job['content']);
            $entity->setDescription($job['description']);

            foreach ($job['tags'] as $tag) {
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
