<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageMaster;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
<<<<<<< HEAD

=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
class LanguageMasterController extends Controller
{
    //
    public function index(Request $request)
    {

        // $languageMaster = LanguageMaster::where('status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['language_masters.*']);
<<<<<<< HEAD
        try {
            if ($request->ajax()) {
                $data = LanguageMaster::where('status', '!=', 'Deleted')
                    ->orderBy('id', 'DESC')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('languageMaster.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('languageMaster.delete', $row->id) . '" class="btn btn-danger btn-sm me-1 delete">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('languageMaster.index');
        } catch (\Throwable $th) {
=======
        try{
            if ($request->ajax()) {
                $data = LanguageMaster::where('status','!=','Deleted')->get();

                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('languageMaster.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('languageMaster.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('languageMaster.index');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
<<<<<<< HEAD
        try {
            $languageMaster = LanguageMaster::findOrFail($id);
            return response()->json($languageMaster);
        } catch (\Throwable $th) {
=======
        try{
            $languageMaster = LanguageMaster::findOrFail($id);
            return response()->json($languageMaster);
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
<<<<<<< HEAD
        try {
            $languageMaster = LanguageMaster::all();
            return view('languageMaster.create', compact('languageMaster'));
        } catch (\Throwable $th) {
=======
        try{
            $languageMaster = LanguageMaster::all();
            return view('languageMaster.create', compact('languageMaster'));
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'language' => 'required',
        ]);

<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $languageMaster = new LanguageMaster();
            $languageMaster->language = $request->language;
            $languageMaster->status = 'Active';

            $languageMaster->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'Language Created Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
=======
            return redirect('languageMaster-index')
                ->with('success', 'language Create Successfully');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
        
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    }

    public function edit(Request $request, $id)
    {
<<<<<<< HEAD
        try {
            $languageMaster = LanguageMaster::find($id);
            return view('languageMaster.edit', compact('languageMaster'));
        } catch (\Throwable $th) {
=======
        try{
            $languageMaster = LanguageMaster::find($id);
            return view('languageMaster.edit', compact('languageMaster'));
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'language' => 'required',
        ]);
<<<<<<< HEAD
        try {
=======
        try{
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            $id = $request->id;
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->language = $request->language;
            $languageMaster->status = 'Active';

            $languageMaster->save();
<<<<<<< HEAD
            $response = [
                'success' => true,
                'message' => 'Language Updated Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
=======
            return redirect('languageMaster-index')
                ->with('success', 'language Update Successfully');
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
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->status = "Deleted";
            $languageMaster->save();
            $response = [
                'success' => true,
                'message' => 'Language Master Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
=======
        try{
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->status = "Deleted";
            $languageMaster->save();
            return redirect("languageMaster-index")
                ->with('success', 'language Deleted successfully');
        }
        catch(\Throwable $th){
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            //throw $th;
            return view('servererror');
        }
    }
}
