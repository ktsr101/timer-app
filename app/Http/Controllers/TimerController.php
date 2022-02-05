<?php

namespace App\Http\Controllers;


use App\Models\timer;
use App\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TimerController extends Controller
{
    
    public function date_timeShow()
    {
        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        // get active theme id
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main"){
                $activeThemeId = $theme['id'];
            }
        }

        $snippet = "Your snippet code updated again";

        // Data to pass to our rest api request
        $array = array('asset' => array('key' => 'snippets/timer-app.liquid', 'value' => $snippet));

        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        // save data into database

        timer::updateOrCreate(
            ['shop_domain' => $shop->name ],
            ['onBoarded' => true]
        );

        return ['message' => 'Theme setup succesfully'];
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function show(timer $timer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function edit(timer $timer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, timer $timer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function destroy(timer $timer)
    {
        //
    }
}
