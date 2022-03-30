<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['Name'] - string - contains the order name
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated items
     */
class Breed extends Model
{
    use HasFactory;
    protected $fillable = ['name','suggestions'];
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function pets(){
        return $this->hasMany(Pet::class);
    }
    public function getPet()
    {
        return $this->pet;
    }
    public function setPet($pet)
    {
        return $this->pet = $pet;
    }
    public function productBreeds(){
        return $this->hasMany(Productbreed::class);
    }
    public function getProductBreed()
    {
        return $this->ProductBreed;
    }
    public function setProductBreed($productBreed)
    {
        return $this->productBreed = $productBreed;
    }
}
