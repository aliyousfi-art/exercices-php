<?php

class Category
{
    private int $id;
    private string $nom;
    private string $description;

    public function __construct(int $id, string $nom, string $description)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

    /**
     * Retourne le slug du nom
     * Exemple : "Informatique et High-Tech" => "informatique-et-high-tech"
     */
    public function getSlug(): string
    {
        // Met en minuscules
        $slug = strtolower($this->nom);
        // Remplace les espaces par des tirets
        $slug = str_replace(' ', '-', $slug);
        // Optionnel : retirer caractères spéciaux
        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
        return $slug;
    }

    // Getters si nécessaire
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
