<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRequestVolunteers extends Model
{
    use HasFactory;
    protected
    $fillable=[
        'id_volunteer',
        'id_activity',
        'state'
        ];
}
