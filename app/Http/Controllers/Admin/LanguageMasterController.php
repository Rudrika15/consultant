<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageMaster;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;
class LanguageMasterController extends Controller
{
    //
    public function index(Request $request)
    {
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
            return view('admin.languageMaster.index');
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $languageMaster = LanguageMaster::findOrFail($id);
            return response()->json($languageMaster);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function create()
    {
        try {
            $languageMaster = LanguageMaster::all();
            return view('admin.languageMaster.create', compact('languageMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'language' => 'required',
        ]);

        try {
            $languageMaster = new LanguageMaster();
            $languageMaster->language = $request->language;
            $languageMaster->status = 'Active';

            $languageMaster->save();
            $response = [
                'success' => true,
                'message' => 'Language Created Successfully!',
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
            $languageMaster = LanguageMaster::find($id);
            return view('admin.languageMaster.edit', compact('languageMaster'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'language' => 'required',
        ]);
        try {
            $id = $request->id;
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->language = $request->language;
            $languageMaster->status = 'Active';

            $languageMaster->save();
            $response = [
                'success' => true,
                'message' => 'Language Updated Successfully!',
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
            $languageMaster = LanguageMaster::find($id);
            $languageMaster->status = "Deleted";
            $languageMaster->save();
            $response = [
                'success' => true,
                'message' => 'Language Master Deleted Successfully!',
            ];

            return response()->json($response);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
