<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Http\Requests\AttributeRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
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
        $attributes = Attribute::all();
        return view('admin.attributes',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributeadd');
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
          $attribute = new Attribute;
          $attribute->fill($request->all());
          $attribute['name'] = $request->name;
          $attribute->save();
          Session::flash('message', 'New Attribute Added Successfully.');
          return redirect('admin/attributes');
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
        $attribute = Attribute::findOrFail($id);
        return view('admin.attributeedit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute['name'] = $request->name;
        $attribute['code'] = strtolower(strtolower(str_replace(' ', '_', $request->name)));
        $attribute->save();
        Session::flash('message', 'Attribute Updated Successfully.');
        return redirect('admin/attributes');
    }


    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        Session::flash('message', 'Attribute Deleted Successfully.');
        return redirect('admin/attributes');
    }
}
