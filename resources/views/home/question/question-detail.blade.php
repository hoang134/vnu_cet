@extends('dashboard')
@section('content')
<style type="text/css">
    .custombox {
    position: relative;
    padding: 20px 20px;
    border-bottom: 1px solid #dadada;
}
</style>

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Câu hỏi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="custombox authorbox clearfix" style="width: 100%">
                        @foreach($question as $question)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    <div class="media">
                                        <a class="media-left">
                                                <img src="{{asset('images/1.png')}}" style="width: 40px;height: 40px;" alt="" class="rounded-circle">
                                            </a>
                                        <div class="media-body" style="margin: 10px;">
                                            <h4 class="media-heading user_name">{{\App\Models\User::find($question->user_id)->Hoten}}</h4>
                                            <small>{{$question->created_at}}</small>
                                            <br>
                                            <p>{{$question->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="custombox clearfix" style="width: 100%;">
                        <h4 class="small-title mb-2">Trả lời</h4>
                        <div class="row">
                            @if(Auth::check())
                                <div class="custombox clearfix" style="width: 100%;border:none;">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="w-100" method="post">
                                              @csrf
                                              <div class="input-group">
                                                <input type="text" name="question" placeholder="Nhập câu trả lời..." aria-describedby="button-addon2" class="form-control rounded-0 border-0 bg-light">
                                                <div class="input-group-append">
                                                  <button id="submit" type="submit" class="btn btn-link" style="background:  #e5e5e5"> <i class="fa fa-paper-plane"></i></button>
                                                </div>
                                              </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-12">
                                <div class="comments-list">
                                    @if(empty($question_detail)) <?php  echo "Chưa có câu trả lời nào." ?> @endif
                                    @foreach($question_detail as $question_detail)
                                    <div class="media">
                                        <a class="media-left">
                                                <img src="{{asset('images/logo.png')}}" style="width: 40px;height: 40px;" alt="" class="rounded-circle">
                                            </a>
                                        <div class="media-body" style="margin: 10px;">
                                            <h4 class="media-heading user_name">Trung tâm khảo thí</h4>
                                            <p>{{$question_detail->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="recent-post">
                            <h4>Câu hỏi liên quan</h4>
                            
                        </div>
                        
                        <div class="recent-post">
                        <h4>Trang liên kết</h4>
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
            </div>
        </div>
    </section>
@endsection