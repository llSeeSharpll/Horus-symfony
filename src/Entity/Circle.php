<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircleRepository::class)
 */
class Circle
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
    private $tpye;

    /**
     * @ORM\Column(type="float")
     */
    private $radius;

    /**
     * @ORM\Column(type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $circumference;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTpye(): ?string
    {
        return $this->tpye;
    }

    public function setTpye(string $tpye): self
    {
        $this->tpye = $tpye;

        return $this;
    }

    public function getRadius(): ?float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): self
    {
        $this->radius = $radius;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface($radius): self
    {
        $this->surface = $this->get_area_circle($radius);

        return $this;
    }

    public function getCircumference(): ?float
    {
        return $this->circumference;
    }

    public function setCircumference($radius): self
    {
        $this->circumference = $this->get_circumfirce_circle($radius);

        return $this;
    }

    //area and circumfirce
    function get_area_circle($radius)
    {
        return pi() * pow($radius, 2);
    }
    function get_circumfirce_circle($radius)
    {
        return 2 * pi() * $radius;
    }
}