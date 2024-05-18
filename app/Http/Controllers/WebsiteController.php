<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function homepage(){
        $rooms = Room::all();
        return view('website.webindex', compact('rooms'));
    }

    public function about(){
        return view('website.webaboutus');
    }

    public function contact(){
        return view('website.webcontactus');
    }

    public function webroom(){
        $rooms = Room::all();
        return view('website.webroom', compact('rooms'));
    }

    public function blog(){
        return view('website.webblog');
    }

    public function gallery(){
        return view('website.webgallery');
    }
}
