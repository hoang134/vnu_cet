@extends('dashboard')
@section('content')
<div>
    <h3>Các kỳ thi đã đăng ký</h3>
        <table class="table table-striped table-dark">
            <thead>
                <th scope="col">Tên thí sinh</th>
                <th scope="col">Tên kỳ thi</th>
                <th scope="col">Cathi</th>
                <th scope="col">Thực hiện</th>
            </thead>
            <tbody>
            @foreach($exams as $exam)
                <tr>
                <td>{{ \Illuminate\Support\Facades\Auth::user()->Hoten }}</td>
                <td>{{ \Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$exam->Makythi)->first()->TenKythi }}</td>
                <td>{{ $exam->Cathi }}</td>
                <td><a href="{{ route('student.infor.exam',$exam->id) }}">Thông tin chi tiết</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

</div>
@endsection
