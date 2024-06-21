<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\GalleryItem;
use App\Models\NewsLetterContact;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function homepage()
    {
        $galleryItems = GalleryItem::inrandomOrder()->take(2)->get();
        $rooms = Room::all();
        return view('website.webindex', compact('rooms', 'galleryItems'));
    }

    public function about()
    {
        return view('website.webaboutus');
    }

    public function contact()
    {
        return view('website.webcontactus');
    }

    public function webroom()
    {
        $rooms = Room::all();
        return view('website.webroom', compact('rooms'));
    }

    public function blog()
    {
        return view('website.webblog');
    }

    public function gallery()
    {
        $galleryItems = GalleryItem::all();
        return view('website.webgallery', compact('galleryItems'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        NewsLetterContact::create([
            'email' => $request->email
        ]);
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $contactData = $request->only(['name', 'email', 'phone', 'message']);
        Mail::to('info@interconnect.info')->send(new ContactUsMail($contactData));

        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }
}
