<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Illuminate\Support\Facades\URL;
class VideoController extends Controller
{
    //
    public function index(Request $request)
    {

        // $video = Video::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['videos.*']);
        try{
            if ($request->ajax()) {
                $data = Video::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('video.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('video.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('consultant.video.index');    
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }
    //Fro show single data
    public function view(Request $request, $id)
    {
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
            return view('consultant.video.create', compact('video'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
        ]);
        try{
            $userId=Auth::user()->id;
            $video = new Video();
            $video->userId=$userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();

            return response()->json([
                'success' => true,
                'message' => 'Video Created Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try{
            $video = Video::find($id);
            return view('consultant.video.edit', compact('video'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
        ]);
        try{
            $userId=Auth::user()->id;
            $id = $request->id;
            $video = Video::find($id);
            $video->userId=$userId;
            $video->url = $request->url;
            $video->status = 'Active';
            $video->save();

            return response()->json([
                'success' => true,
                'message' => 'Video Updated Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try{
            $video = Video::find($id);
            $video->status = "Deleted";
            $video->save();

            return response()->json([
                'success' => true,
                'message' => 'Video Updated Successfully!',
            ],200);
            
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
