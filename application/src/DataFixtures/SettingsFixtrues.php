<?php

namespace App\DataFixtures;

use App\Entity\Settings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SettingsFixtrues extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $defaults = [
            [
                'key'   => 'banner_image',
                'value' => 'banner.jpg'
            ],
            [
                'key'   => 'banner_text',
                'value' => 'Evolving AI has untapped potential for bringing engaging interactions with virtual characters. At every step of the way we find new opportunities for applying our stack to new fields within games, social and entertainment products.'
            ]
        ];

        foreach ($defaults as $item) {
            $settings = new Settings();
            $settings->setKey($item['key']);
            $settings->setValue($item['value']);
            $manager->persist($settings);
        }

        $manager->flush();
    }
}
