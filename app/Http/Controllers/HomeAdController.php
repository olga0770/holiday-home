<?php

namespace App\Http\Controllers;

use App\HomeAd;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $homeAd->user_id = Auth::id();
        $homeAd->save();

        return $this->index();
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
        return view('home-ad-edit')->with('id', $homeAd->id)->with('city', $homeAd->city)
                                        ->with('country', $homeAd->country);
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
        $homeAd->save();

        return $this->index();
    }


    public function delete(Request $request)
    {
        Log::debug('In HomeAdController::delete');
        return view('home-ad-delete')->with('id', $request->get('id'))->with('city', $request->get('city'))
            ->with('country', $request->get('country'));
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

        return $this->index();
    }
}
