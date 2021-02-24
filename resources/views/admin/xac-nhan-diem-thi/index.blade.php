@extends('admin.layout')
@section('content')
    <div>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Tên Học Sinh</th>
                <th scope="col">Dịch vụ</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Trạng thái thực hiện</th>
                <th scope="col">Sử lý</th>
            </tr>
            </thead>
            <tbody>
                @foreach($cet_dichvus as $cet_dichvu)
                    <tr>
                        <td>{{\Illuminate\Support\Facades\DB::table('cet_student_acc')->where('tendangnhap',$cet_dichvu->tendangnhap)->first()->Hoten}}</td>
                        <td>{{$cet_dichvu->tendichvu}}</td>
                        <td>{{$cet_dichvu->trangthaithanhtoan}}</td>
                        <td>{{$cet_dichvu->trangthaithuchien}}</td>
                        <td><a href="{{ route('admin.xacnhandiemthi.handle',['tendangnhap'=>$cet_dichvu->tendangnhap,'id'=>$cet_dichvu->dichvu_id]) }}">Sử lý</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
