<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\AdminRepository;
use App\Http\Requests\Admin\AdminRequest;
use Exception;

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
        try {
            $formFields = $request->validated();

            $data = [
                'username' => $formFields['username'],
                'password' => bcrypt($formFields['password'])
            ];

            $this->adminRepository->createAdmin($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function adminDetails($id)
    {
        return $this->adminRepository->getAdminById($id);
    }

    public function updateAdmin(AdminRequest $request, $id)
    {
        try {
            $formFields = $request->validated();

            $data = [
                'username' => $formFields['username'],
                'password' => bcrypt($formFields['password'])
            ];

            $this->adminRepository->updateAdmin($data, $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAdmin($id)
    {
        $this->adminRepository->deleteAdmin($id);
    }
}
