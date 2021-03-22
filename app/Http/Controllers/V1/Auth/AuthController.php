<?php

namespace App\Http\Controllers\V1\Auth;

use App\Dto\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterReqeust;
use App\Services\IUserService;
use App\Util\ApiStatus;
use App\Util\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param RegisterReqeust $reqeust
     * @param IUserService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function Register(RegisterReqeust $request, IUserService $service): \Illuminate\Http\JsonResponse
    {
        $dto = new UserDto();
        $dto->name = $request->get("name");
        $dto->username = $request->get("username");
        $dto->email = $request->get("email");
        $dto->password = $request->get("password");

        $service->Register($dto);

        return \response()->json((new Response())->setCode(ApiStatus::SUCCESS)
            ->setMessage(ApiStatus::Message(ApiStatus::SUCCESS))->toArray());
    }

    /**
     * @param LoginRequest $request
     * @param IUserService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function Login(LoginRequest $request, IUserService $service): \Illuminate\Http\JsonResponse
    {
        $dto = new UserDto();
        $dto->username = $request->get("username");
        $dto->password = $request->get("password");

        $token = $service->Login($dto);
        return \response()->json((new Response())->setCode(ApiStatus::SUCCESS)
            ->setMessage(ApiStatus::Message(ApiStatus::SUCCESS))->setData($token)->toArray());
    }
}
