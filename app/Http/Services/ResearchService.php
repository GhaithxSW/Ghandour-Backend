<?php

namespace App\Http\Services;

use Exception;
use App\Models\ResearchRequest;
use App\Http\Repositories\ResearchRepository;
use App\Http\Requests\Admin\ResearchRequestRequest;
use App\Models\Research;

class ResearchService
{
    private ResearchRepository $researchRepository;

    public function __construct(ResearchRepository $researchRepository)
    {
        $this->researchRepository = $researchRepository;
    }

    public function researches()
    {
        return $this->researchRepository->getAllResearches();
    }

    public function addResearch(ResearchRequestRequest $request)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }

            Research::create([
                'title' => $formFields['title'],
                'image' => isset($formFields['image']) ? $formFields['image'] : null,
                'content' => $formFields['content']
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getResearch($id)
    {
        return $this->researchRepository->getResearchById($id);
    }

    public function editResearch(ResearchRequestRequest $request, $id)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }

            $research = $this->researchRepository->getResearchById($id);

            $research->update([
                'title' => $formFields['title'],
                'image' => isset($formFields['image']) ? $formFields['image'] : $research->image,
                'content' => $formFields['content']
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteResearch($id)
    {
        $this->researchRepository->deleteResearch($id);
    }
}
