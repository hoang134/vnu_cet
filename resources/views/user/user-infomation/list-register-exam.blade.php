@extends('dashboard')
@section('content')
    <div>
        <h2>Các kỳ thi đã đăng ký</h2>
        @foreach($exams as $exam)
            <h3>Tên kỳ thi {{\Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$exam->Makythi)->first()->TenKythi}}
                Cathi : {{$exam->Cathi}} <a href="{{ route('student.infor.exam',$exam->id) }}">lấy phiếu xác nhận</a></h3>
        @endforeach
    </div>
@endsection
