<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Illuminate\Support\Facades\URL;
class AttachmentController extends Controller
{
    //

    public function index(Request $request)
    {

        // $attachment = Attachment::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['attachments.*']);

        try{
            if ($request->ajax()) {
                $data = Attachment::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('attachment.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('attachment.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('consultant.attachment.index');
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
            $attachment = Attachment::findOrFail($id);
            return response()->json($attachment);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    } 
    public function create()
    {
        try{
            $attachment = Attachment::all();
            return view('consultant.attachment.create', compact('attachment'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required',

        ]);
        try{
            $userId=Auth::user()->id;
            $attachment = new Attachment();
            $attachment->userId=$userId;
            $attachment->title = $request->title;
            if ($request->file) {
                $attachment->file = time() . '.' . $request->file->extension();
                $request->file->move(public_path('attachment'),  $attachment->file);
            }
            $attachment->status = 'Active';
            $attachment->save();

            return response()->json([
                'success' => true,
                'message' => 'Attachment Created Successfully!',
            ],200);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }

    public function edit(Request $request, $id)
    {
        try{
            $attachment = Attachment::find($id);
            return view('consultant.attachment.edit', compact('attachment'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        try{
            $userId=Auth::user()->id;
            $id = $request->id;
            $attachment = Attachment::find($id);
            $attachment->userId=$userId;
            $attachment->title = $request->title;
            if ($request->file) {
                $attachment->file = time() . '.' . $request->file->extension();
                $request->file->move(public_path('attachment'),  $attachment->file);
            }
            $attachment->status = 'Active';
            $attachment->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Attachment Updated Successfully!',
            ],200);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }

    function delete($id)
    {
        try{
            $attachment = Attachment::find($id);
            $attachment->status = "Deleted";
            $attachment->save();
            return response()->json([
                'success' => true,
                'message' => 'Attachment Deleted Successfully!',
            ],200);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
}
