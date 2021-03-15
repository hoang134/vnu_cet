@extends('dashboard')
@section('style')
    <style>
        .container h3 {
            margin: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container" id="printJS-form">
        <div style="display: flex; justify-content: space-around;margin: 15px 0">
            <div style="display: flex">
                <div class="brand_logo_container">
                    <img src="http://112.137.129.235/images/logo.png" class="brand_logo" alt="Logo">
                </div>
                <div style="margin: 25px 25px">
                    <h4>Đại học quốc gia hà nội(VNU)</h4>
                    <h4>Trung tâm khảo thí ĐHQGHN (CET)</h4>
                </div>
            </div>
            <div>
                <label >Ảnh hồ sơ</label><br>
                <span>
                    <img class="img" src="https://res.cloudinary.com/practicaldev/image/fetch/s--1YjkUU2Q--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://thepracticaldev.s3.amazonaws.com/i/a86595fypnp8bws7b3em.jpg" alt="Ảnh hồ sơ" height="100" width="100">
                </span>
            </div>
        </div>

        <div style="display: flex;justify-content: space-around">
            <h4>Kết quả bài thi đánh giá năng lực</h4>
            <h4 style="float: right">SCORE REPORT</h4>
        </div>
        <hr>

        <div style="display: flex; justify-content: space-between">
            <div style="display: flex;flex-direction: column; margin-left:50px">
                <strong>Thông tin người thi Student full name : {{ $studentInfor->Hoten }} </strong>
                <strong>Địa chỉ/Mailing address : {{ $diaDiemThi->Diachi }} </strong>
                <strong>Giới tính/Sex: {{ $studentInfor->Gioitinh == 0 ? 'Nam':'Nữ' }} </strong>
                <strong>Sinh ngày/Date of Birth : {{ $studentInfor->Ngaysinh }} </strong>
                <strong>CMND, CCCD/Personell ID : {{ $studentInfor->SoCMND }} </strong>
            </div>

            <div style="display: flex;flex-direction: column;">
                <strong>Ngày thi/test date : {{ $kythi->Tungay . " đến " . $kythi->Toingay }} </strong>
                <strong>số báo danh/Registration Number : {{ $kythiStudents->first()->Sobaodanh }} </strong>
                <strong>Trường THPT/High School Name : </strong>
                <strong>Mã trường THPT/High School Code : </strong>
                <strong>Mã bài thi ĐGNL/Code : </strong>
                <strong>Điểm thi/Test Place : {{ $diaDiemThi->Diachi }} </strong>
            </div>
        </div>
        <hr>
        <div style="display: flex;justify-content: space-around">
            <div>
                <h4>Tổng Điểm</h4>
                <h5>{{$totalGrade}} | 0-150</h5>
                <h5>Your TOTAL SCORE</h5>
            </div>
            @foreach($kythiStudents as $kythiStudent)
            <div>
                <h4>{{ \Illuminate\Support\Facades\DB::table('cet_monthi')->where('MaMonThi',$kythiStudent->Mamonthi)->first()->TenMonThi }}</h4>
                <h5>{{ $kythiStudent->Ketqua }}|0-50</h5>
                <h5>Linguistics</h5>
            </div>
            @endforeach
        </div>
        <hr>
        <div style="">
            <div>
                <h4>Định hướng nghề nghiệp Carrer-Oriented Recommendations</h4>
                <p>...........................................................................................................................................................................................</p>
                <p>...........................................................................................................................................................................................</p>
                <p>...........................................................................................................................................................................................</p>
            </div>
        </div>
        <hr>
        <div style="display: flex;justify-content: space-around">
            <div>
                {{ $qrCode }}
            </div>
            <div style="height: 225px">
                <p>Hà Nội,ngày/dd....tháng/mm....năm/yyyy 20...</p>
                <h4>Giám Đốc/DIRECTOR</h4>
            </div>
        </div>
        <hr>
        <p style="margin-left: 50px">Trung tâm khảo thí Đại Học Quốc Gia Hà Nội,Tầng 8,Nhà C1T,144 Xuân Thủy,Cầu Giấy,Hà Nội</p>
    </div>
    <div style="display: flex">
        <button class="btn btn-primary" style=" margin:auto ;background-color: #428bca" onclick="printJS('printJS-form', 'html')">
            <i class="fa fa-print fa-10 fa-3x"></i>
        </button>
    </div>
@endsection
