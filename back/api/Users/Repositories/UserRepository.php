<?php

namespace Api\Users\Repositories;

use Api\Users\Models\User;
use Infrastructure\Abstracts\Repository;

class UserRepository extends Repository
{
    public function getModel()
    {
        return new User();
    }

    public function create(array $data)
    {
        $user = $this->getModel();

        $user->fill($data);
        $user->save();

        return $user;
    }

    public function update(User $user, array $data)
    {
        $user->fill($data);

        $user->save();

        return $user;
    }
}
