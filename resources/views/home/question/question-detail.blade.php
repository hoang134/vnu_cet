@extends('dashboard')
@section('content')
<style type="text/css">

.custombox {
    position: relative;
    padding: 3rem 2rem;
    border: 1px dashed #dadada;
}

</style>

<div class="custombox authorbox clearfix" style="width: 100%">
    @foreach($question as $question)
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <img src="{{asset('images/1.png')}}" width="100%" height="100%" alt="" class="img-fluid rounded-circle"> 
        </div><!-- end col -->

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <h4><a href="#">{{\App\Models\User::find($question->user_id)->Hoten}}</a></h4>
            <div class="topsocial">
                Thời gian đăng:{{$question->created_at}}
            </div><!-- end social -->
            <p>{{$question->content}}</p>
        </div><!-- end col -->
    </div><!-- end row -->
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
                    <a class="media-left" href="#">
                        <img src="{{asset('images/1.png')}}" style="width: 100%;height: 100%;" alt="" class="rounded-circle">
                    </a>
                    <div class="media-body" style="margin: 10px;">
                        <h4 class="media-heading user_name">{{$question_detail->id}}</h4>
                        <br>
                        <p>{{$question_detail->content}}</p>
                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    </div>
</div>


@endsection