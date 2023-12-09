<?php

namespace App\Http\Repositories;

interface TeamRepository
{
    public function getAllMembers();
    public function getMemberById($id);
    public function createMember(array $data);
    public function updateMember(array $data, $id);
    public function deleteMember($id);
}
