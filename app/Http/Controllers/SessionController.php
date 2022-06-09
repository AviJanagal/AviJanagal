<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Image;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = 1;
        $level = \App\Level::get();
        $module = \App\Module::get();
        $all_session = \App\Session::get();
        $last_entry = \App\Session::orderBy('id', 'DESC')->first();
        $language = \App\Language::get();
        return view('session',compact('type','level','module','all_session','language','last_entry'));
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
        // return $request;
        $session = new \App\Session;
        $session->module_id = $request->module_id;
        $session->session_title = $request->title;
        $session->session_desc = $request->desc;
        $session->session_subject = $request->subject;
        $session->language = $request->language;
        $session->level = $request->level;
        $session->duration = $request->duration;
        if(!is_null($request->optradio) && is_null($request->link) && !is_null($request->video)){
            if($request->hasFile('video'))
            { 
                try 
                {
                $file = $request->file('video');
                $name = time().'.'.$file->getClientOriginalExtension();
                $filePath = 'video/bridge/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $url = config('services.base_url')."/video/bridge/".$name;
                $session->media = $url; 
                }
                catch (Exception $e)
                {
                return response()->json(['status' => false,'message' => $e->getMessage()]);
                } 
            }
            $session->media_type = "video";
        }
        else{
            $session->media = $request->link;
            $session->media_type = "link";
        }
        $session->status = $request->status;
        $session->position = $request->order;
        if($request->hasFile('image'))
        { 
            try 
            {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/bridge/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $url = config('services.base_url')."/images/bridge/".$name;
            $session->session_image = $url; 
            }
            catch (Exception $e)
            {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
            } 
        }
        $session->published_by = $request->publish;
        $session->save();
        // $md = $session->media;
        // return $md;
        if($session->save()){
          return redirect()->route('session.index')->with(['alert'=>'success','message'=>'Added successfully!.']);
        } else {
          return redirect()->route('session.index')->with(['alert'=>'danger','message'=>'Something went wrong!.']);  
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
        $session = \App\Session::find($id);
        $level = \App\Level::get();
        $module = \App\Module::get();
        $all_session = \App\Session::get();
        $language = \App\Language::get();
        $type = 2;
        return view('session',compact('session','all_session','type','level','module','language'));
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
        // return $request->all();
        $session = \App\Session::find($id);
        $session->module_id = $request->module_id;
        $session->session_title = $request->title;
        $session->session_desc = $request->desc;
        $session->session_subject = $request->subject;
        $session->language = $request->language;
        $session->level = $request->level;
        $session->duration = $request->duration;
        if(!is_null($request->optradio) && is_null($request->link)){
            
            if($request->hasFile('video'))
            { 
                try 
                {
                $file = $request->file('video');
                $name = time().'.'.$file->getClientOriginalExtension();
                $filePath = 'video/bridge/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $url = config('services.base_url')."/video/bridge/".$name;
                $session->media = $url; 
                }
                catch (Exception $e)
                {
                return response()->json(['status' => false,'message' => $e->getMessage()]);
                } 
            }
        $session->media_type = "video";
        }
        else{
            $session->media = $request->link;
            $session->media_type = "link";
        }
        $session->status = $request->status;
        $session->position = $request->order;
        if($request->hasFile('image'))
        { 
            try 
            {
            $file = $request->file('image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $filePath = 'images/bridge/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $url = config('services.base_url')."/images/bridge/".$name;
            $session->session_image = $url; 
            }
            catch (Exception $e)
            {
            return response()->json(['status' => false,'message' => $e->getMessage()]);
            } 
        }
        $session->published_by = $request->publish;
        if($session->save()){
          return redirect()->route('session.index')->with(['alert'=>'success','message'=>'Updated successfully!.']);
        } else {
          return redirect()->route('session.index')->with(['alert'=>'danger','message'=>'Something went wrong!.']);  
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = \App\Session::find($id);
        if (!is_null($delete)) {
            $delete->delete();
            return redirect()->back()->with(['alert' => 'success', 'message' => 'Record Has been deleted']);
        }
        else {
            return redirect()->back()->with(['alert' => 'danger', 'message' => 'Something went wrong']);
        }
    }
}
