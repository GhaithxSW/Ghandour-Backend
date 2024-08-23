<?php

namespace App\Http\Services;

use App\Http\Repositories\ResearchRepository;

class ResearchService
{
    private ResearchRepository $researchRepository;

    public function __construct(ResearchRepository $researchRepository)
    {
        $this->researchRepository = $researchRepository;
    }

    public function researchSamples()
    {
        return $this->researchRepository->getAllResearches();
    }

    public function viewResearch($id)
    {
        return $this->researchRepository->getResearchById($id);
    }

    // public function download($fileName)
    // {
    //     $filePath = public_path('public/pdfs/' . $fileName);
    //     return response()->download($filePath);
    // }

    public function download($fileName)
    {
        $filePath = storage_path('app/public/pdfs/' . $fileName);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }


    public function downloadDocx($fileName)
    {
        $filePath = storage_path('app/public/docx_files/' . $fileName);

    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }
}
