@extends('dashboard')
@section('content')

<section class="deal-of-week spad col-lg-8" style="background-color: white;">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <h2>Diễn đàn trao đổi</h2>
            </div>
            @if(Auth::check())
            <div class="custombox clearfix" style="width: 100%;border:none;">
                <h4 class="small-title">Đặt câu hỏi</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-wrapper" action="{{ route('student.question.create') }}" method="post">
                            @csrf
                            <textarea class="form-control" style="float: left;width: 100%;" placeholder="Câu trả lời của bạn" name="question"></textarea>
                            <button type="submit" class="btn btn-success" style="height: 58px;width: 100px;">Trả lời</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th width="65%">Câu hỏi</th>
                        <th>Đăng bởi</th>
                    </tr>
                </thead>
                @foreach($questions as $question)
                <tr>
                    <td>
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-box">
                                            <div class="blog-meta big-meta">
                                                <p><a href="{{ route('question.detail', $question->id) }}" title="">{{$question->content}}</a></p>
                                                <small>@if($question->type == "public")
                                                <span class="color-orange" style="display: inline;"><a href="tech-category-01.html" title="">Câu hỏi chung</a></span>
                                                @else
                                                <span class="color-orange" style="display: inline;"><a href="tech-category-01.html" title="">Câu hỏi riêng</a></span>
                                                @endif<a href="" title="">đăng vào:{{$question->created_at}}</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="media-left">
                            <img src="{{asset('images/1.png')}}" style="width: 40px;height: 40px;" alt="" class="rounded-circle">
                        </a>
                        {{\App\Models\User::find($question->user_id)->Hoten}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-2">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;"></h2>
            <br>
            <div class="trend-videos">


            </div>
        </div>

        <br>

        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Các trang liên kết</h2>
            <br>
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
    </div>
</div>
@endsection
