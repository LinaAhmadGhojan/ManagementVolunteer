<?php

namespace App\Http\Controllers\Dashboard\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class VolunteerController extends Controller
{
    public function index()
    {
        return  response()->json(["volunteers"=>User::all()], 200);
    }
}
