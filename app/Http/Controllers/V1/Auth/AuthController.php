<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\RegisterReqeust;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param RegisterReqeust $reqeust
     */
    public function Register(RegisterReqeust $reqeust) {
        $reqeust->all();
    }
}
