<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $search =$request['search'] ??"";
        if ($search != ""){
            $members = Member::where('name','LIKE',"%$search%")->orWhere('category','LIKE',"%$search%")->get();
        }else{
            $members = Member::all();
        } 
        return view ('index')->with('members', $members,'search', $search);
    }

     public function filter(Request $request){

        
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $members = Member::whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();

        return view ('index')->with('members',$members);
    } 
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/'.$path;
        Member::create($requestData);
        return redirect('member')->with('flash_message', 'Article Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
