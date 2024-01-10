<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Slider::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('slider.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('slider.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';

                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.slider.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function view($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            return response()->json($slider);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            return view('admin.slider.create');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'type' => 'required',
                'photo' => 'required',
            ]);
            $slider = new Slider();
            $slider->type = $request->type;
            if ($request->photo) {
                $slider->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('slider'),  $slider->photo);
            }
            $slider->save();

            return response()->json([
                'success' => true,
                'message' => 'Slider Created Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request)
    {
        try {
            $validateData = $request->validate([
                'type' => 'required',
            ]);
            $id = $request->sliderId;
            $slider = Slider::find($id);
            $slider->type = $request->type;
            if ($request->photo) {
                $slider->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('slider'),  $slider->photo);
            }
            $slider->save();

            return response()->json([
                'success' => true,
                'message' => 'Slider Update Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function delete($id)
    {
        try {
            $slider = Slider::find($id);
            $slider->status = "Deleted";
            $slider->save();
            return response()->json([
                'success' => true,
                'message' => 'Slider Deleted Successfully!',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
