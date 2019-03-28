<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 *
 * @ORM\Table(name="modele")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModeleRepository")
 */
class Modele
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

     /**
     * @var ArrayCollection tenue
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tenue", mappedBy="modele", cascade={"persist", "remove", "merge"})
     */
    private $tenue;

    /**
     * @var TypeModele $typeModele
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeModele" ,inversedBy="modele")
     * @ORM\JoinColumn(name="typeModele", referencedColumnName="id",nullable=true)
     */
    private $typeModele;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Modele
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Modele
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Modele
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
     /**
     * @return ArrayCollection
     */
    public function getTenue()
    {
        return $this->tenue;
    }

    /**
     * @param ArrayCollection $tenue
     */
    public function setTenue($tenue)
    {
        $this->tenue = $tenue;
    }

    /**
     * @return TypeModele
     */
    public function getTypeModele()
    {
        return $this->typeModele;
    }

    /**
     * @param TypeModele $typeModele
     */
    public function setTypeModele($typeModele)
    {
        $this->typeModele = $typeModele;
    }

}

