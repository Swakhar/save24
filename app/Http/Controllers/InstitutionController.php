<?php

namespace App\Http\Controllers;

use App\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inds = Miscellaneous::where('role','industry')->get();
        $ins = Miscellaneous::where('role','institution')->get();
        return view('admin.miscellaneous',compact('inds','ins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institutionadd');
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|unique:miscellaneous',
        ]);

        if ($validator->passes()) {
            $ins_id=strtolower($request->name);
            $miscellaneous = new Miscellaneous;
            $miscellaneous->fill($request->all());
            $miscellaneous['role'] = "institution";
            $miscellaneous['ins_id'] = $ins_id;
            
        $miscellaneous->save();
        Session::flash('message', 'New Institution Added Successfully.');
        return redirect('admin/miscellaneous');
        }
        return redirect()->back()->with('message', 'Institution Name Must Be Unique.');
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
        $miscellaneous = Miscellaneous::findOrFail($id);
        return view('admin.institutionedit',compact('miscellaneous'));
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|unique:miscellaneous',
        ]);

        if ($validator->passes()) {
            $ins_id=strtolower($request->name);
            $miscellaneous = Miscellaneous::findOrFail($id);      
            $miscellaneous->name=$request->name;
            $miscellaneous->ins_id=$ins_id;
            $miscellaneous->save();
            Session::flash('message', 'Institution Updated Successfully.');
            return redirect('admin/miscellaneous');
        }
        return redirect()->back()->with('message', 'Institution Name Must Be Unique.');
    }

    
    public function delete($id)
    {
        $miscellaneous = Miscellaneous::findOrFail($id);
        $miscellaneous->delete();

        Session::flash('message', 'Institution Deleted Successfully.');
        return redirect('admin/miscellaneous');
    }
}
