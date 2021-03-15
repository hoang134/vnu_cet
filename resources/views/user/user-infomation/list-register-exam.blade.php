@extends('dashboard')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Kỳ thi đã đăng ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <th scope="col">Tên thí sinh</th>
                                <th scope="col">Tên kỳ thi</th>
                                <th scope="col">Điểm</th>
                                <th scope="col">Thực hiện</th>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                <td>{{ \Illuminate\Support\Facades\Auth::user()->Hoten }}</td>
                                <td>{{ \Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$exam->Makythi)->first()->TenKythi }}</td>
                                    @php
                                       $diemthi = \Illuminate\Support\Facades\DB::table('cet_kythi_students')->where('MaKythi',$exam->Makythi)->first();
                                    @endphp
                                <td>{{ $diemthi != null ? 'Đã có điểm' :'Chưa có điểm' }}</td>
                                <td><a href="{{ route('student.infor.exam',$exam->Makythi) }}">Thông tin chi tiết</a>

                                    @if($diemthi != null)
                                        <a href="{{ route('student.print.grade',$exam->Makythi) }}">In bảng điểm</a></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="recent-post">
                        <h4>Trang liên kết</h4>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="http://tracuu.dgnl.edu.vn/" class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/CET_KTHP chung.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                    <a class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/CET_tracuuthongtin_0.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                    <a class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/CET_DKDT_1.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                    <a class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/CET_tracuudangkyduthi_0.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                    <a href="http://diemthi.dgnl.edu.vn/" class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/CET_TracuuDiemthi_0.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                    <a class="l">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{asset('images/cetdky/khaosatykiensinhvien.png')}}" alt="" class="img-fluid float-left">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="http://facebook.com" class="social-button facebook-button">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button twitter-button">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button google-button">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button youtube-button">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="blog-tags">
                            <h4>Các từ khóa</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
