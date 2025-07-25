<?php

namespace App\Repositories\RawSql;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function save(array $data): User
    {
        $hashedPassword = Hash::make($data['password']);

        $id = DB::insert(
            'INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())',
            [$data['name'], $data['email'], $hashedPassword]
        );

        $lastId = DB::getPdo()->lastInsertId();

        return User::findOrFail($lastId);
    }

    public function update(array $data): User
    {
        $params = [
            $data['name'],
            $data['email'],
        ];

        $sql = 'UPDATE users SET name = ?, email = ?';

        if (!empty($data['password'])) {
            $sql .= ', password = ?';
            $params[] = Hash::make($data['password']);
        }

        $sql .= ', updated_at = NOW() WHERE id = ?';
        $params[] = $data['id'];

        DB::update($sql, $params);

        return User::findOrFail($data['id']);
    }

    public function delete(int $id): void
    {
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
    }
}
