<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated items
     * 
     * 
     * $this->attributes['maker'] - string - contains the product maker
     */
    use HasFactory;

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "maker" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);
    }

    public static function sumPricesByQuantities($products, $productsInSession){
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name){
        $this->attributes['name'] = $name;
    }
    
    public function getMaker(){
        return $this->attributes['maker'];
    }

    public function setMaker($maker){
        $this->attributes['maker'] = $maker;
    }

    public function getDescription(){
        return $this->attributes['description'];
    }

    public function setDescription($description){
        $this->attributes['description'] = $description;
    }

    public function getImage(){
        return $this->attributes['image'];
    }

    public function setImage($image){
        $this->attributes['image'] = $image;
    }

    public function getPrice(){
        return $this->attributes['price'];
    }

    public function setPrice($price){
        $this->attributes['price'] = $price;
    }

    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt){
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function getItems(){
        return $this->items;
    }

    public function setItems($items){
        $this->items = $items;
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
    public function productbreeds(){
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
