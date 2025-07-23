<?php 
namespace App\Entity;

class Services extends Attributs
{
    // Ajoutez ici les méthodes spécifiques à l'entité Service

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

}