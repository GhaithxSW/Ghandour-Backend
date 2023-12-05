<?php

namespace App\Http\Services\Admin;

use Exception;
use App\Http\Repositories\ResearchRepository;
use App\Http\Requests\Admin\OrderRequest;
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

    public function addResearch(OrderRequest $request)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }

            $data = [
                'title' => $formFields['title'],
                'image' => isset($formFields['image']) ? $formFields['image'] : null,
                'content' => $formFields['content']
            ];

            $this->researchRepository->createResearch($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getResearch($id)
    {
        return $this->researchRepository->getResearchById($id);
    }

    public function editResearch(OrderRequest $request, $id)
    {
        try {
            $formFields = $request->validated();

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }

            $research = $this->researchRepository->getResearchById($id);

            $data = [
                'title' => $formFields['title'],
                'image' => isset($formFields['image']) ? $formFields['image'] : $research->image,
                'content' => $formFields['content']
            ];

            $this->researchRepository->updateResearch($data, $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteResearch($id)
    {
        $this->researchRepository->deleteResearch($id);
    }
}
