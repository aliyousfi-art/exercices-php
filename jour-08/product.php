<?php

class Product
{
    // Propriétés
    private int $id;
    private string $nom;
    private string $description;
    private float $prix;
    private int $stock;
    private string $categorie;

    // Constructeur
    public function __construct(int $id, string $nom, string $description, float $prix, int $stock, string $categorie)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->categorie = $categorie;
    }

    // Méthodes

    /**
     * Retourne le prix TTC
     * @param float $vat
     * @return float
     */
    public function getPriceIncludingTax(float $vat = 20): float
    {
        return $this->prix * (1 + $vat / 100);
    }

    /**
     * Vérifie si le produit est en stock
     * @return bool
     */
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    /**
     * Réduit le stock du produit
     * @param int $quantity
     * @return void
     * @throws Exception si la quantité demandée est trop élevée
     */
    public function reduceStock(int $quantity): void
    {
        if ($quantity > $this->stock) {
            throw new Exception("Quantité demandée supérieure au stock disponible.");
        }
        $this->stock -= $quantity;
    }

    /**
     * Applique une réduction en pourcentage sur le prix
     * @param float $percentage
     * @return void
     */
    public function applyDiscount(float $percentage): void
    {
        if ($percentage < 0 || $percentage > 100) {
            throw new Exception("Pourcentage de réduction invalide.");
        }
        $this->prix -= $this->prix * ($percentage / 100);
    }

    // Getters optionnels si besoin
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }
}
