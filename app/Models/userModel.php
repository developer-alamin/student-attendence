<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    public  $table = "adminuser";
    public  $primiaryKey = 'id';
    public  $incrementing = true;
    public  $KeyType = 'int';
    public  $timestamps = false;
}
