<?php

namespace App\Http\Controllers\V1\Auth;

use App\Dto\AdminDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\AdminLoginRequest;
use App\Http\Requests\V1\Auth\AdminRegisterRequest;
use App\Services\IAdminService;
use App\Util\ApiStatus;
use App\Util\Response;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{

    /**
     * @param AdminRegisterRequest $request
     * @param IAdminService $service
     * @return JsonResponse
     */
    public function Register(AdminRegisterRequest $request, IAdminService $service): JsonResponse
    {
        $dto = new AdminDto();
        $dto->name = $request->get("name");
        $dto->username = $request->get("username");
        $dto->email = $request->get("email");
        $dto->password = $request->get("password");

        $service->Register($dto);

        return \response()->json((new Response())->setCode(ApiStatus::SUCCESS)
            ->setMessage(ApiStatus::Message(ApiStatus::SUCCESS))->toArray());
    }

    /**
     * @param AdminLoginRequest $request
     * @param IAdminService $service
     * @return JsonResponse
     */
    public function Login(AdminLoginRequest $request, IAdminService $service): JsonResponse
    {
        $dto = new AdminDto();
        $dto->username = $request->get("username");
        $dto->password = $request->get("password");

        $token = $service->Login($dto);
        return \response()->json((new Response())->setCode(ApiStatus::SUCCESS)
            ->setMessage(ApiStatus::Message(ApiStatus::SUCCESS))->setData($token)->toArray());
    }
}
