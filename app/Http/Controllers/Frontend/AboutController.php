<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AboutSectionRepository;
use App\Repositories\EducationRepository;
use App\Repositories\ExperienceRepository;

class AboutController extends Controller
{
    public function __construct(
        protected AboutSectionRepository $aboutRepository,
        protected EducationRepository $educationRepository,
        protected ExperienceRepository $experienceRepository
    ) {}

    public function index()
    {
        $data = [
            'about' => $this->aboutRepository->getFirst(),
            'education' => $this->educationRepository->getActive(),
            'experiences' => $this->experienceRepository->getActive(),
        ];

        return view('frontend.pages.about', $data);
    }
}
