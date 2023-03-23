<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Initiative extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[

        'name',
        'image',
        'number_volunteer',
        'id_admin',
        'description'
        ,'id_project'

    ];

    public static function index()
    {
       return Initiative::join('projects', 'projects.id', '=', 'initiatives.id_project')
       ->select('projects.name as name_project','initiatives.*')
       ->get();

    }

    public function project()
{
    return $this->belongsTo(Project::class, 'id_project');
}
}
