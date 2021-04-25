@extends("layouts.global")
@section("title") Simulasi Jika Superhero Menikah @endsection
@section("content")

<div class="container">
    <div class="row">
        
        <form action="{{ route('nikah') }}" method="Post" class="form-control">
        @csrf
        <h3>Simulasi Jika Superhero Menikah</h3>
        <button type="submit" class="btn btn-danger float-right" name="action" value="hapus">Hapus</button>
        <button type="submit" class="btn btn-primary float-right" name="action" value="edit">Edit</button>
        <button type="submit" class="btn btn-success float-left" name="action" value="exportexcel">Export Excel</button>
        <button type="submit" class="btn btn-warning float-left" name="action" value="exportpdf">Export PDF</button>
        @isset($datas)
        <table width="100%" border="1">
            <tr>
            
                <td width="20%">Suami</td>
                <td><select class="form-control" name="jenis_kelamin_laki_laki">
                @foreach($datas as $i => $data)
                    @if($data->jenis_kelamin == 'laki-laki')
                    <option value="{{ $data->id }}" @isset($data_suami) {{($data->id == $data_suami ? 'selected': '')}} @endisset>{{ $data->nama_super_hero }}</option>
                    @endisset   
                @endforeach
                    </select>
                </td>
           
            </tr>
            <tr>
           
                <td width="20%">Istri</td>
                <td><select class="form-control" name="jenis_kelamin_perempuan">
                @foreach($datas as $data)
                    @if($data->jenis_kelamin == 'Perempuan') 
                    <option value="{{ $data->id }}" @isset($istri) {{($data->id == $data_istri ? 'selected': '')}} @endisset>{{ $data->nama_super_hero }}</option>
                    @endif
                @endforeach
                </select></td>
           
            </tr>
        </table>
        @endisset
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