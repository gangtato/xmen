@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
           <div class="row">
                <div class="col-md-8">
                  <h3>Daftar Skill</h3>
                </div>
                <div class="col-md-4">
                    <div class="float-left input-group-prepend">
                        <img src="{{asset('images/search.png')}}" style="width:35px; height:35px;"/>
                    </div>
                    <form action="{{ route('skill_index')}}">
                    <input
                    name="keyword"
                    class="form-control col-md-10 float-left"
                    type="text"
                    placeholder="cari nama" aria-describedby="basic-addon1" style="width:150px;"/>
                    <div class="float-left input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                    </form>
                </div>
           </div> 
        <table width="100%" border="1">
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Action</th>
        </tr>
        @foreach($datas as $i => $data)
        <tr>
        <td>{{ $i += 1 }}</td>
        <td>{{ $data->skil }}</td>
        <td><a href="{{ route('skill.show', [$data->skil])}}" class="btn btn-primary">View Detail</a></td>
        </tr>
        @endforeach
        </table>
        </div>
    </div>
</div>
    
@endsection