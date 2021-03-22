<?php


namespace App\Repositories;


use App\Dto\AdminDto;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminRepository
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
    public function CreateAdmin(AdminDto $dto): bool
    {
        return $this->model->fill(collect($dto)->toArray())->save();
    }

    /**
     * @param $username
     * @return Admin
     */
    public function FindAdminByUsername($username) : Admin
    {
        return $this->model::where("username", $username)->first() ?: $this->model;
    }
}
