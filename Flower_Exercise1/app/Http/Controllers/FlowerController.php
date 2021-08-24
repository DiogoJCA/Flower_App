<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flower;
Use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

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
        // $flowers = DB::select('SELECT * FROM flowers');
        $flowers = Flower::all();

        // debug : replacing var_dump
        //dd($flowers);

        return view('flowers', ['flo' => $flowers]);
    }
    public function contact()
    {
        return view('contact');
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

        // Form validation
        $validations = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:2|max:100',
        ]);

        // Message
        if ($validations->fails()) 
            return response()->json(['errors' => $validations->errors()->all()]);
            
        // Upload file
        
        // Set the file name
        $fileName = $request->file->getClientOriginalName();
            
        // Path where the file is saved
        $public_path = public_path('uploads');
    
        // Move the file
        $request->file->move($public_path, $fileName);
            
        // Try to insert in the DB
        // Instanciate a new model
        $flower = new Flower;
    
        // Set the attributes
        $flower->name = $request->name;
        $flower->price = $request->price;
        $flower->type = $request->type;
        $flower->poster = $fileName;
            
        // Save on the model instance
        $flower->save();
    
        return response()->json(['success' => 'Flower is added']);
        

        // Function to return to previous page
        // return redirect('flowers')->with('success', $request->name . ' was created successfully');
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
        // first : retrieve flower info and show the form to update flower
        // $flowers = DB::select('SELECT * FROM flowers WHERE id=' . $id);

        // Using model method
        $flower = Flower::find($id);

        // Controller have to pass $id to the view
        return view('flower-details', ['flower'=> $flower]);
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
        // $flowers = DB::select('SELECT * FROM flowers WHERE id=' . $id);

        // Using Model method
        $flowers = Flower::find($id);
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
        // DB::update('UPDATE flowers SET name = ? , price = ? WHERE id = ?', [$request->name,$request->price, $id]);

        // Look for this specfic ID
        $flowers = Flower::find($id);

        // Set the Attributes
        $flowers->name = $request->name;
        $flowers->price = $request->price;
        $flowers->type = $request->type;

        // Save on the model instance
        $flowers->save();
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
        // DB::delete('DELETE FROM flowers WHERE id = ?', [$id]);

        // Destroy the flower where the id is the arguement of our GET method in our ROUTE
        Flower::destroy($id);

        // Second way of deleting to delete it only later
        // $flowers = Flower::find($id);

        // $flowers->delete();

        // Function to return to previous page
        return back()->withInput();
    }
    public function addcomment(Request $request, $flower_id)
    {   
        $comment = new Comment;

        // $comment = Comment::find($flower_id);
        $comment->flower_id = $flower_id;
        $comment->subject = $request->subject;
        $comment->message = $request->message;

        // Save on the model instance
        $comment->save();
        // Function to return to previous page
        return back()->withInput();
    }
}
