@extends("layouts.global")
@section("title") Create Skill @endsection
@section("content")
<form action="{{ route('create.skills2',[$data->id])}}" method="post">
@csrf
<label>Skill</label>
<input type="text" name="skill">
<input type="submit" value="submit">
</form>
@endsection