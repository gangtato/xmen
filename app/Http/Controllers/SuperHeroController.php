<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimulasiExport;
use PDF;

class SuperHeroController extends Controller
{
    public function index(Request $request){
        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $datas = \App\Models\SuperHero::where('nama_super_hero', 'LIKE', "%$filterKeyword%")->paginate(10);
        }else{
            $datas = \App\Models\SuperHero::paginate(10);
        }
        return view('home', ['datas' => $datas]);
    }

    public function show($id)
    {
       // menampilkan data superhero dan skillnya
       $superhero = \App\Models\SuperHero::findOrFail($id);
       $dataskill = DB::table('table_detail_hero')->where('hero_id',$id)->get();
       return view('heroes.show', ['superheroes' => $superhero, 'dataskill' => $dataskill]);
    }

    public function skill($id){
        //menampilkan data skill
        $data = \App\Models\SuperHero::findOrFail($id);
        return view('heroes.createskill', ['data' => $data]);
    }

    public function createskill(Request $request,$id)
    {
       // menyimpan data skill dari super hero
       $id = $id;
       $skill = $request->get('skill');
       $skills = new \App\Models\Skill;
       $skills->hero_id = $id;
       $skills->skil = $skill;
       $skills->save();
       return $this->show($id);
    }

    //route resource
    public function destroy($id){
        // menghapus data skill dari superhero
        $skill = \App\Models\Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('heroes.index');
    }

    public function destroy2($id){
        // menghapus data skill dari superhero
        $superhero = \App\Models\SuperHero::findOrFail($id);
        $superhero->delete();
        return redirect()->route('heroes.index');
    }

    public function destroy3($id){
        // menghapus data skill dari superhero
        $skill = \App\Models\SuperHero::findOrFail($id);
        $skill->delete();
        return redirect()->route('skill_index');
    }

    public function update(Request $request,$id){
        // mengupdate data nama hero dan jenis kelamin
        $id = $id;
        $superhero = $request->get('nama_super_hero');
        $jenis_kelamin = $request->get('jenis_kelamin');

        $superherodata = \App\Models\SuperHero::findOrFail($id);
        $superherodata->nama_super_hero = $superhero;
        $superherodata->jenis_kelamin = $jenis_kelamin;
        
        $superherodata->save();
        return redirect()->route('home', [$id]);

    }

    public function simulasi(){
         $datas = \App\Models\SuperHero::all();
        return view('heroes.simulasiskill',['datas' => $datas]);
    }

    public function simulasi2($skills,$data_suami,$data_istri){
        $datas = \App\Models\SuperHero::all();
        return view('heroes.simulasiskill',['datas' => $datas, 'skills' => $skills,'data_suami'=> $data_suami, 'data_istri' => $data_istri]);
    }

    public function hasilSimulasi(Request $request){
        $data_suami = $request->get('jenis_kelamin_laki_laki');
        $data_istri = $request->get('jenis_kelamin_perempuan');
        $skills = DB::table('table_detail_hero')->whereIn('hero_id',[$data_suami,$data_istri])->get();
        if($request->input('action') == 'edit'){   
            return $this->simulasi2($skills,$data_suami,$data_istri);
        }else if($request->input('action') == 'exportexcel'){
            return Excel::download(new SimulasiExport($data_suami, $data_istri), 'simulasi.xlsx');  
        }else if($request->input('action') == 'exportpdf'){
            

            view()->share('skill_heroes',$skills);
            $pdf = PDF::loadView('heroes.pdf_skill_hero', $skills);
            // download PDF file with download method
            return $pdf->download('pdf_file.pdf');
        }else{
            return $this->simulasi();
        }  
    }

    public function skill_index(Request $request){
        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $datas = DB::table('table_detail_hero')
             ->select(DB::raw('DISTINCT skil'))
             ->where('skil', 'LIKE', "%$filterKeyword%")
             ->groupBy('skil')
             ->get();
        }else{
            $datas = DB::table('table_detail_hero')
            ->select(DB::raw('DISTINCT skil'))
            ->groupBy('skil')
            ->get();
        }
        return view('skill_index', ['datas' => $datas]);
    }

    public function skill_show($skill){
        //skil dari table detail hero
        $datas = $skill;
        $hero_id = array();
        $db = DB::table('table_detail_hero')->where('skil',$datas)->get();
        // menampung data dari db detail hero
        foreach($db as $dbs){
           $a = DB::table('table_super_hero')->where('id',$dbs->hero_id)->first();
           array_push($hero_id, $a); 
        }
        return view('heroes.show_skill',['datas' => $db, 'hero_id' => $hero_id]);
    }

    public function createhero($skill){
        $datas = $skill;
        //mendapatkan nilai id dari skill
        $db = DB::table('table_detail_hero')->where('id',$datas)->first();
        
        return view('heroes.createHero',['db' => $db]);
    }

    public function view_hero(Request $request){
        $nama_hero = $request->get('hero');
        $jenis_kelamin = $request->get('jenis_kelamin');
        DB::table('table_super_hero')->insert([
                    'nama_super_hero' => $nama_hero,
                    'jenis_kelamin' => $jenis_kelamin
                ]);
        return redirect()->route('skill_index'); 
    }

}
