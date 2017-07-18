<?php

namespace App\Http\Controllers\Admin;

use App\Contactus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\StaticPage;

class PageController extends Controller
{
    public function getAboutUs(StaticPage $aboutUs)
    {
        $aboutData = $aboutUs->where('page_type','about')->first();

        return view('backend.manager.pages.about', compact('aboutData'));
    }

    public function postAboutUs(UpdateStaticPageRequest $request, StaticPage $aboutUs)
    {
        $aboutData = $aboutUs->where('page_type','about')->first();
        if ($aboutData)
        {
            $aboutData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('manager.pages.about.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['page_type' => 'about']);
            $aboutData = $aboutUs->create($request->except('_token', '_method'));

            if ($aboutData)
            {
                return redirect()->route('manager.pages.about.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getTerms(StaticPage $terms)
    {
        $termsData = $terms->where('page_type','terms')->first();

        return view('backend.manager.pages.terms', compact('termsData'));
    }

    public function postTerms(UpdateStaticPageRequest $request, StaticPage $terms)
    {
        $termsData = $terms->where('page_type','terms')->first();
        if ($termsData)
        {
            $termsData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('manager.pages.terms.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['page_type' => 'terms']);
            $termsData = $terms->create($request->except('_token', '_method'));

            if ($termsData)
            {
                return redirect()->route('manager.pages.terms.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getPrivacy(StaticPage $privacy)
    {
        $privacyData = $privacy->where('page_type','privacy')->first();

        return view('backend.manager.pages.privacy', compact('privacyData'));
    }

    public function postPrivacy(UpdateStaticPageRequest $request, StaticPage $privacy)
    {
        $privacyData = $privacy->where('page_type','privacy')->first();
        if ($privacyData)
        {
            $privacyData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('manager.pages.privacy.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['page_type' => 'privacy']);
            $privacyData = $privacy->create($request->except('_token', '_method'));

            if ($privacyData)
            {
                return redirect()->route('manager.pages.privacy.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getDelivery(StaticPage $delivery)
    {
        $deliveryData = $delivery->where('page_type','delivery')->first();

        return view('backend.manager.pages.delivery', compact('deliveryData'));
    }

    public function postDelivery(UpdateStaticPageRequest $request, StaticPage $delivery)
    {
        $deliveryData = $delivery->where('page_type','delivery')->first();
        if ($deliveryData)
        {
            $deliveryData->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'body_en' => $request->body_en,
                'body_ar' => $request->body_ar
            ]);

            return redirect()->route('manager.pages.delivery.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['page_type' => 'delivery']);
            $deliveryData = $delivery->create($request->except('_token', '_method'));

            if ($deliveryData)
            {
                return redirect()->route('manager.pages.delivery.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }

    public function getContact(Contactus $contact)
    {
        $contactData = $contact->where('id',1)->first();

        return view('backend.manager.pages.contact', compact('contactData'));
    }

    /**
     * add Contact Information
     * @param UpdateContactUsRequest $request
     * @param Contactus $contact
     * @return Response
     */
    public function postContactInfo(UpdateContactUsRequest $request, Contactus $contact)
    {
        $contactData = $contact->find('1');
        if ($contactData)
        {
            $contactData->update([
                'address_en' => $request->address_en,
                'address_ar' => $request->address_ar,
                'email' => $request->email,
                'phone' => $request->phone,
//                'youtube' => $request->youtube,
//                'instagram' => $request->instagram,
//                'twitter' => $request->twitter
            ]);

            return redirect()->route('manager.pages.contact.index')->with('success', 'successfully updated!!');

        }
        else
        {
            //add record id for static page
            $request->request->add(['id' => 1]);

            $contactData = $contact->create($request->except('_token', '_method'));

            if ($contactData)
            {
                return redirect()->route('manager.pages.contact.index')->with('success', 'successfully created');
            }

            return redirect()->back()->with('error', 'System Error!!');
        }
    }
}
