<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\User;
use App\Repository\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function home(PostRepository $postRepository): Factory|View|Application
    {
        $latestPosts = $postRepository->getLastTreePosts();
        $testimonials = config('users.testimonials');
        $howItWorks = config('users.howItWorks');

        $destinations = Gallery::where('content', 'destinations')->get();

        return view('app.pages.welcome', [
            'posts' => $latestPosts,
            'testimonials' => $testimonials,
            'destinations' => $destinations,
            'howItWorks' => $howItWorks
        ]);
    }

    public function howItWorks(int $id): Factory|View|Application
    {
        $section = $this->findSectionWithId(config('users.howItWorks'), $id);

        return view('app.pages.howItWorks', [
            'section' => $section
        ]);
    }

    public function faq(): Factory|View|Application
    {
        $faqs = config('users.faqs');

        return view('app.pages.faq', [
            'faqs' => $faqs
        ]);
    }

    public function impressum(): Factory|View|Application
    {
        return view('app.pages.impressum');
    }

    public function about(): Factory|View|Application
    {
        return view('app.pages.about');
    }

    public function contact(): Factory|View|Application
    {
        return view('app.pages.contact');
    }

    public function privacy(): Factory|View|Application
    {
        return view('app.pages.privacy');
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
