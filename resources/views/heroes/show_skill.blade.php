@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
           <div class="row">
                <div class="col-md-8">
                  <h3>Detail Super Hero: {{ $datas[0]->skil }}</h3>
                </div>
                <!-- <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="
                {{route('heroes.update', [$datas[0]->skil])}}" method="POST">
                  @csrf
                <input type="hidden" value="PUT" name="_method"> -->

                <div class="col-md-4">
                    <div class="float-right input-group-append">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </div>
           </div>
           <div class="row">
              <table width="100%" border="1">
              <tr>
                 <td>ID</td>
                 <td>
                 @foreach($datas as $data)
                  {{ $data->id }},
                 @endforeach
                 </td>
              </tr>
              <tr>
                 <td>Nama</td>
                 <td><input class="form-control" type="text" value="{{ $datas[0]->skil }}" name="nama_skil"></td>
              </tr>
              </table>
              </form>
           </div>
           <div>&nbsp;</div>
           <div class="row text-center">
           <table border="1" width="100%">
                 <tr>
                    <td>No</td>
                    <td>Hero</td>
                    <td><a class="btn btn-primary" href="{{ route('create.hero', [$datas[0]->id])}}">Tambah Hero</a></td>
                 </tr>
                 @foreach($hero_id as $i => $data)
                 <tr>
                   <td>{{ $i += 1 }}</td>
                   <td>{{ $data->nama_super_hero }}</td>
                   <td>
                    <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{ route('heroes.destroy3', [$data->id])}}" method="POST">
                       @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                    </form>
                    </td>
                 </tr>
                 @endforeach
              </table> 
           </div>
       </div> 
    </div>
</div>

@endsection