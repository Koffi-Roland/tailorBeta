<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="tb_client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=25)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

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
     * @var ArrayCollection commande
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Commande", mappedBy="client", cascade={"persist", "remove", "merge"})
     */
    private $commande;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Client
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return Client
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
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
     * @return ArrayCollection
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param ArrayCollection $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }
}

