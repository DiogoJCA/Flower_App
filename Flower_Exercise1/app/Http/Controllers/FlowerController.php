<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all flowers
        $flowers = DB::select('SELECT * FROM flowers');

        // debug : replacing var_dump
        //dd($flowers);

        return view('flowers', ['flo' => $flowers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // display the form to create flower
        return view('create-flower');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // function to save in DB the new flower

        // Insert manual value :
        //DB::insert('INSERT INTO flowers(name, price) VALUES(?, ?)', ['tulip', 36]);

        // $request contains every data from the form
        $result = DB::insert('INSERT INTO flowers(name, price) VALUES(?, ?)', [$request->name, $request->price]);

        // Function to return to previous page
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display only one flower
        // Controller have to pass $id to the view
        return view('flower-details', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // first : retrieve flower info and show the form to update flower
        $flowers = DB::select('SELECT * FROM flowers WHERE id=' . $id);

        // Function to return to previous page
        return view('update-flower',  ['flo' => $flowers]);
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
        // second : save in db

        DB::update('UPDATE flowers SET name = ? , price = ? WHERE id = ?', [$request->name,$request->price, $id]);

        // Function to return to previous page
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // remove a specific flower
        DB::delete('DELETE FROM flowers WHERE id = ?', [$id]);

        // Function to return to previous page
        return back()->withInput();
    }
}
