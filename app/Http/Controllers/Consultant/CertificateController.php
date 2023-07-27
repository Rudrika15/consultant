<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;
class CertificateController extends Controller
{
    //
    public function index(Request $request)
    {
        // try{
            if ($request->ajax()) {
                $data = Certificate::where('status','!=','Deleted')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                        $btn = '<a href="' . URL::route('certificate.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                        $btn = $btn . '<a href="' . URL::route('certificate.delete', $row->id) . '" class="delete btn btn-danger btn-sm me-1">Delete</a>';
                        return $view . '' . $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('consultant.certificate.index');
        // }
        // catch(\Throwable $th){
        //     //throw $th;
        //     return view('servererror');
        // } 
    }
    public function view(Request $request, $id)
    {
        try{
            $certificate = Certificate::findOrFail($id);
            return response()->json($certificate);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        } 
    }
    public function create()
    {
        try{
            $certificate = Certificate::all();
            return view('consultant.certificate.create', compact('certificate'));
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
            $certificate = new Certificate();
            $certificate->userId=$userId;
            $certificate->title = $request->title;
            if ($request->photo) {
                $certificate->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('certificate'),  $certificate->photo);
            }
            $certificate->status = 'Active';
            $certificate->save();

            return response()->json([
                'success' => true,
                'message' => 'certificate Created Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        } 
    }

    public function edit(Request $request, $id)
    {
        try{
            $certificate = Certificate::find($id);
            return view('consultant.certificate.edit', compact('certificate'));
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
            $certificate = Certificate::find($id);
            $certificate->userId=$userId;
            $certificate->title = $request->title;
            if ($request->photo) {
                $certificate->photo = time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('certificate'),  $certificate->photo);
            }
            $certificate->status = 'Active';
            $certificate->save();

           return response()->json([
                'success' => true,
                'message' => 'certificate Updated Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try{
            $certificate = Certificate::find($id);
            $certificate->status = "Deleted";
            $certificate->save();

            return response()->json([
                'success' => true,
                'message' => 'certificate Deleted Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
