<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepositories;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;


/**
 * Class UserServices
 * @package App\Services
 */
class UserServices
{
    /**
     * @var UserRepositories
     */
    private $userRepositories;
    /**
     * @var User
     */
    private $model;

    /**
     * UserServices constructor.
     * @param UserRepositories $userRepositories
     * @param User $user
     */
    public function __construct(UserRepositories $userRepositories, User $user)
    {
        $this->model = $user;
        $this->userRepositories = $userRepositories;
    }


    /**
     * @param array $data
     * @return bool
     */
    public function registrationUser(array $data): bool
    {
        $model = new User();
        $model->id = Uuid::uuid4()->toString();
        $model->login = $data['login'];
        $model->email = $data['email'];
        $model->phone = $data['phone'];
        $model->password = Hash::make($data['password']);

        if ($this->userRepositories->saveUser($model)) {

            return true;
        }

        return false;
    }


}
