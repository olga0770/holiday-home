<?php

namespace App\Http\Controllers;

use App\HomeAd;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;

class HomeAdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return ResponseAlias
     */
    public function index()
    {
        Log::debug('In HomeAdController::index');
        return view('home-ad-list', ['homes' => DB::table('home_ads')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return ResponseAlias
     */
    public function create()
    {
        Log::debug('In HomeAdController::create');
        return view('home-ad-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ResponseAlias
     */
    public function store(Request $request)
    {
        Log::debug('In HomeAdController::store');
        $homeAd = new HomeAd;

        $homeAd->city = $request->input('city');
        $homeAd->country = $request->input('country');
        $homeAd->postal_code = $request->input('postal_code');
        $homeAd->user_id = Auth::id();

        $messagebag = $this->handleImage($request, $homeAd);

        if ($messagebag->isNotEmpty()) {
            return view('home-ad-create')->withErrors($messagebag)
                        ->with('city', $homeAd->city)->with('country', $homeAd->country)->with('postal_code', $homeAd->postal_code);
        }

        $homeAd->save();

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeAd  $homeAd
     * @return ResponseAlias
     */
    public function show(HomeAd $homeAd)
    {
        Log::debug('In HomeAdController::show');
        //return HomeAd::findOrFail($id);
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeAd  $homeAd
     * @return ResponseAlias
     */
    public function edit(HomeAd $homeAd)
    {
        Log::debug('In HomeAdController::edit');
        if (env('APP_ENV') == 'local') {
            $image_url_prefix = URL::to('/storage/images/');
            $base_64_img = '';
        }
        else {
            $contents = Storage::disk('s3')->get('images/'.$homeAd->image_name);
            $base_64_img = base64_encode($contents);
            $image_url_prefix = '';
        }

        return view('home-ad-edit')->with('id', $homeAd->id)->with('city', $homeAd->city)
                                        ->with('country', $homeAd->country)
                                        ->with('postal_code', $homeAd->postal_code)
                                        ->with('image_url_prefix', $image_url_prefix)
                                        ->with('base_64_img', $base_64_img)
                                        ->with('image_name', $homeAd->image_name);

        // URL::to('/storage/images/')/image_name
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeAd  $homeAd
     * @return ResponseAlias
     */
    public function update(Request $request, HomeAd $homeAd)
    {
        Log::debug('In HomeAdController::update');

        $homeAd->city = $request->input('city');
        $homeAd->country = $request->input('country');

        $messagebag = $this->handleImage($request, $homeAd);

        if ($messagebag->isNotEmpty()) {
            return view('home-ad-edit')->withErrors($messagebag)
                ->with('id', $homeAd->id)->with('city', $homeAd->city)
                ->with('country', $homeAd->country)->with('postal_code', $homeAd->postal_code);
        }

        $homeAd->save();

        return view('home');
    }


    public function delete(Request $request)
    {
        Log::debug('In HomeAdController::delete');
        return view('home-ad-delete')->with('id', $request->get('id'))->with('city', $request->get('city'))
                ->with('country', $request->get('country'))->with('postal_code', $request->get('postal_code'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\HomeAd $homeAd
     * @return ResponseAlias
     * @throws \Exception
     */
    public function destroy(HomeAd $homeAd)
    {
        Log::debug('In HomeAdController::destroy');
        $homeAd->delete();

        return view('home');
    }

    /**
     * @param Request $request
     * @param HomeAd $homeAd
     * @return MessageBag
     */
    public function handleImage(Request $request, HomeAd $homeAd): MessageBag
    {
        $messagebag = new MessageBag();

        if ($request->hasFile('home_picture') &&
            $request->file('home_picture')->isValid()) {

            if ($request->file('home_picture')->getSize() > 500000) {
                $messagebag->add('image-size', 'Image is too big!');
            } else {
                if (env('APP_ENV')=='local') {
                    $path = $request->home_picture->store('public/images');
                    $image_name = basename($path);
                }
                else {
                    $image_name = uniqid($homeAd->id . '_');
                    $request->home_picture->storeAs('images', $image_name, 's3');
                }
                $homeAd->image_name = $image_name;
            }
        }
        return $messagebag;
    }
}
