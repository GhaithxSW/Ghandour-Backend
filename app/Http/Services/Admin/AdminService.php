<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\AdminRepository;
use App\Http\Requests\Admin\AdminRequest;

class AdminService
{
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function admins()
    {
        return $this->adminRepository->getAllAdmins();
    }

    public function storeAdmin(AdminRequest $request)
    {
        $formFields = $request->validated();

        $data = [
            'username' => $formFields['username'],
            'password' => bcrypt($formFields['password'])
        ];

        $this->adminRepository->createAdmin($data);
    }

    public function adminDetails($id)
    {
        return $this->adminRepository->getAdminById($id);
    }

    public function updateAdmin(AdminRequest $request, $id)
    {
        $formFields = $request->validated();
        $admin = $this->adminRepository->getAdminById($id);

        $data = [
            'username' => $formFields['username'],
            'password' => isset($formFields['password']) ? bcrypt($formFields['password']) : $admin->id
        ];

        $this->adminRepository->updateAdmin($data, $id);
    }

    public function deleteAdmin($id)
    {
        $this->adminRepository->deleteAdmin($id);
    }
}
