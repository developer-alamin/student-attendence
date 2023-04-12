<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    public  $table = "student";
    public  $primiaryKey = 'id';
    public  $incrementing = true;
    public  $KeyType = 'int';
    public  $timestamps = true;
}
