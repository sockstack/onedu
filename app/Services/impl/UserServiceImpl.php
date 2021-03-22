<?php


namespace App\Services\impl;


use App\Dto\UserDto;
use App\Exceptions\ApiException;
use App\Models\Api;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\IUserService;
use App\Util\ApiStatus;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements IUserService
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UserDto $dto
     * @return mixed|void
     * @throws \Throwable
     */
    public function Register(UserDto $dto)
    {
        $dto->password = Hash::make($dto->password);
        throw_if(!$this->repository->CreateUser($dto), ApiException::class);
    }

    /**
     * @param UserDto $dto
     * @return string
     * @throws \Throwable
     */
    public function Login(UserDto $dto): string
    {
        $user = $this->repository->FindUserByUsername($dto->username);
        throw_if(!$user || !Hash::check($dto->password, $user->getAuthPassword()), ApiException::class, "密码错误", ApiStatus::ERROR);

        return $user->createToken($dto->device_name, [Api::FRONTEND])->plainTextToken;
    }
}
