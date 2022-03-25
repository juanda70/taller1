<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breedtype extends Model
{
    use HasFactory;
    protected $fillable = [];
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
    public function getPet()
    {
        return $this->pet;
    }
    public function setPet($pet)
    {
        return $this->pet = $pet;
    }
    public function breed(){
        return $this->belongsTo(Breed::class);
    }
    public function getBreed()
    {
        return $this->breed;
    }
    public function setBreed($breed)
    {
        return $this->breed = $breed;
    }
}
