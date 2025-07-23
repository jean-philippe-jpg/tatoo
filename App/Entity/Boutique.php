<?php
namespace App\Entity;

class Boutique extends Attributs
{
    // Ajoutez ici les méthodes spécifiques à l'entité Boutique

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {

        $titre = ucfirst($this->titre);
        return $titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public function getLibele(): string
    {
        return $this->libele;
    }
    public function setLibele(string $libele): void
    {
        $this->libele = $libele;
    }
    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }
    public function setCategorieId(int $categorie_id): void
    {
        $this->categorie_id = $categorie_id;
    }

    public function getTitre_ct(): int
    {
        return $this->titre_ct;
    }

    
}
