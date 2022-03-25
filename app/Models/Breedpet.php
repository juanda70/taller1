<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breedpet extends Model
{
    use HasFactory;
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function pet()
    {
        return $this->hasOne(Pet::class);
    }

    public function getPet()
    {
        return $this->pet;
    }

    public function setPet($pet)
    {
        $this->pet = $pet;
    }
    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    public function getBreeds()
    {
        return $this->breeds;
    }

    public function setBreeds($breeds)
    {
        $this->breeds = $breeds;
    }
}
