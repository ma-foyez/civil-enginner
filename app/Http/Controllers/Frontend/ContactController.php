<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class ContactController extends FrontendController
{
    public function index(): View
    {
        // Get contact page content if exists
        $contactPage = Post::type('page')
            ->where('slug', 'contact')
            ->published()
            ->first();

        // Get contact information from settings
        $contactInfo = $this->getContactInfo();

        return $this->renderView('frontend.pages.contact', compact(
            'contactPage',
            'contactInfo'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Store contact message in database
            $contact = Post::create([
                'title' => 'Contact: ' . $request->subject,
                'content' => $request->message,
                'excerpt' => "From: {$request->name} ({$request->email})" . 
                           ($request->phone ? " | Phone: {$request->phone}" : ''),
                'post_type' => 'contact_message',
                'status' => 'draft', // Store as draft for admin review
                'user_id' => 1, // System user or admin
            ]);

            // Store contact details as meta
            $contact->setMeta('contact_name', $request->name);
            $contact->setMeta('contact_email', $request->email);
            $contact->setMeta('contact_phone', $request->phone);
            $contact->setMeta('contact_subject', $request->subject);
            $contact->setMeta('contact_ip', $request->ip());
            $contact->setMeta('contact_user_agent', $request->userAgent());

            // Send email notification to admin
            $this->sendContactNotification($request->all());

            // Send auto-reply to user
            $this->sendAutoReply($request->email, $request->name);

            return back()->with('success', 'Thank you for your message! We will get back to you soon.');

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return back()->with('error', 'Sorry, there was an error sending your message. Please try again.');
        }
    }

    /**
     * Get contact information from settings
     */
    private function getContactInfo(): array
    {
        return [
            'email' => config('settings.contact_email', 'contact@example.com'),
            'phone' => config('settings.contact_phone', '+1 (555) 123-4567'),
            'address' => config('settings.contact_address', '123 Main Street, City, State 12345'),
            'office_hours' => config('settings.office_hours', 'Monday - Friday: 9:00 AM - 6:00 PM'),
            'linkedin' => config('settings.social_linkedin'),
            'twitter' => config('settings.social_twitter'),
            'facebook' => config('settings.social_facebook'),
            'instagram' => config('settings.social_instagram'),
        ];
    }

    /**
     * Send email notification to admin
     */
    private function sendContactNotification(array $data): void
    {
        $adminEmail = config('settings.admin_email', config('mail.from.address'));
        
        Mail::send('frontend.emails.contact-notification', ['data' => $data], function ($message) use ($adminEmail, $data) {
            $message->to($adminEmail)
                    ->subject('New Contact Form Submission: ' . $data['subject'])
                    ->replyTo($data['email'], $data['name']);
        });
    }

    /**
     * Send auto-reply to user
     */
    private function sendAutoReply(string $email, string $name): void
    {
        $siteName = config('settings.app_name', 'Civil Engineer Portfolio');
        
        Mail::send('frontend.emails.contact-auto-reply', ['name' => $name, 'siteName' => $siteName], function ($message) use ($email, $name, $siteName) {
            $message->to($email, $name)
                    ->subject("Thank you for contacting {$siteName}")
                    ->from(config('mail.from.address'), config('mail.from.name'));
        });
    }
}
