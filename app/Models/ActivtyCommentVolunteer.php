<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivtyCommentVolunteer extends Model
{
    use HasFactory;
    protected
    $fillable=[
        'id_volunteer',
        'comment',
        'id_activity',
        'like'
        ];
}
