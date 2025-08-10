<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Contact - Internet Store';
        $viewData['subtitle'] = 'Contact information';

        return view('contact.index')->with('viewData', $viewData);
    }
}
