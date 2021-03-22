<?php


namespace App\Services;


use App\Dto\AdminDto;
use App\Models\User;

interface IAdminService
{
    /**
     * 用户注册
     *
     * @param AdminDto $dto
     * @return mixed
     */
    public function Register(AdminDto $dto);

    /**
     * 登录
     *
     * @param AdminDto $dto
     * @return string
     */
    public function Login(AdminDto $dto) : string;
}
