<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Activity extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'time',
        'date',
        'place',
        'start_register',
        'end_register',
        'number_volunteer',
        'state',
        'note_admin',
        'id_admin',
        'id_initiative',
        'number_comment',
        'number_like'
       ];

}
