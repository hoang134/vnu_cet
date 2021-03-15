@extends('dashboard')
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Xác nhận điểm thi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h2><a href="{{ route('student.xacnhandiemthi.require') }}">Tạo yêu cầu</a></h2>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Tên Học Sinh</th>
                            <th scope="col">Dịch vụ</th>
                            <th scope="col">Đợt thi</th>
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
        </div>
    </div>
</section>
@endsection
