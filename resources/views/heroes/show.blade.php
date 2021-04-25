@extends("layouts.global")
@section("title") Detail Super Hero: {{ $superheroes->nama_super_hero }} @endsection
@section("content")
<div class="container">
    <div class="row">
       <div class="col-md-12">
           <div class="row">
                <div class="col-md-8">
                  <h3>Detail Super Hero: {{ $superheroes->nama_super_hero }}</h3>
                </div>
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="
                {{route('heroes.update', [$superheroes->id])}}" method="POST">
                  @csrf
                <input type="hidden" value="PUT" name="_method">

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
                 <td>{{ $superheroes->id }}</td>
              </tr>
              <tr>
                 <td>Nama</td>
                 <td><input class="form-control" type="text" value="{{ $superheroes->nama_super_hero }}" name="nama_super_hero"></td>
              </tr>
              <tr>
                 <td>Jenis Kelamin</td>
                 <td><select class="form-control" name="jenis_kelamin">
                       <option value="laki-laki" {{ ($superheroes->jenis_kelamin == 'laki-laki') ? 'selected': ''}}>Laki - Laki</option>
                       <option value="Perempuan" {{ ($superheroes->jenis_kelamin == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                     </select></td>
              </tr>
              </table>
              </form>
           </div>
           <div>&nbsp;</div>
           <div class="row text-center">
              <table border="1" width="100%">
                 <tr>
                 <td>No</td>
                 <td>Skill</td>
                 <td><a class="btn btn-primary" href="{{ route('create.skills', [$superheroes->id])}}">Tambah Skill</a></td>
                 </tr>
                 @foreach($dataskill as $index => $data)
                 <tr>
                   <td>{{ $index += 1 }}</td>
                   <td>{{ $data->skil }}</td>
                   <td><form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('heroes.destroy', [$data->id])}}" method="POST">
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