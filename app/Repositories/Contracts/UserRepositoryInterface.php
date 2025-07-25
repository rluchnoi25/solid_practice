<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function save(array $data);

    public function update(array $data);

    public function delete(int $id);
}
