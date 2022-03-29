<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['role'] - string - contains the user role (client or admin)
     * $this->attributes['balance'] - int - contains the user balance
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * $this->orders - Order[] - contains the associated orders
     * $this->attributes['lastname'] - string - contains the user lastname
     * $this->attributes['birthday'] - date - contains the user birthday
     * $this->attributes['gender'] - string - contains the user gender
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'birthday',
        'gender',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validate($request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            "email" => "required",
            "role" => "required",

        ]);
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


    public function getLastname(){
        return $this->attributes['lastname'];
    }

    public function setLastName($lastname){
        $this->attributes['lastname'] = $lastname;
    }

    public function getBirthday(){
        return $this->attributes['birthday'];
    }

    public function setBirthday($birthday){
        $this->attributes['birthday'] = $birthday;
    }

    public function getGender(){
        return $this->attributes['gender'];
    }

    public function setGender($gender){
        $this->attributes['gender'] = $gender;
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function setEmail($email){
        $this->attributes['email'] = $email;
    }

    public function getPassword(){
        return $this->attributes['password'];
    }

    public function setPassword($password){
        $this->attributes['password'] = $password;
    }

    public function getRole(){
        return $this->attributes['role'];
    }

    public function setRole($role){
        $this->attributes['role'] = $role;
    }

    public function getBalance(){
        return $this->attributes['balance'];
    }

    public function setBalance($balance){
        $this->attributes['balance'] = $balance;
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

    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function getOrders(){
        return $this->orders;
    }

    public function setOrders($orders){
        $this->orders = $orders;
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
    public function whisList(){
        return $this->hasOne(Whislist::class);
    }
    public function getwhisList()
    {
        return $this->pet;
    }
    public function setwhisList($whisList)
    {
        return $this->whisList = $whisList;
    }

}
