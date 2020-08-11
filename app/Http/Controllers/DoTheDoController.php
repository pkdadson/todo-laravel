<?php

namespace App\Http\Controllers;

use App\DoTheDo;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DoTheDoController extends Controller
{

    protected $user;


    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoTheDo::where('user_id', auth()->user()->id)->get();
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
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $todo = DoTheDo::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'completed' => $request->completed,
        ]);

        return response($todo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoTheDo  $doTheDo
     * @return \Illuminate\Http\Response
     */
    public function show(DoTheDo $doTheDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoTheDo  $doTheDo
     * @return \Illuminate\Http\Response
     */
    public function edit(DoTheDo $doTheDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoTheDo  $doTheDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoTheDo $doTheDo)
    {
        if ($doTheDo->user_id !== auth()->user()->id) {
            return response()->json('Unauthorized', 401);
        }

        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $doTheDo->update($data);

        return response($doTheDo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoTheDo  $doTheDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoTheDo $doTheDo)
    {
        if ($doTheDo->user_id !== auth()->user()->id) {
            return response()->json('Unauthorized', 401);
        }

        $doTheDo->delete();

        return response('Item deleted', 200);
    }
}
