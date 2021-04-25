@extends("layouts.global")
@section("title") Create Skill @endsection
@section("content")
<form action="{{ route('view_hero') }}" method="post">
@csrf
<label>Nama Hero</label>
<input type="text" name="hero"/>
<label>Jenis Kelamin</label>
<select name="jenis_kelamin">
  <option value="laki-laki">Laki-laki</option>
  <option value="Perempuan">Perempuan</option>
</select>
<input type="submit" value="submit" class="btn btn-success">
</form>
@endsection