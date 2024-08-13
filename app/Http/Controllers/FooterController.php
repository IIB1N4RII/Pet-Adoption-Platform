<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function faqs()
    {
        return view('footer.faqs');
    }
    public function contact()
    {
        return view('footer.contact');
    }
    public function dogs()
    {
        return view('footer.dog');
    }
    public function dog_helth()
    {
    return view('footer.dog_helth');
    }
    public function cats()
    {
        return view('footer.cat');
    }
    public function cat_helth()
    {
    return view('footer.cat_helth');
    }
    public function privacy()
    {
        return view('footer.privacy');
    }
    public function terms()
    {
    return view('footer.terms');
    }

    
}
