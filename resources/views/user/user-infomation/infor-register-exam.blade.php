@extends('dashboard')
@section('style')
    <style>
        .img {
            background-size: contain;
        }
    </style>
@endsection

@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="{{route('student.list.exam')}}"> Kỳ thi đã đăng ký</a>
                    <span>Chi tiết</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="printJS-form">
                    <h3 class="mb-2">I.Thông tin cá nhân</h3>
                    <div style = "float: right">
                       <label >Ảnh hồ sơ</label><br>
                       <span> <img class="img" src="https://res.cloudinary.com/practicaldev/image/fetch/s--1YjkUU2Q--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://thepracticaldev.s3.amazonaws.com/i/a86595fypnp8bws7b3em.jpg" alt="Ảnh hồ sơ" height="100" width="100">
                       </span>
                    <br>
                    </div>
                    <label><strong>Họ tên thí sinh</strong> : </label> <span>{{ $studentInfor->Hoten }}</span><br>
                    <label><strong>Giới tính</strong> : </label> <span>{{ $studentInfor->Gioitinh }}</span> <br>
                    <label><strong>Ngày sinh</strong> : </label> <span>{{ $studentInfor->Ngaysinh }}</span><br>
                    <label><strong>Số CMND/CCCD/Hộ chiếu</strong> : </label> <span>{{ $studentInfor->SoCMND }}</span><br>

                    <label><strong>Hộ khẩu thường trú</strong> : </label><br>
                    <h3 class="mb-2">II.Thông tin dự thi</h3>
                    <div style="float: right">
                        {{ $qrCode }}
                    </div>
                    <label><strong>Số báo danh</strong> : </label><br>
                    <label><strong>Địa điểm dự thi</strong> : </label> <span>{{ $diaDiemThi->Diachi }}</span> <br>
                    <label><strong>Tên kỳ thi</strong> : </label> <span>{{ $kythi->TenKythi }}</span> <br>
                    <label><strong>Thời gian</strong> : </label> <span>{{ $kythi->Tungay . " đến " . $kythi->Toingay }}</span><br>
            {{--            <label><strong>Ngày thi</strong> : </label> <span>{{  }}</span> <br> <span>{{  }}</span>--}}
                    <label><strong>Ca thi</strong> : </label> <span>{{ $inforExam->Cathi }}</span> <br>
            {{--            <label><strong>Môn thi</strong> : </label> <span>{{ TenKythi }}</span> <br>--}}

                    <label><strong>Phòng thi</strong> : </label> <span>{{ $diaDiemThi->Sophong . " - " .$diaDiemThi->TenDiadiem  }}</span>
                    <br>
                    </div>
                </div>
                <button class="btn-success" type="button" onclick="printJS('printJS-form', 'html')">
                    Xuất file
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
