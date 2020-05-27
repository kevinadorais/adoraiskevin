<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $videoLink;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\WebSkill")
     */
    private $technosUse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TechnicalSkill")
     */
    private $skillUse;

    public function __construct()
    {
        $this->technosUse = new ArrayCollection();
        $this->skillUse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(?string $videoLink): self
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|WebSkill[]
     */
    public function getTechnosUse(): Collection
    {
        return $this->technosUse;
    }

    public function addTechnosUse(WebSkill $technosUse): self
    {
        if (!$this->technosUse->contains($technosUse)) {
            $this->technosUse[] = $technosUse;
        }

        return $this;
    }

    public function removeTechnosUse(WebSkill $technosUse): self
    {
        if ($this->technosUse->contains($technosUse)) {
            $this->technosUse->removeElement($technosUse);
        }

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection|TechnicalSkill[]
     */
    public function getSkillUse(): Collection
    {
        return $this->skillUse;
    }

    public function addSkillUse(TechnicalSkill $skillUse): self
    {
        if (!$this->skillUse->contains($skillUse)) {
            $this->skillUse[] = $skillUse;
        }

        return $this;
    }

    public function removeSkillUse(TechnicalSkill $skillUse): self
    {
        if ($this->skillUse->contains($skillUse)) {
            $this->skillUse->removeElement($skillUse);
        }

        return $this;
    }
}
