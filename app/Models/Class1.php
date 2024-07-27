<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Class1 extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table='classes';
    protected $fillable = [
        'class_name',
        'capacity',
        'is_fulled',
        'price',
        'time_from',
        'time_to',
    ];
    }

