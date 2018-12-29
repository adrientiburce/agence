<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch{
    /**
     * @var int|null
     * @Assert\Range(min=40000, max=700000)
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $optiones;

    public function __construct()
    {
        $this->optiones = new ArrayCollection();
    }
    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice(int $maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */ 
    public function setMinSurface(int $minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of optiones
     *
     * @return  ArrayCollection
     */ 
    public function getOptiones()
    {
        return $this->optiones;
    }

    /**
     * Set the value of optiones
     *
     * @param  ArrayCollection  $optiones
     *
     * @return  self
     */ 
    public function setOptiones(ArrayCollection $optiones)
    {
        $this->optiones = $optiones;

        return $this;
    }
}