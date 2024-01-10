<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;

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
        $formFields = $request->validated();

        $data = [
            'first_name' => $formFields['first_name'],
            'last_name' => $formFields['last_name'],
            'phone' => $formFields['phone'],
            'email' => $formFields['email'],
            'country' => $formFields['country'],
        ];

        $this->userRepository->createUser($data);
    }

    public function viewUpdateUser($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function updateUser(UserRequest $request, $id)
    {
        $formFields = $request->validated();
        $user = $this->userRepository->getUserById($id);

        $data = [
            'first_name' => isset($formFields['first_name']) ? $formFields['first_name'] : $user->first_name,
            'last_name' => isset($formFields['last_name']) ? $formFields['last_name'] : $user->last_name,
            'phone' => isset($formFields['phone']) ? $formFields['phone'] : $user->phone,
            'email' => isset($formFields['email']) ? $formFields['email'] : $user->email,
            'country' => isset($formFields['country']) ? $formFields['country'] : $user->country,
        ];

        $this->userRepository->updateUser($data, $id);
    }

    public function deleteUser($id)
    {
        $this->userRepository->deleteUser($id);
    }
}
