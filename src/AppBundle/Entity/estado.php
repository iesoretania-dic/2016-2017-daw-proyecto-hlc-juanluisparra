<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\estadoRepository")
 */
class estado
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var material[]
     *
     * @ORM\OneToMany(targetEntity="material",mappedBy="estados")
     */
    private  $estadom;
    /**
     * @var string
     *
     * @ORM\Column(name="condicion", type="string", length=255)
     */
    private $condicion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set condicion
     *
     * @param string $condicion
     *
     * @return estado
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }

    /**
     * Get condicion
     *
     * @return string
     */
    public function getCondicion()
    {
        return $this->condicion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estadom = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estadom
     *
     * @param \AppBundle\Entity\material $estadom
     *
     * @return estado
     */
    public function addEstadom(\AppBundle\Entity\material $estadom)
    {
        $this->estadom[] = $estadom;

        return $this;
    }

    /**
     * Remove estadom
     *
     * @param \AppBundle\Entity\material $estadom
     */
    public function removeEstadom(\AppBundle\Entity\material $estadom)
    {
        $this->estadom->removeElement($estadom);
    }

    /**
     * Get estadom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadom()
    {
        return $this->estadom;
    }
}
