<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
        /**
     * PET ATTRIBUTES
     * $this->attributes['id'] - int - contains the pet primary key (id)
     * $this->attributes['name'] - string - contains the pet name
     * $this->attributes['weight'] - double - contains the pet weight
     * $this->attributes['dateBirth'] - date - contains the pet date birth
     * $this->attributes['gender'] - String - contains the pet gender
     * $this->attributes['breed_id'] - Int - contains the breed_id'
     * $this->attributes['user_id'] - Int - contains the user_id
    */

    protected $fillable = ['name','weight','dateBirth','gender','breed_id'];


    public static function validate($request)
    {
        $request->validate([
            'name' => 'required',
            "weight" => "required|regex:/^\d+(\.\d{1,2})?$/",
            "dateBirth" => "required|date|",
            "gender" => "required|in:Masculino,Femenino",
            "breed_id" => "required|numeric"
        ]);
    }
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

    public function getWeight()
    {
        return $this->attributes['weight'];
    }

    public function setWeight($weight)
    {
        $this->attributes['weight'] = $weight;
    }
    public function getDateBirth()
    {
        return $this->attributes['dateBirth'];
    }

    public function setDateBirth($dateBirth)
    {
        $this->attributes['dateBirth'] = $dateBirth;
    }
    public function getGender()
    {
        return $this->attributes['gender'];
    }

    public function setGender($gender)
    {
        $this->attributes['gender'] = $gender;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    public function getBreedId()
    {
        return $this->breed_id;
    }
    public function setBreedId($breed_id)
    {
        return $this->breed_id = $breed_id;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserId()
    {
        return $this->breed_id;
    }
    public function setUserId($user_id)
    {
        return $this->user_id = $user_id;
    }
}
