<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

    public function destroy($id){
        // menghapus data skill dari superhero
        $skill = \App\Models\Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('heroes.index')->with('status', 'User successfully deleted');
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
        return $this->simulasi2($skills,$data_suami,$data_istri);
    }

}
