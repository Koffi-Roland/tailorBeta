<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tenue
 *
 * @ORM\Table(name="tenue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TenueRepository")
 */
class Tenue
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
     * @ORM\Column(name="date_livraison", type="datetime")
     */
    private $dateLivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_pagne", type="string", length=255)
     */
    private $photoPagne;

    /**
     * @var float
     *
     * @ORM\Column(name="dimension", type="float")
     */
    private $dimension;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reel_livraison", type="datetime")
     */
    private $dateReelLivraison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="epaule", type="float")
     */
    private $epaule;

    /**
     * @var float
     *
     * @ORM\Column(name="l_manche", type="float")
     */
    private $lManche;

    /**
     * @var float
     *
     * @ORM\Column(name="t_manche", type="float")
     */
    private $tManche;

    /**
     * @var float
     *
     * @ORM\Column(name="l_chemise", type="float")
     */
    private $lChemise;

    /**
     * @var float
     *
     * @ORM\Column(name="t_poitrine", type="float")
     */
    private $tPoitrine;

    /**
     * @var float
     *
     * @ORM\Column(name="ceinture", type="float")
     */
    private $ceinture;

    /**
     * @var float
     *
     * @ORM\Column(name="bassin", type="float")
     */
    private $bassin;

    /**
     * @var float
     *
     * @ORM\Column(name="l_patalon", type="float")
     */
    private $lPatalon;

    /**
     * @var float
     *
     * @ORM\Column(name="cuisse", type="float")
     */
    private $cuisse;

    /**
     * @var float
     *
     * @ORM\Column(name="t_cheville", type="float")
     */
    private $tCheville;

    /**
     * @var float
     *
     * @ORM\Column(name="encolure", type="float")
     */
    private $encolure;
    /**
     * @var Commande $commande
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Commande" ,inversedBy="tenue")
     * @ORM\JoinColumn(name="commande", referencedColumnName="id",nullable=true)
     */
    private $commande;

    /**
     * @var Modele $modele
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Modele" ,inversedBy="tenue")
     * @ORM\JoinColumn(name="modele", referencedColumnName="id",nullable=true)
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
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Tenue
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Tenue
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set photoPagne
     *
     * @param string $photoPagne
     *
     * @return Tenue
     */
    public function setPhotoPagne($photoPagne)
    {
        $this->photoPagne = $photoPagne;

        return $this;
    }

    /**
     * Get photoPagne
     *
     * @return string
     */
    public function getPhotoPagne()
    {
        return $this->photoPagne;
    }

    /**
     * Set dimension
     *
     * @param float $dimension
     *
     * @return Tenue
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get dimension
     *
     * @return float
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Tenue
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set dateReelLivraison
     *
     * @param \DateTime $dateReelLivraison
     *
     * @return Tenue
     */
    public function setDateReelLivraison($dateReelLivraison)
    {
        $this->dateReelLivraison = $dateReelLivraison;

        return $this;
    }

    /**
     * Get dateReelLivraison
     *
     * @return \DateTime
     */
    public function getDateReelLivraison()
    {
        return $this->dateReelLivraison;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Tenue
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    
     /**
     * Set epaule
     *
     * @param float $epaule
     *
     * @return Client
     */
    public function setEpaule($epaule)
    {
        $this->epaule = $epaule;

        return $this;
    }

    /**
     * Get epaule
     *
     * @return float
     */
    public function getEpaule()
    {
        return $this->epaule;
    }

    /**
     * Set lManche
     *
     * @param float $lManche
     *
     * @return Client
     */
    public function setLManche($lManche)
    {
        $this->lManche = $lManche;

        return $this;
    }

    /**
     * Get lManche
     *
     * @return float
     */
    public function getLManche()
    {
        return $this->lManche;
    }

    /**
     * Set tManche
     *
     * @param float $tManche
     *
     * @return Client
     */
    public function setTManche($tManche)
    {
        $this->tManche = $tManche;

        return $this;
    }

    /**
     * Get tManche
     *
     * @return float
     */
    public function getTManche()
    {
        return $this->tManche;
    }

    /**
     * Set lChemise
     *
     * @param float $lChemise
     *
     * @return Client
     */
    public function setLChemise($lChemise)
    {
        $this->lChemise = $lChemise;

        return $this;
    }

    /**
     * Get lChemise
     *
     * @return float
     */
    public function getLChemise()
    {
        return $this->lChemise;
    }

    /**
     * Set tPoitrine
     *
     * @param float $tPoitrine
     *
     * @return Client
     */
    public function setTPoitrine($tPoitrine)
    {
        $this->tPoitrine = $tPoitrine;

        return $this;
    }

    /**
     * Get tPoitrine
     *
     * @return float
     */
    public function getTPoitrine()
    {
        return $this->tPoitrine;
    }

    /**
     * Set ceinture
     *
     * @param float $ceinture
     *
     * @return Client
     */
    public function setCeinture($ceinture)
    {
        $this->ceinture = $ceinture;

        return $this;
    }

    /**
     * Get ceinture
     *
     * @return float
     */
    public function getCeinture()
    {
        return $this->ceinture;
    }

    /**
     * Set bassin
     *
     * @param float $bassin
     *
     * @return Client
     */
    public function setBassin($bassin)
    {
        $this->bassin = $bassin;

        return $this;
    }

    /**
     * Get bassin
     *
     * @return float
     */
    public function getBassin()
    {
        return $this->bassin;
    }

    /**
     * Set lPatalon
     *
     * @param float $lPatalon
     *
     * @return Client
     */
    public function setLPatalon($lPatalon)
    {
        $this->lPatalon = $lPatalon;

        return $this;
    }

    /**
     * Get lPatalon
     *
     * @return float
     */
    public function getLPatalon()
    {
        return $this->lPatalon;
    }

    /**
     * Set cuisse
     *
     * @param float $cuisse
     *
     * @return Client
     */
    public function setCuisse($cuisse)
    {
        $this->cuisse = $cuisse;

        return $this;
    }

    /**
     * Get cuisse
     *
     * @return float
     */
    public function getCuisse()
    {
        return $this->cuisse;
    }

    /**
     * Set tCheville
     *
     * @param float $tCheville
     *
     * @return Client
     */
    public function setTCheville($tCheville)
    {
        $this->tCheville = $tCheville;

        return $this;
    }

    /**
     * Get tCheville
     *
     * @return float
     */
    public function getTCheville()
    {
        return $this->tCheville;
    }

    /**
     * Set encolure
     *
     * @param float $encolure
     *
     * @return Client
     */
    public function setEncolure($encolure)
    {
        $this->encolure = $encolure;

        return $this;
    }

    /**
     * Get encolure
     *
     * @return float
     */
    public function getEncolure()
    {
        return $this->encolure;
    }

    /**
     * @return Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param Commande $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    /**
     * @return Modele
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param Modele $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
 
}

