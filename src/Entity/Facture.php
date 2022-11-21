<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statudupayement;
    
    

    /**
     * @ORM\ManyToMany(targetEntity=Client::class, inversedBy="factures" )
     */
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="factures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Produit;

    /**
     * @ORM\Column(type="float")
     */
    private $pu;

    /**
     * @ORM\Column(type="float")
     */
    private $PHT;

    /**
     * @ORM\Column(type="float")
     */
    private $totalHT;

    /**
     * @ORM\Column(type="float")
     */
    private $TVA;

    /**
     * @ORM\Column(type="float")
     */
    private $TTC;

    /**
     * @ORM\Column(type="float")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typedeclient;

    public function __construct()
    {
        $this->Client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?float
    {
        return $this->numero;
    }

    public function setNumero(float $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStatudupayement(): ?string
    {
        return $this->statudupayement;
    }

    public function setStatudupayement(string $statudupayement): self
    {
        $this->statudupayement = $statudupayement;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClient(): Collection
    {
        return $this->Client;
    }

    public function addClient(Client $client): self
    {
        if (!$this->Client->contains($client)) {
            $this->Client[] = $client;
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        $this->Client->removeElement($client);

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): self
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getPu(): ?float
    {
        return $this->pu;
    }

    public function setPu(float $pu): self
    {
        $this->pu = $pu;

        return $this;
    }

    public function getPHT(): ?float
    {
        return $this->PHT;
    }

    public function setPHT(float $PHT): self
    {
        $this->PHT = $PHT;

        return $this;
    }

    public function getTotalHT(): ?float
    { 
        $totalHT=0;
       
            return  $this->totalHT =$this->getPu()*$this->getQuantite();
             

       
    }

    public function setTotalHT(float $totalHT): self
    {
        $this->totalHT = $totalHT;

        return $this;
    }

    public function getTVA(): ?float
    {
        
     return   $this->TVA= $this->getTotalHT()*0.2;
    }

    public function setTVA(float $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getTTC(): ?float
    {
        return $this->TTC =$this->getTotalHT()*1.2;
    }

    public function setTTC(float $TTC): self
    {
        $this->TTC = $TTC;

        return $this;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getTypedeclient(): ?string
    {
        return $this->typedeclient;
    }

    public function setTypedeclient(string $typedeclient): self
    {
        $this->typedeclient = $typedeclient;

        return $this;
    }
   
    
}
