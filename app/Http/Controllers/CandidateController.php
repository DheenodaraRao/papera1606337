<?php

namespace App\Http\Controllers;
use App\Http\Resources\CandidateResource;
use App\Http\Resources\CandidateCollection;

use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return new BookCollection(Book::all());
        $candidate = Candidate::with('party')->get();
        
        return new CandidateCollection($candidate);
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

            $candidate = Candidate::create($request->all());
            return response()->json([
                'id' => $candidate->id,
                'created_at' => $candidate->created_at,
            ], 201);
        
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
        $candidate = Candidate::with('party')->find($id);
        if(!$candidate){
            return response()->json([
                'error'=> 404,
                'message'=> 'Not found'
            ], 404);
        }
        
        return new CandidateResource($candidate);
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
        $candidate = Candidate::find($id);
        if(!$candidate) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        }
        $candidate->update($request->all());
        return response()->json(null, 204);
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
        $candidate = Candidate::find($id);
        if(!$candidate) {
            return response()->json([
                'error' => 404,
                'message' => 'Not found'
            ], 404);
        }
        $book->delete();
        return response()->json(null, 204);
    }
}
