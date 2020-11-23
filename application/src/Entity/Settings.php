<?php

namespace App\Entity;

use App\Repository\SettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingsRepository::class)
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banner_image;

    /**
     * @ORM\Column(type="text")
     */
    private $banner_text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBannerImage(): ?string
    {
        return $this->banner_image;
    }

    public function setBannerImage(string $banner_image): self
    {
        $this->banner_image = $banner_image;

        return $this;
    }

    public function getBannerText(): ?string
    {
        return $this->banner_text;
    }

    public function setBannerText(string $banner_text): self
    {
        $this->banner_text = $banner_text;

        return $this;
    }
}
