<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Category::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('category.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('category.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('category.index');
        } catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
    }
    //For single category
    public function view(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json($category);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $category = Category::all();
            return view('category.create', compact('category'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'catName' => 'required',
            'photo'=>'required'
        ]);
        try {
            $category = new Category();
            $category->catName = $request->catName;
            if ($request->photo) {
                $category->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('category'),  $category->photo);
            }
            $category->status = 'Active';

            $category->save();
            $response = [
                'success' => true,
                'message' => 'Category Created Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            return view('category.edit', compact('category'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'catName' => 'required',
        ]);
        try {
            $id = $request->id;
            $category = Category::find($id);
            $category->catName = $request->catName;
            if ($request->photo) {
                $category->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('category'),  $category->photo);
            }
            $category->status = 'Active';

            $category->save();
            $response = [
                'success' => true,
                'message' => 'Category Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->status = "Deleted";
            $category->save();
            $response = [
                'success' => true,
                'message' => 'Category Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
