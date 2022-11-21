<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateentrer;

    /**
     * @ORM\Column(type="date")
     */
    private $datesortie;

    /**
     * @ORM\Column(type="float")
     */
    private $quantitereste;

    /**
     * @ORM\Column(type="float")
     */
    private $quantitevente;

    /**
     * @ORM\Column(type="float")
     */
    private $quantiteachter;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="stocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Produit;

    /**
     * @ORM\OneToMany(targetEntity=Inventaire::class, mappedBy="Stock")
     */
    private $inventaires;

    public function __construct()
    {
        $this->inventaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateentrer(): ?\DateTimeInterface
    {
        return $this->dateentrer;
    }

    public function setDateentrer(\DateTimeInterface $dateentrer): self
    {
        $this->dateentrer = $dateentrer;

        return $this;
    }

    public function getDatesortie(): ?\DateTimeInterface
    {
        return $this->datesortie;
    }

    public function setDatesortie(\DateTimeInterface $datesortie): self
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    public function getQuantitereste(): ?float
    {
        return $this->quantitereste;
    }

    public function setQuantitereste(float $quantitereste): self
    {
        $this->quantitereste = $quantitereste;

        return $this;
    }

    public function getQuantitevente(): ?float
    {
        return $this->quantitevente;
    }

    public function setQuantitevente(float $quantitevente): self
    {
        $this->quantitevente = $quantitevente;

        return $this;
    }

    public function getQuantiteachter(): ?float
    {
        return $this->quantiteachter;
    }

    public function setQuantiteachter(float $quantiteachter): self
    {
        $this->quantiteachter = $quantiteachter;

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

    /**
     * @return Collection|Inventaire[]
     */
    public function getInventaires(): Collection
    {
        return $this->inventaires;
    }

    public function addInventaire(Inventaire $inventaire): self
    {
        if (!$this->inventaires->contains($inventaire)) {
            $this->inventaires[] = $inventaire;
            $inventaire->setStock($this);
        }

        return $this;
    }

    public function removeInventaire(Inventaire $inventaire): self
    {
        if ($this->inventaires->removeElement($inventaire)) {
            // set the owning side to null (unless already changed)
            if ($inventaire->getStock() === $this) {
                $inventaire->setStock(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->quantitereste;
    }
}
