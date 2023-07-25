<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;

class GalleryController extends Controller
{
    //
    public function index(Request $request)
    {

        // $gallery = Gallery::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['galleries.*']);
        try {
            if ($request->ajax()) {
                $data = Gallery::where('status', '!=', 'Deleted')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('gallery.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('gallery.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('gallery.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    //For show single data
    public function view(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return response()->json($gallery);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $gallery = Gallery::all();
            return view('gallery.create', compact('gallery'));
        } catch (\Throwable $th) {
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
        try {
            $userId = Auth::user()->id;
            $gallery = new Gallery();
            $gallery->userId = $userId;
            $gallery->title = $request->title;
            if ($request->photo) {
                $gallery->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('gallery'),  $gallery->photo);
            }
            $gallery->status = 'Active';
            $gallery->save();
            return redirect('gallery-index')
                ->with('success', 'Gallery Create Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $gallery = Gallery::find($id);
            return view('gallery.edit', compact('gallery'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        try {
            $userId = Auth::user()->id;
            $id = $request->id;
            $gallery = Gallery::find($id);
            $gallery->userId = $userId;
            $gallery->title = $request->title;
            if ($request->photo) {
                $gallery->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('gallery'),  $gallery->photo);
            }
            $gallery->status = 'Active';
            $gallery->save();
            return redirect('gallery-index')
                ->with('success', 'SocialMaster Updated Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $gallery = Gallery::find($id);
            $gallery->status = "Deleted";
            $gallery->save();
            return redirect("gallery-index")
                ->with('success', 'Gallery Deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
