<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\AdminRepository;
use App\Http\Repositories\TeamRepository;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\TeamRequest;
use Exception;

class TeamService
{
    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function members()
    {
        return $this->teamRepository->getAllMembers();
    }

    public function teamMemberDetails($id)
    {
        return $this->teamRepository->getMemberById($id);
    }

    public function storeTeamMember(TeamRequest $request)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('photo')) {
                $formFields['photo'] = $request->file('photo')->store('images', 'public');
            }

            $data = [
                'name' => $formFields['name'],
                'photo' => isset($formFields['photo']) ? $formFields['photo'] : null,
                'position' => $formFields['position'],
                'about' => $formFields['about']
            ];

            $this->teamRepository->createMember($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateTeamMember(TeamRequest $request, $id)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('photo')) {
                $formFields['photo'] = $request->file('photo')->store('images', 'public');
            }

            $member = $this->teamRepository->getMemberById($id);

            $data = [
                'name' => isset($formFields['name']) ? $formFields['name'] : $member->name,
                'photo' => isset($formFields['photo']) ? $formFields['photo'] : $member->photo,
                'position' => isset($formFields['position']) ? $formFields['position'] : $member->position,
                'about' => isset($formFields['about']) ? $formFields['about'] : $member->about,
            ];

            $this->teamRepository->updateMember($data, $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTeamMember($id)
    {
        $this->teamRepository->deleteMember($id);
    }
}
