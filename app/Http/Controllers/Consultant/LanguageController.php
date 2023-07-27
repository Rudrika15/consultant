<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageMaster;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Illuminate\Support\Facades\URL;
class LanguageController extends Controller
{
    //
    public function index(Request $request)
    {
        // $language = Language::join('language_masters','language_masters.id','=','languages.languageId')
        //     ->where('languages.status', '!=', 'Deleted')->orderBy('id', 'DESC')
        //     ->paginate(10, ['languages.*','language_masters.language']);
        try{    
            if ($request->ajax()) {
                $data = Language::with('language_masters')
                ->where('status','!=','Deleted')->get();
        
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $view = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm me-1 ">View</a>';
                            $btn = '<a href="' . URL::route('language.edit', $row->id) . '" class="btn btn-primary btn-sm me-1">Edit</a>';
                            $btn = $btn.'<a href="' . URL::route('language.delete', $row->id) . '" class="btn btn-danger btn-sm me-1">Delete</a>';
                            return $view.''.$btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);   
            }
            return view('language.index');
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }
    //For show single data
    public function view(Request $request, $id)
    {
        try{
            $language = Language::with('language_masters')->findOrFail($id);
            return response()->json($language);
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    } 
    public function create()
    {
        try{
            $languageMaster=LanguageMaster::all();
            $language = Language::all();
            return view('language.create', compact('language','languageMaster'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'languageId' => 'required',
        ]);
        try{
            $userId=Auth::user()->id;
            $language = new Language();
            $language->userId = $userId;
            $language->languageId = $request->languageId;
            $language->status = 'Active';

            $language->save();
            return response()->json([
                'success' => true,
                'message' => 'Language Created Successfully!',
            ],200);
            
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
    public function edit(Request $request, $id)
    {
        try{
            $languageMaster=LanguageMaster::all();
            $language = Language::find($id);
            return view('language.edit', compact('language','languageMaster'));
        }
        catch(\Throwable $th){
            //throw $th;
            return view('servererror');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'languageId' => 'required',
        ]);
        try{
            $userId=Auth::user()->id;
            $id = $request->id;
            $language = Language::find($id);
            $language->userId = $userId;
            $language->languageId = $request->languageId;
            $language->status = 'Active';

            $language->save();
            return response()->json([
                'success' => true,
                'message' => 'Language Updated Successfully!',
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }

    function delete($id)
    {
        try{
            $language = Language::find($id);
            $language->status = "Deleted";
            $language->save();
            return response()->json([
                'success' => true,
                'message' => 'Language Deleted Successfully!',
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return view('servererror');
        }
    }
}
