<?php
// File: app/Http/Controllers/Api/UserController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Actions\GetListUsers;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(GetListUsers $action)
    {
        $result = $action->handle(10); // hardcode 10 items per page
        return UserResource::collection($result);
    }


    public function store(DtoUsers $dto, CreateUsers $action)
    {
        
    }
}


