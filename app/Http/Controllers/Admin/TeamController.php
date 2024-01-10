<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Http\Services\Admin\TeamService;

class TeamController extends Controller
{
    private TeamService $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function members()
    {
        $members = $this->teamService->members();
        return view('admin.pages.team.all', ['title' => 'فريق العمل'], ['members' => $members]);
    }

    public function teamMemberDetails($id)
    {
        $member = $this->teamService->teamMemberDetails($id);
        return view('admin.pages.team.view', ['title' => 'معلومات الموظف'], ['member' => $member]);
    }

    public function viewAddTeamMember()
    {
        return view('admin.pages.team.add', ['title' => 'إضافة موظف']);
    }

    public function storeTeamMember(TeamRequest $request)
    {
        try {
            $this->teamService->storeTeamMember($request);
            return redirect()->back()->with('success', 'تمت إضافة الموظف بنجاح');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewUpdateTeamMember($id)
    {
        $member = $this->teamService->teamMemberDetails($id);
        return view('admin.pages.team.edit', ['title' => 'تعديل معلومات الموظف'], ['member' => $member]);
    }

    public function updateTeamMember(TeamRequest $request, $id)
    {
        try {
            $this->teamService->updateTeamMember($request, $id);
            return redirect()->back()->with('success', 'تم تعديل معلومات الموظف بنجاح');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTeamMember($id)
    {
        $this->teamService->deleteTeamMember($id);
        return redirect()->back()->with('success', 'تم حذف الموظف بنجاح');
    }
}
