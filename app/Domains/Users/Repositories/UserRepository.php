<?php

namespace BestPrice\Domains\Users\Repositories;

use BestPrice\Domains\Users\Contracts\Repositories\UserRepository as UserRepositoryContract;
use BestPrice\Domains\Users\User;
use BestPrice\Support\Domain\Repository\Repository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository implements UserRepositoryContract
{
    /**
     * @var string
     */
    protected $modelClass = User::class;

    /**
     * @param Model $model
     * @param $data
     */
    protected function fillModel(Model $model, array $data = [])
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = bcrypt($data['password']);
        }

        parent::fillModel($model, $data);
    }
}