<?php


namespace App\Dto;


use App\Models\Devices;

class UserDto
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $password;
    public $updated_at;
    public $created_at;
    public $deleted_at;
    public $device_name = Devices::WEB;
}
