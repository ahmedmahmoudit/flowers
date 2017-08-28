<?php

namespace App\Http\Controllers;


use App\Area;
use App\Category;
use App\Contactus;
use App\Core\Cart\Cart;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\SendContactEmail;
use App\Mail\Contact;
use App\Product;
use App\ProductDetail;
use App\Store;
use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function getTerms()
    {
        $content = '';
        return view('terms', compact('content'));
    }

    public function getAbout()
    {
        $content = '';
        return view('about', compact($content));
    }

    public function getContact()
    {
        return view('contact');
    }

    /**
     * Post Contact Form
     * @param Request $request
     */
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
//            $this->dispatch($job);

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('info', 'Sorry Couldnt Send you Mail this time. Please try again later');

        }

        return redirect('home')->with('success', __('Success'));
    }


}
