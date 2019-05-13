<?php

namespace App\Http\Controllers;

use App\HomeAd;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        Log::debug('In HomeController::index');
        return view('home');
    }


    /**
     * Show the ads of the logged-in user.
     *
     * @return Factory|View
     */
    public function userAds() {
        Log::debug('In HomeController::userAds');
        return view('home-user-ads', ['homes' => HomeAd::where('user_id', '=', Auth::id())->paginate(10)]);
    }
}
