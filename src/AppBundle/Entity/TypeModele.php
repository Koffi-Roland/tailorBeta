<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeModele
 *
 * @ORM\Table(name="type_modele")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeModeleRepository")
 */
class TypeModele
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
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    /**
     * @var ArrayCollection modele
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Modele", mappedBy="typeModele", cascade={"persist", "remove", "merge"})
     */
    private $modele;

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
     * @return TypeModele
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
     * @return TypeModele
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return TypeModele
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }
     /**
     * @return ArrayCollection
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param ArrayCollection $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
}

