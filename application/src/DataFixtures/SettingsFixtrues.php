<?php

namespace App\DataFixtures;

use App\Entity\Settings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SettingsFixtrues extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $settings = new Settings();
        $settings->setBannerImage('banner.jpg');
        $settings->setBannerText('Evolving AI has untapped potential for bringing 
        engaging interactions with virtual characters. At every step of the 
        way we find new opportunities for applying our stack to new fields 
        within games, social and entertainment products.');

        $manager->persist($settings);
        $manager->flush();
    }
}
