<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
<<<<<<< HEAD

=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
<<<<<<< HEAD
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
=======
            if($request->ajax()){
            $data=Category::where('status','!=','Deleted')->get();
    
                return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action',function($row){
                                    $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                                    $btn = '<a href="' . URL::route('category.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                                    $btn = $btn.'<a href="' . URL::route('category.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                                    return $view.''.$btn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
            }
            return view('category.index');
        } 
        catch (\Throwable $th) {
            //throw $th;    
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }
    //For single category
    public function view(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    public function create()
    {
<<<<<<< HEAD
        try {
            $category = Category::all();
            return view('category.create', compact('category'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
=======
        try{
            $category = Category::all();
            return view('category.create', compact('category'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
       
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'catName' => 'required',
        ]);
<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $category = new Category();
            $category->catName = $request->catName;
            $category->status = 'Active';

            $category->save();
<<<<<<< HEAD
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
=======
            return redirect('category-index')
                ->with('success', 'Category Create Successfully');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
    }
    public function edit(Request $request, $id)
    {
        try{
            $category = Category::find($id);
            return view('category.edit', compact('category'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'catName' => 'required',
        ]);
<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $id = $request->id;
            $category = Category::find($id);
            $category->catName = $request->catName;
            $category->status = 'Active';
<<<<<<< HEAD

            $category->save();
            $response = [
                'success' => true,
                'message' => 'Category Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
=======
    
            $category->save();
            return redirect('category-index')
                ->with('success', 'Category Update Successfully');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
<<<<<<< HEAD
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
=======
        try{
            $category = Category::find($id);
            $category->status = "Deleted";
            $category->save();
            return redirect("category-index")
                ->with('success', 'Category Deleted successfully');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
       
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }
}