@extends('dashboard')
@section('style')
    <style>
        .img {
            background-size: contain;
        }
    </style>
@endsection

@section('content')
    <div id="printJS-form">
        <h3>THÔNG TIN KỲ THI ĐÃ ĐĂNG KÝ</h3>
        <h4>Số báo danh của bạn là....</h4>
        <h3>A.Thông tin cá nhân</h3>
        <label>1.họ tên chữ đệm tên thí sinh : </label> <span>{{ $studentInfor->Hoten }}</span><br>
        <label>2.giới tính : </label> <span>{{ $studentInfor->Gioitinh }}</span>  <label>3.ngày sinh</label> <span>{{ $studentInfor->Ngaysinh }}</span><br>
        <label>4.số CMND/CCCD/Hộ chiếu : </label> <span>{{ $studentInfor->SoCMND }}</span><br>
        <div style = "float: right">
           <label >Ảnh hồ sơ</label> <span> <img class="img" src="https://res.cloudinary.com/practicaldev/image/fetch/s--1YjkUU2Q--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://thepracticaldev.s3.amazonaws.com/i/a86595fypnp8bws7b3em.jpg" alt="Ảnh hồ sơ"></span>
            <br>
        </div>

            <label>5.Hộ khẩu thường trú</label><br>
            <h3>B.Thông tin dự thi</h3>
                <div style="float: right">
                    {{ $qrCode }}
                </div>
                <label>6.Địa điểm dự thi : </label> <span>{{ $diaDiemThi->Diachi }}</span> <br>
                <label>Tên kỳ thi</label> <span>{{ $kythi->TenKythi }}</span> <br>
                <label>7.Đợt thi</label> <span>Từ ngày  {{ $kythi->Tungay . " Đến ngày " . $kythi->Toingay }}</span><br>
    {{--            <label>8.Ngày thi</label> <span>{{  }}</span> <br> <span>{{  }}</span>--}}
                <label>9.Ca thi</label> <span>{{ $inforExam->Cathi }}</span> <br>
    {{--            <label>9.Môn thi</label> <span>{{ TenKythi }}</span> <br>--}}

                <label>11.Phòng thi : </label> <span>{{ $diaDiemThi->Sophong . " - " .$diaDiemThi->TenDiadiem  }}</span>
            <br>
        </div>
    </div>
    <button class="btn-success" type="button" onclick="printJS('printJS-form', 'html')">
        Xuất file
    </button>
@endsection
