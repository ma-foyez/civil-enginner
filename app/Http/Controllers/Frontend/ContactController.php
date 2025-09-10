<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Repositories\ContactMessageRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(
        protected ContactMessageRepository $contactRepository
    ) {}

    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(ContactMessageRequest $request)
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        $this->contactRepository->create($data);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
