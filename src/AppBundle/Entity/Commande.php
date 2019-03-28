<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime")
     */
    private $dateCommande;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat_payement", type="boolean")
     */
    private $etatPayement;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat_commande", type="boolean")
     */
    private $etatCommande;
   /**
     * @var Client $client
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client" ,inversedBy="commande")
     * @ORM\JoinColumn(name="client", referencedColumnName="id",nullable=true)
     */
    private $client;


    /**
     * @var ArrayCollection paiement
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Paiement", mappedBy="commande", cascade={"persist", "remove", "merge"})
     */
    private $paiement;

    /**
     * @var ArrayCollection tenue
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tenue", mappedBy="commande", cascade={"persist", "remove", "merge"})
     */
    private $tenue;

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
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     *
     * @return Commande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get dateCommande
     *
     * @return \DateTime
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set etatPayement
     *
     * @param boolean $etatPayement
     *
     * @return Commande
     */
    public function setEtatPayement($etatPayement)
    {
        $this->etatPayement = $etatPayement;

        return $this;
    }

    /**
     * Get etatPayement
     *
     * @return bool
     */
    public function getEtatPayement()
    {
        return $this->etatPayement;
    }

    /**
     * Set montant
     *
     * @param float $montant
     *
     * @return Commande
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set etatCommande
     *
     * @param boolean $etatCommande
     *
     * @return Commande
     */
    public function setEtatCommande($etatCommande)
    {
        $this->etatCommande = $etatCommande;

        return $this;
    }

    /**
     * Get etatCommande
     *
     * @return bool
     */
    public function getEtatCommande()
    {
        return $this->etatCommande;
    }
    
    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return ArrayCollection
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param ArrayCollection $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
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
}

