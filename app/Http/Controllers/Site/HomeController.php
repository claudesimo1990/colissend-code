<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repository\PostRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function home(PostRepository $postRepository)
    {
        $latestPosts = $postRepository->getLastTreePosts();
        $testimonials = config('users.testimonials');
        $destinations = config('users.destinations');
        $howItWorks = config('users.howItWorks');

        return view('app.welcome', [
            'posts' => $latestPosts,
            'testimonials' => $testimonials,
            'destinations' => $destinations,
            'howItWorks' => $howItWorks
        ]);
    }

    public function howItWorks(int $id)
    {
        $section = $this->findSectionWithId(config('users.howItWorks'), $id);

        return view('app.howItWorks', [
            'section' => $section
        ]);
    }

    public function faq()
    {
        $faqs = config('users.faqs');

        return view('app.faq', [
            'faqs' => $faqs
        ]);
    }

    public function impressum()
    {
        return view('app.impressum');
    }

    public function about()
    {
        return view('app.about');
    }

    public function contact()
    {
        return view('app.contact');
    }

    public function sendMessage(Request $request): RedirectResponse
    {
        $validData = request()->validate([
           'name' => 'required',
           'email' => 'required',
           'subject' => 'required',
           'message' => 'required',
        ]);

        $contact = Contact::create($validData);

        Mail::to(env('ADMIN_EMAIL'))
            ->send(new \App\Mail\Contact($contact));

        return redirect()->back()->with(['success' => 'votre message à ete bien envoyer']);
    }

    private function findSectionWithId(array $sections, int $id)
    {
        foreach ($sections as $section) {
            if ($section['id'] == $id) {
                return $section;
            }
        }
        return null;
    }
}
