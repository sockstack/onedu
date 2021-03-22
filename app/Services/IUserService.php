<?php


namespace App\Services;


use App\Dto\UserDto;
use App\Models\User;

interface IUserService
{
    /**
     * 用户注册
     *
     * @param UserDto $dto
     * @return mixed
     */
    public function Register(UserDto $dto);

    /**
     * 登录
     *
     * @param UserDto $dto
     * @return string
     */
    public function Login(UserDto $dto) : string;
}
