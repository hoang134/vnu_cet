@extends('dashboard')
@section('content')
<style type="text/css">

.custombox {
    position: relative;
    padding: 20px 20px;
    border: 1px solid #dadada;
}

</style>

<div class="col-lg-8">
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

<div class="custombox clearfix" style="width: 100%;border:none;">
    <h4 class="small-title">Trả lời</h4>
    <div class="row">
        <div class="col-lg-12">
            <form class="form-wrapper">
                <textarea class="form-control" placeholder="Câu trả lời của bạn"></textarea>
                <button type="submit" class="btn btn-primary">Trả lời</button>
            </form>
        </div>
    </div>
</div>

<div class="custombox clearfix" style="width: 100%;">
    <h4 class="small-title">Bình luận</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                @foreach($question_detail as $question_detail)
                <div class="media">
                    <a class="media-left">
                            <img src="{{asset('images/logo.png')}}" style="width: 40px;height: 40px;" alt="" class="rounded-circle">
                        </a>
                    <div class="media-body" style="margin: 10px;">
                        <h4 class="media-heading user_name">Trung tâm khảo thí</h4>
                        <br>
                        <p>{{$question_detail->content}}</p>
                        <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('content_extend')
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-2">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title" style="text-transform: uppercase;">Câu hỏi liên quan</h2>
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
