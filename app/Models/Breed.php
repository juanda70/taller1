<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['breed'] = $bredd;
    }
    public function getPet()
    {
        return $this->attributes['pet'];
    }

    public function setPet($pet)
    {
        $this->attributes['pet'] = $pet;
    }
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
