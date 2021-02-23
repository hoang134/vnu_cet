@extends('admin.layout')
@section('content')
    <div>
        <h3>Xác nhận điểm thi</h3>
        <lable>Tên học sinh:</lable>{{$Hoten}} <br>
        @foreach($makythis as $makythi )

            <span>kythi {{ \Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$makythi)->first()->TenKythi }}</span>
            <br>
        @endforeach
    </div>
@endsection
