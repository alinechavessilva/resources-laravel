<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{

    public function index(){
        //getall

        $users = User::get();

        return UserResource::collection($users);

    }



}
