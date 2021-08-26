<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // printJSON('aa');
        $url = 'https://www.instagram.com/p/CORD-zPntqn/?utm_medium=copy_link';
        $start = curl_init();
        curl_setopt($start, CURLOPT_URL, $url);
        curl_setopt($start, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($start, CURLOPT_SSLVERSION, 3);
            $file_data = curl_exec($start);
        curl_close($start);
            $file_path = 'upload/' .uniqid() . '.jpeg';
            $file = fopen($file_path, 'w+');
        fputs($file, $file_data);
        fclose($file);
        $image = '<img src="'.$file_path.'" class="img-thumbnail" width="250" />';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
