<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departModel extends Model
{
    public  $table = "depart";
    public  $primiaryKey = 'id';
    public  $incrementing = true;
    public  $KeyType = 'int';
    public  $timestamps = true;
}
