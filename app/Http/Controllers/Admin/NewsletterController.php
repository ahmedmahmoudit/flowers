<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\CreateStoreCampaignRequest;
use App\Mail\Campaign;
use App\Mail\StoreCampaign;
use App\Newsletter;
use App\Store;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{

    protected $newsLetter;

    public function __construct(Newsletter $newsLetter)
    {
        $this->newsLetter = $newsLetter;
    }

    public function index()
    {
        $subscribers = Newsletter::all();

        return view('backend.manager.newsletter.index', compact('subscribers'));
    }

    public function campaignView()
    {
        return view('backend.manager.newsletter.create_campaign');
    }

    public function sendCampaign(CreateCampaignRequest $request)
    {
        $subscribers = Newsletter::where('active', '1')->get();

        foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)->queue(new Campaign($subscriber, $request->title, $request->body));

        }

        return redirect()->route('manager.newsletter.index')->with('success', 'campaign sent successfully');
    }

    public function storesCampaignView()
    {
        $stores = Store::all();
        return view('backend.manager.newsletter.create_campaign_stores', compact('stores'));
    }

    public function sendStoresCampaign(CreateStoreCampaignRequest $request, Store $stores)
    {
        $subscribers = $request->only(['stores']);

        foreach ($subscribers['stores'] as $subscriber) {
            $store = Store::find($subscriber);

            if($store->email)
            {
                Mail::to( $store->email )->queue( new StoreCampaign( $store, $request->title, $request->body ) );
            }

            if($store->second_email)
            {
                Mail::to($store->second_email)->queue(new StoreCampaign($store, $request->title, $request->body));
            }

        }

        return redirect()->route('manager.newsletter.mailStores')->with('success', 'campaign sent successfully');
    }

    /**
     * Delete a subscriber
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $subscriber = Newsletter::find($id);

        $subscriber->delete();

        Session()->flash('success', 'Subscriber Deleted Successfully!');
        return route('manager.newsletter.index');
    }

    /**
     * Disable a subscriber
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $subscriber = Newsletter::find($id);

        $subscriber->update([
            'active' => '0'
        ]);

        Session()->flash('success', 'Subscriber Disabled Successfully!');
        return route('manager.newsletter.index');
    }

    /**
     * Activate a subscriber
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $subscriber = Newsletter::find($id);

        $subscriber->update([
            'active' => '1'
        ]);

        Session()->flash('success', 'Subscriber Activated Successfully!');
        return route('manager.newsletter.index');
    }
}
