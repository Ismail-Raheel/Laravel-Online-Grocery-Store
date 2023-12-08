<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{ 

    public function orders()
    {
        return $this->hasMany(Order::class, 'User_Id', 'User_Id');
    }

    protected $table = "users";
    protected $primaryKey = 'User_Id';
    use HasFactory;
}
