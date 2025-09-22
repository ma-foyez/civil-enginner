<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\EducationRepository;

class EducationController extends Controller
{
    public function __construct(
        protected EducationRepository $educationRepository
    ) {}

    public function index()
    {
        $data = [
            'education' => $this->educationRepository->getActive(),
        ];

        return view('frontend.pages.education', $data);
    }
}
