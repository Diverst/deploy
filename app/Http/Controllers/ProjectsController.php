<?php

namespace App\Http\Controllers;

use App\Exports\ProjectsExport;
use Illuminate\Http\Request;
use App\Models\Project;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProjectImport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    function index(){

        //Get all projects from database (Latest projects will be always on top!)
        $projects = Project::orderBy('id', 'asc')
        ->get();
        return view('projects.index', compact('projects'));
        // return view('table');

    }

    public function indexAdd(){

        return view('addTable');
    }

    public function addProjects(Request $request ){

        //  $request->validate([
        //     'nama' => 'required|unique:projects,nama|max:255',
            
        // ]);
        $rules = [
            'nama'          => 'required|unique:projects,nama',
        
        ];
 
        $messages = [
            'nama.required'          => 'Nama Project wajib diisi.',
            'nama.unique'              => 'Nama Project sudah ada'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return back()->withErrors($validator)->withInput($request->all());
        }

        

        $data = new Project();
        $data->nama = $request->nama;
        $data->progressStatus = $request->progressStatus;
        $data->prioritas = $request->prioritas;
        $data->live = $request->live;
        $data->perkiraanLive = $request->perkiraanLive;
        $data->onTrack = $request->onTrack;
        $data->impactDelayed = $request->impactDelayed;
        $data->keyDepedency = $request->keyDepedency;
        $data->issue = $request->issue;
        $data->eskalasi = $request->eskalasi;
        $data->picOne = $request->picOne;
        $data->picTwo = $request->picTwo;
        $data->responsibleUnit = $request->responsibleUnit;
        $data->keySegment = $request->keySegment;
        $data->nasabah = $request->nasabah;
        $data->channelProduct = $request->channelProduct;
        $data->jenis = $request->jenis;
        $data->nomorCr = $request->nomorCr;
        $data->pihakEksternal = $request->pihakEksternal;
        $data->tanggalRequirement = $request->tanggalRequirement;
        $data->jadwalImplementasi = $request->jadwalImplementasi;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect('/projects');
        // dd($request->all());
    }
    
    public function deleteProjects($id){
        $data = Project::find($id);

        $data->delete();
        return redirect('/projects');
    }

    public function indexEdit($id){
       $data = Project::find($id);


     
        return view('editTable',['project'=>$data]);

    }

    public function editProjects($id,Request $request){

        $rules = [
            'nama'          => 'required|unique:projects,nama',
        
        ];
 
        $messages = [
            'nama.required'          => 'Nama Project wajib diisi.',
            'nama.unique'              => 'Nama Project sudah ada'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return back()->withErrors($validator)->withInput($request->all());
        }
        $data = Project::find($id);
        $data->nama = $request->nama;
        $data->progressStatus = $request->progressStatus;
        $data->prioritas = $request->prioritas;
        $data->live = $request->live;
        $data->perkiraanLive = $request->perkiraanLive;
        $data->onTrack = $request->onTrack;
        $data->impactDelayed = $request->impactDelayed;
        $data->keyDepedency = $request->keyDepedency;
        $data->issue = $request->issue;
        $data->eskalasi = $request->eskalasi;
        $data->picOne = $request->picOne;
        $data->picTwo = $request->picTwo;
        $data->responsibleUnit = $request->responsibleUnit;
        $data->keySegment = $request->keySegment;
        $data->nasabah = $request->nasabah;
        $data->channelProduct = $request->channelProduct;
        $data->jenis = $request->jenis;
        $data->nomorCr = $request->nomorCr;
        $data->pihakEksternal = $request->pihakEksternal;
        $data->tanggalRequirement = $request->tanggalRequirement;
        $data->jadwalImplementasi = $request->jadwalImplementasi;
        $data->keterangan = $request->keterangan;
        $data->update();

        return redirect('/projects');

    }
    public function export(){
        
		return Excel::download(new ProjectsExport, 'whs.xlsx');
    }

    public function importFrom(Request $request){
        $file=$request->file('file');
        
     Excel::import(new ProjectImport,$file);
     $data = Project::where('nama','Project Name');

     $data->delete();
     return back()->withStatus('status', "Record insert successfully");
    }

    public function fileTemplate(){
        $file= public_path(). "/template/template.xlsx";   

        return response()->download($file);
        // return "sukses";

    }
}
