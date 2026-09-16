<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function leadership()
    {
        return view('pages.leadership');
    }

    public function bishop()
    {
        return view('pages.bishop');
    }

    public function ministries()
    {
        return view('pages.ministries');
    }

    public function ministryDetail()
    {
        return view('pages.ministry-detail');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function serviceDetail()
    {
        return view('pages.service-detail');
    }

    public function donation()
    {
        return view('pages.donation');
    }

    public function projects()
    {
        return view('pages.projects');
    }

    public function bible()
    {
        return view('pages.bible');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
