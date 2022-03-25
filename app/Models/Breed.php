<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breedpet;


class Breed extends Model
{
    use HasFactory;
    protected $fillable = ['breed','suggestions'];
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getBreed()
    {
        return $this->attributes['breed'];
    }

    public function setBreed($breed)
    {
        $this->attributes['breed'] = $breed;
    }
    public function breedpet()
    {
        return $this->belongTo(Breedpet::class);
    }
    public function getBreedpet()
    {
        return $this->attributes['breedpet'];
    }

    public function setbreedpet($breedpet)
    {
        $this->attributes['breedpet'] = $breedpet;
    }
    
}
