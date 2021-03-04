@extends('dashboard')
@section('content')
    <div>
        <div>
            <h2><a href="{{ route('student.xacnhandiemthi.require') }}">Tạo yêu cầu</a></h2>
        </div>
        <div>
            <h2>Danh sác yêu cầu xác nhận điểm</h2>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Tên Học Sinh</th>
                    <th scope="col">Dịch vụ</th>
                    <th scope="col">kỳ thi</th>
                    <th scope="col">Chi phí</th>
                    <th scope="col">Trạng thái thanh toán</th>
                    <th scope="col">Trạng thái thực hiện</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cet_dichvus as $cet_dichvu)
                    @php
                        $xacnhandiemthi = DB::table('cet_xac_nhan_diem_thi')->where('id',$cet_dichvu->dichvu_id)->first();
                        $makythis = json_decode($xacnhandiemthi->makythi);
                    @endphp
                    <tr>
                        <td>{{ \Illuminate\Support\Facades\Auth::user()->Hoten }}</td>
                        <td>{{ $cet_dichvu->tendichvu }}</td>
                        <td>
                            @foreach($makythis as $makythi)
                                <span>kythi {{ \Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$makythi)->first()->TenKythi }}</span>
                            @endforeach
                        </td>
                        <td>{{\Illuminate\Support\Facades\DB::table('le_phi_dich_vus')->where('tendichvu',$cet_dichvu->tendichvu)->first()->phidichvu}}</td>
                        <td>{{ $cet_dichvu->trangthaithanhtoan }}</td>
                        <td>{{ $cet_dichvu->trangthaithuchien }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
