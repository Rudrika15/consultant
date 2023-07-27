<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Illuminate\Support\Facades\URL;
<<<<<<< HEAD
=======

>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
class VideoController extends Controller
{
    //
    public function index(Request $request)
    {

        // $video = Video::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['videos.*']);
<<<<<<< HEAD
        try{
            if ($request->ajax()) {
                $data = Video::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('video.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('video.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('video.index');    
        }
        catch(\Throwable $th){
=======
        try {
            if ($request->ajax()) {
                $data = Video::where('status', '!=', 'Deleted')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('video.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('video.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('video.index');
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
    //Fro show single data
    public function view(Request $request, $id)
    {
<<<<<<< HEAD
        try{
            $video = Video::findOrFail($id);
            return response()->json($video);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    } 
    public function create()
    {
        try{
            $video = Video::all();
            return view('video.create', compact('video'));
        }
        catch(\Throwable $th){
=======
        try {
            $video = Video::findOrFail($id);
            return response()->json($video);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $video = Video::all();
            return view('video.create', compact('video'));
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
        ]);
<<<<<<< HEAD
        try{
            $userId=Auth::user()->id;
            $video = new Video();
            $video->userId=$userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();
            return redirect('video-index')
                ->with('success', 'Video Create Successfully');
        }
        catch(\Throwable $th){
=======
        try {
            $userId = Auth::user()->id;
            $video = new Video();
            $video->userId = $userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();
            return response()->json([
                'url' => $video->url,
                'status' => $video->status,
                'status' => 'Data stored successfully!',
            ]);
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
<<<<<<< HEAD
        try{
            $video = Video::find($id);
            return view('video.edit', compact('video'));
        }
        catch(\Throwable $th){
=======
        try {
            $video = Video::find($id);
            return view('video.edit', compact('video'));
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
<<<<<<< HEAD
    
=======

>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    public function update(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
        ]);
<<<<<<< HEAD
        try{
            $userId=Auth::user()->id;
            $id = $request->id;
            $video = Video::find($id);
            $video->userId=$userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();
            return redirect('video-index')
                ->with('success', 'Video Updated Successfully');
        }
        catch(\Throwable $th){
=======
        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $video = Video::find($id);
            $video->userId = $userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();
            return redirect('video-index')->with('success', 'Video Updated Successfully');
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
<<<<<<< HEAD
        try{
=======
        try {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $video = Video::find($id);
            $video->status = "Deleted";
            $video->save();
            return redirect("video-index")
                ->with('success', 'Video Deleted successfully');
<<<<<<< HEAD
        }
        catch(\Throwable $th){
=======
        } catch (\Throwable $th) {
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
}
