<?php

namespace App\Http\Controllers;


use App\Mail\Contact;
use App\Newsletter;
use App\StaticPage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @var StaticPage
     */
    private $staticPage;

    /**
     * PagesController constructor.
     * @param StaticPage $staticPage
     */
    public function __construct(StaticPage $staticPage)
    {
        $this->staticPage = $staticPage;
    }

    public function getPage($type)
    {
        $page = $this->staticPage->where('page_type',$type)->first();
        if(!$page) {
            return redirect()->back();
        }
        return view('page', compact('page'));
    }


    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'body'  => 'required'
        ]);

        $params = $request->all();
        $adminEmail = config('mail.from.address');

        try {
            \Mail::to($adminEmail)->send(new Contact($params));
        } catch (\Exception $e) {
            return redirect()->back()->with('info', __('Error occurred'));
        }

        return redirect('home')->with('success', __('Success'));
    }


    public function postNewsletterSubscription(Request $request,Newsletter $newsletter)
    {
        $this->validate($request,[
           'email' => 'required|email|unique:newsletters,email'
        ]);

        $newsletter->create(['email'=>$request->email]);

        return redirect()->back()->with('success',__('Success'));
    }
}
