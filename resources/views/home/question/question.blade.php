@extends('dashboard')
@section('content')

<section class="deal-of-week spad col-lg-8 col-md-8" style="background-color: white;">
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
                            <button type="submit" class="btn btn-primary" style="height: 58px;width: 100px;">Trả lời</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            @endif
            <table class="table">
                @foreach($questions as $question)
                <tr>
                    <td>
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="blog-box">
                                            <div class="blog-meta big-meta">
                                                @if($question->type == "public")
                                                <span class="color-orange"><a href="tech-category-01.html" title="">Câu hỏi chung</a></span>
                                                @else
                                                <span class="color-orange"><a href="tech-category-01.html" title="">Câu hỏi riêng</a></span>
                                                @endif
                                                <p><a href="{{ route('question.detail', $question->id) }}" title="">{{$question->content}}</a></p>
                                                <small><a href="" title="">{{$question->created_at}}</a></small>
                                                <small><a href="" title="">đăng bởi {{\App\Models\User::find($question->user_id)->Hoten}}</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
