@extends('dashboard')
@section('content')
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
                    <div class="row">
                        <button type="button" class="collapsible-question">Đặt câu hỏi</button>
                        <div class="content-question">
                          <form id="Form-data" class="w-100" action="{{ route('student.question.create') }}" method="post">
                              @csrf
                              <div class="panel panel-primary" style="margin: 5px;padding: 5px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                      <label for="email">Nội dung câu hỏi</label>
                                      <div class="input-group">
                                        <textarea required="true" class="form-control" name="question" placeholder="Nhập câu hỏi..." style="min-height: 80px;"></textarea>
                                        <div class="input-group-append ml-2">
                                          <button id="submit" type="submit" class="btn btn-link" style="background:  #e5e5e5"> <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                          </form>
                        </div>
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
                                                            <p><a href="{{ route('question.detail', $question->id) }}" title="" style="display: -webkit-box;margin: 0 auto;line-height: 1.3;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{$question->content}}</a></p>
                                                            <small>@if($question->type == "public")
                                                            <span class="color-orange" style="display: inline;"><a title="">Câu hỏi chung</a></span>
                                                            @else
                                                            <span class="color-orange" style="display: inline;"><a title="">Câu hỏi riêng</a></span>
                                                            @endif</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{\App\Models\User::find($question->user_id)->Hoten}}<br>
                                    <small>{{$question->created_at}}</small>
                                </td>
                            </tr>
                            @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible-question");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    </script>
@endsection