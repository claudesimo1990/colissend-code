<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Request;

class GaleriesController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(9);

        return view('admin.gallery.index', [
            'galleries' => $galleries,
            'tags' => config('users.tags')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(['title' => 'required|unique:galleries']);

        Gallery::create(['title' => $request->get('title'), 'content' => $request->get('tag')]);

        return redirect()->back()->with(['success' => 'Création reussite!']);
    }

    public function show(Gallery $gallery)
    {
        $photos = $gallery->getMedia('galleries');

        return view('admin.gallery.show', [
            'gallery' => $gallery,
            'photos' => $photos
        ]);
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function albums(Gallery $gallery, Request $request): RedirectResponse
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $gallery->addMediaFromRequest('image')->toMediaCollection('galleries');
        }

        return redirect()->back()->with(['success' => 'sauvegarde reussite!']);
    }

    public function background(Gallery $gallery, Media $media, string $tag = 'header')
    {
        $gallery->update(['active_img' => $media->getFullUrl($tag)]);
        return redirect()->back()->with(['success' => 'Opreation reussite']);
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with(['success' => 'sauvegarde reussite!']);
    }
}
