<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[

        'name',
        'image',
        'number_volunteer',
        'id_admin',
        'description',

    ];

    public  function initiatives()
    {
       
        
        return $this->hasMany(Initiative::class,'id_project','id')->get();
        
    }
}
