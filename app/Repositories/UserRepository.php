<?php


namespace App\Repositories;


use App\Dto\UserDto;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 添加用户
     *
     * @param UserDto $dto
     * @return bool
     */
    public function CreateUser(UserDto $dto): bool
    {
        return $this->model->fill(collect($dto)->toArray())->save();
    }

    /**
     * @param $username
     * @return User
     */
    public function FindUserByUsername($username) : User
    {
        return $this->model::where("username", $username)->first();
    }
}
