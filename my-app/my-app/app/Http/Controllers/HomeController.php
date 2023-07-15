<?php
 
namespace App\Http\Controllers;
use App\Models\Member;

 
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function index()
    {
        // $members = Member::all();
        // return view ('index')->with('members', $members);
        $search =$request['search'] ??"";
        if ($search != ""){
            $members = Member::where('name','LIKE',"%$search%")->get();
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
}