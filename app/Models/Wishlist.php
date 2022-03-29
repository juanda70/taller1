<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
     /**
     * PET ATTRIBUTES
     * $this->attributes['id'] - int - contains the pet primary key (id)
     * $this->attributes['product_id'] - Int - contains the product_id'
     * $this->attributes['user_id'] - Int - contains the user_id
    */
    use HasFactory;
    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function ProductWhisList(){
        return $this->hasMany(Productwhislist::class);
    }

    public function getProductWhisList(){
        return $this->productWhisList;
    }

    public function setProductWhisList($productWhisList){
        $this->productWhisList = $productWhisList;
    }
    public function getProductWhisListId(){
        return $this->productWhisList_id;
    }

    public function setProductWhisListId($productWhisList){
        $this->productWhisList_id = $productWhisList;
    }
    public function user(){
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
