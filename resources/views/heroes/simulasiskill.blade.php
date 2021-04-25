@extends("layouts.global")
@section("title") Simulasi Jika Superhero Menikah @endsection
@section("content")

<div class="container">
    <div class="row">
        
        <form action="{{ route('nikah') }}" method="Post" class="form-control">
        @csrf
        <h3>Simulasi Jika Superhero Menikah</h3>
        <button class="btn btn-danger float-right">Hapus</button>
        <button type="submit" class="btn btn-primary float-right">Edit</button>
        
        <table width="100%" border="1">
            <tr>
                <td width="20%">Suami</td>
                <td><select class="form-control" name="jenis_kelamin_laki_laki">
                @foreach($datas as $i => $data)
                    @if($data->jenis_kelamin == 'laki-laki')
                    <option value="{{ $data->id }}" {{($data->id == $data_suami ? 'selected': '')}}>{{ $data->nama_super_hero }}</option>
                    @endif
                @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td width="20%">Istri</td>
                <td><select class="form-control" name="jenis_kelamin_perempuan">
                @foreach($datas as $data)
                    @if($data->jenis_kelamin == 'Perempuan')
                    <option value="{{ $data->id }}" {{($data->id == $data_istri ? 'selected': '')}}>{{ $data->nama_super_hero }}</option>
                    @endif
                @endforeach
                </select></td>
            </tr>
        </table>
        </form>
    </div>
    <div class="row">
        <h1>Maka Anaknya Kemungkinan Akan Memiliki Skill Berikut:</h1>
        <table width="100%" border="1">
            <tr>
                <th width="15%">No</th>
                <th>Skill</th>
            </tr>
            @isset($skills)
                @foreach($skills as $i => $skill)
                <tr>
                <td>
                {{ $i += 1 }}
                </td>
                <td>
                {{ $skill->skil }}
                </td>
                </tr>
                @endforeach
            @endisset
        </table>
    </div>
</div>
@endsection