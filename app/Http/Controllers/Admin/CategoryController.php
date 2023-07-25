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
                        $btn = $btn . '<a href="' . URL::route('category.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
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
        $category = Category::findOrFail($id);
        return response()->json($category);
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
        ]);
        try {
            $category = new Category();
            $category->catName = $request->catName;
            $category->status = 'Active';

            $category->save();
            return response()->json(['success' => 'Category Created successfully.']);
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
            $category->status = 'Active';

            $category->save();
            return response()->json([
                'catName' => $category->catName,
                'status' => 'Category Updated Successfully!',
            ]);
            return redirect()->route('state-index')->with('success', 'Category Updated Successfully');
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
            return redirect("category-index")
                ->with('success', 'Category Deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
