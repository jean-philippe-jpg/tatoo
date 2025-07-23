<?php
namespace App\Entity;

class Prestations extends Attributs
{
    // Ajoutez ici les méthodes spécifiques à l'entité Prestations

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
    public function getServiceId(): int
    {
        return $this->service_id;
    }
    public function setServiceId(int $service_id): void
    {
        $this->service_id = $service_id;
    }


    public function getP_id()
    {
        return $this->p_id;
    }

    
    public function setP_id($p_id)
    {
        $this->p_id = $p_id;

        return $this;
    }
  
    public function getS_id()
    {
        return $this->s_id;
    }

    public function setS_id($s_id)
    {
        $this->s_id = $s_id;

        return $this;
    }




}