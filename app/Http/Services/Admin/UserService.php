<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Exception;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function users()
    {
        return $this->userRepository->getAllUsers();
    }

    public function userDetails($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function storeUser(UserRequest $request)
    {
        try {
            $formFields = $request->validated();

            $data = [
                'name' => $formFields['name'],
                'email' => $formFields['email'],
                'password' => bcrypt($formFields['password'])
            ];

            $this->userRepository->createUser($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewUpdateUser($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function updateUser(UserRequest $request, $id)
    {
        try {
            $formFields = $request->validated();

            $data = [
                'name' => $formFields['name'],
                'email' => $formFields['email'],
                'password' => bcrypt($formFields['password'])
            ];

            $this->userRepository->updateUser($data, $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteUser($id)
    {
        $this->userRepository->deleteUser($id);
    }
}
