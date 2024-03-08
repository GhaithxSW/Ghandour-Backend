<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\ResearchRepository;
use App\Http\Requests\Admin\ResearchRequest;

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

    public function addResearch(ResearchRequest $request)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            // $formFields['image'] = $request->file('image')->store('images', 'public');
            $imageName = $formFields['title'] . '.' . $request->file('image')->getClientOriginalExtension();
            $formFields['image'] = $request->file('image')->storeAs('images', $imageName, 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $fileName = $formFields['title'] . '.' . $request->file('pdf_file')->getClientOriginalExtension();
            $formFields['pdf_file'] = $request->file('pdf_file')->storeAs('pdfs', $fileName, 'public');
        }

        $data = [
            'title' => $formFields['title'],
            // 'image' => isset($formFields['image']) ? $formFields['image'] : null,
            'image' => isset($imageName) ? $imageName : null,
            'content' => $formFields['content'],
            'pdf_file' => isset($fileName) ? $fileName : null,
        ];

        $this->researchRepository->createResearch($data);
    }

    public function researchDetails($id)
    {
        return $this->researchRepository->getResearchById($id);
    }

    public function updateResearch(ResearchRequest $request, $id)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $fileName = $formFields['title'] . '.' . $request->file('pdf_file')->getClientOriginalExtension();
            $formFields['pdf_file'] = $request->file('pdf_file')->storeAs('pdfs', $fileName, 'public');
        }

        $research = $this->researchRepository->getResearchById($id);

        $data = [
            'title' => $formFields['title'],
            'image' => isset($formFields['image']) ? $formFields['image'] : $research->image,
            'content' => $formFields['content'],
            'pdf_file' => isset($fileName) ? $fileName : $research->pdf_file,
        ];

        $this->researchRepository->updateResearch($data, $id);
    }

    public function deleteResearch($id)
    {
        $this->researchRepository->deleteResearch($id);
    }
}
