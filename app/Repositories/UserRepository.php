<?php


namespace App\Repositories;


use App\Dto\AdminDto;
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
     * @param AdminDto $dto
     * @return bool
     */
    public function CreateUser(AdminDto $dto): bool
    {
        return $this->model->fill(collect($dto)->toArray())->save();
    }

    /**
     * @param $username
     * @return User
     */
    public function FindUserByUsername($username) : User
    {
        return $this->model::where("username", $username)->first() ?: $this->model;
    }
}
