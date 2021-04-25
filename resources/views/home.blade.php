@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
           <div class="row">
                <div class="col-md-8">
                  <h3>Daftar SuperHero</h3>
                </div>
                <div class="col-md-4">
                    <div class="float-left input-group-prepend">
                        <img src="{{asset('images/search.png')}}" style="width:35px; height:35px;"/>
                    </div>
                    <form action="{{ route('heroes.index')}}">
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
           <div class="row text-center">
              <table width="90%" border="1">
              <tr>
                 <th>NO</th>
                 <th>Nama</th>
                 <th>Jenis Kelamin</th>
                 <th>Action</th>
              </tr>
              @foreach($datas as $data)
              <tr>
                 <td>{{ $data->id }}</td>
                 <td>{{ $data->nama_super_hero }}</td>
                 <td>{{ $data->jenis_kelamin }}</td>
                 <td><a href="{{route('heroes.show', [$data->id])}}" class="btn btn-primary">View Detail</a>
                 <a href="" class="btn btn-danger">Hapus</a></td>
              </tr>
              @endforeach
              </table>
           </div>
       </div> 
    </div>
</div>
@endsection
