<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::where("status", 1)->get();
        $blogs = Blog::where("status", 1)->get();
        return view("web.home", compact('sliders', 'blogs'));
    }
    public function contact()
    {
        return view('web.contact');
    }

    public function page($urlkey)
    {
        //    echo $urlkey;
        $page = Page::where('url_key', $urlkey)->where('status', 1)->first();
        return view('web.page', compact('page'));

    }


}
