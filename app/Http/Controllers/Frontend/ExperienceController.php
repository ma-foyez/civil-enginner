<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\ExperienceRepository;

class ExperienceController extends Controller
{
    public function __construct(
        protected ExperienceRepository $experienceRepository
    ) {}

    public function index()
    {
        $data = [
            'experiences' => $this->experienceRepository->getActive(),
        ];

        return view('frontend.pages.experience', $data);
    }
}
