<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Image;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = 1;
        $all_module = \App\Module::get();
        return view('module',compact('type','all_module'));
       
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
        $module = new \App\Module;
        $module->module_title = $request->title;
        $module->module_description = $request->desc;
        if($request->hasFile('image'))
        { 
            try 
            {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/bridge/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $url = config('services.base_url')."/images/bridge/".$name;
            $module->module_image = $url; 
            }
            catch (Exception $e)
            {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
            } 
        }
        if($module->save()){
          return redirect()->route('module.index')->with(['alert'=>'success','message'=>'Added successfully!.']);
        } else {
          return redirect()->route('module.index')->with(['alert'=>'danger','message'=>'Something went wrong!.']);  
        }
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
        $module = \App\Module::find($id);
        $all_module = \App\Module::get();
        $type = 2;
        return view('module',compact('module','all_module','type'));
    }

    public function del_module($id){
        $delete = \App\Module::find($id);
        if (!is_null($delete)) {
            $delete->delete();
            return redirect()->back()->with(['alert' => 'success', 'message' => 'Record Has been deleted']);
        }
        else {
            return redirect()->back()->with(['alert' => 'danger', 'message' => 'Something went wrong']);
        }
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
        $module = \App\Module::find($id);
        $module->module_title = $request->title;
        $module->module_description = $request->desc;
        if($request->hasFile('image'))
        { 
            try 
            {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/bridge/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $url = config('services.base_url')."/images/bridge/".$name;
            $module->module_image = $url; 
            }
            catch (Exception $e)
            {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
            } 
        }
        if($module->save()){
            return redirect()->route('module.index')->with(['alert'=>'success','message'=> 'Record updated successfully']);
        } else {
            return redirect()->route('module.index')->with(['alert'=>'danger','message'=>'Oops! Something went wrong']);  
        }

    }

    public function view_related_sessions($id){
        $related_sessions = \App\Session::where('module_id',$id)->get();
        return view('module_related_sessions',compact('related_sessions'));
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
