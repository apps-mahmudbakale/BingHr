<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;

class UserRepository extends BaseRepository
{
    /**
     * create an instance of the class.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(UserFormRequest $request): User
    {
        return DB::transaction(function () use ($request) {
            $newUser = $this->model::create([
                'employee_id' => $request->employee_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if (! $newUser) {
                throw new Exception('Account could not be created at the moment');
            }

            if ($request->has('role')) {
                $newUser->assignRole($request->role);
            } else {
                $newUser->assignRole('User');
            }

            if($request->has('permissions')) {
                $newUser->givePermissionTo($request->permissions);
            }

            return $newUser;
        });
    }

    public function update(UserFormRequest $request, User $user): User
    {
        return DB::transaction(function () use ($request, $user) {
            if (! $user->update([
                'employee_id' => $request->employee_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
            ])) {
                throw new Exception('User Could not be updated');
            }

            if ($request->has('role')) {
                $user->syncRoles($request->role);
            } else {
                $user->syncRoles('User');
            }

            if ($request->has('permissions')) {
                $user->syncPermissions($request->permissions);
            }
            
            return $user;
        });
    }

    /**
     * @param  int  $id
     *
     * @return User
     * @throws GeneralException
     */
    public function deleteById($id): User
    {
        $user = $this->getById($id);

        if ($user->delete()) {
            return $user;
        }

        throw new Exception('There was a problem deleting this user. Please try again.');
    }

    public function updatePassword(User $user, array $data = []): User
    {
        return DB::transaction(function () use ($user, $data) {
            if (isset($data['current_password'])) {
                throw_if(
                    ! Hash::check($data['current_password'], $user->password),
                    new Exception('That is not your old password.')
                );
            }

            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            return $user;
        });
    }
}
