<?php


namespace App\Services\impl;


use App\Dto\AdminDto;
use App\Exceptions\ApiException;
use App\Models\Api;
use App\Models\User;
use App\Repositories\AdminRepository;
use App\Services\IAdminService;
use App\Util\ApiStatus;
use Illuminate\Support\Facades\Hash;

class AdminServiceImpl implements IAdminService
{
    private $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param AdminDto $dto
     * @return mixed|void
     * @throws \Throwable
     */
    public function Register(AdminDto $dto)
    {
        $dto->password = Hash::make($dto->password);
        throw_if(!$this->repository->CreateAdmin($dto), ApiException::class);
    }

    /**
     * @param AdminDto $dto
     * @return string
     * @throws \Throwable
     */
    public function Login(AdminDto $dto): string
    {
        $admin = $this->repository->FindAdminByUsername($dto->username);
        throw_if(!$admin || !Hash::check($dto->password, $admin->getAuthPassword()), ApiException::class, "密码错误", ApiStatus::ERROR);

        return $admin->createToken($dto->device_name, [Api::BACKEND])->plainTextToken;
    }
}
