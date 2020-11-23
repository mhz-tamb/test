<?php

namespace App\Service;

use App\Entity\Settings as SettingsEntity;
use Doctrine\ORM\EntityManagerInterface;

class Settings
{
    private $manager;
    private $data;

    /**
     * @param EntityManagerInterface $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string
    {
        if (empty($this->data[$key])) {
            $this->data[$key] = $this->manager->getRepository(SettingsEntity::class)->findOneBy(['key' => $key]);
        }

        return null !== $this->data[$key] ? $this->data[$key]->getValue() : null;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function set(string $key, string $value): void
    {
        if (null === $this->get($key)) {
            $this->data[$key] = new SettingsEntity();
            $this->data[$key]->setKey($key);
        }

        $this->data[$key]->setValue($value);
        $this->manager->persist($this->data[$key]);
        $this->manager->flush();
    }
}
