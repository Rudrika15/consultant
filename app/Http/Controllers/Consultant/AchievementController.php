<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;
class AchievementController extends Controller
{
    //achievement
    public function index(Request $request)
    {
        try{
            if ($request->ajax()) {
                $data = Achievement::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('achievement.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('achievement.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.achievement.index');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
    public function view(Request $request, $id)
    {
        try{
            $achievement = Achievement::findOrFail($id);
            return response()->json($achievement);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
    public function create()
    {
        try{
            $achievement = Achievement::all();
            return view('consultant.achievement.create', compact('achievement'));
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
            'photo' => 'required',

        ]);
        try{
            $userId=Auth::user()->id;
            $achievement = new Achievement();
            $achievement->userId=$userId;
            $achievement->title = $request->title;
            if ($request->photo) {
                $achievement->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('achievement'),  $achievement->photo);
            }
            $achievement->status = 'Active';
            $achievement->save();

            return response()->json([
                'success' => true,
                'message' => 'achievement Created Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        } 
    }
    public function edit(Request $request, $id)
    {
        try{
            $achievement = Achievement::find($id);
            return view('consultant.achievement.edit', compact('achievement'));
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
            $achievement = Achievement::find($id);
            $achievement->userId=$userId;
            $achievement->title = $request->title;
            if ($request->photo) {
                $achievement->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('achievement'),  $achievement->photo);
            }
            $achievement->status = 'Active';
            $achievement->save();

           return response()->json([
                'success' => true,
                'message' => 'achievement Updated Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    function delete($id)
    {
        try{
            $achievement = Achievement::find($id);
            $achievement->status = "Deleted";
            $achievement->save();

            return response()->json([
                'success' => true,
                'message' => 'achievement Deleted Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
