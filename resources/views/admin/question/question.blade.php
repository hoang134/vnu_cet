@extends('admin.layout')
@section('title', 'Thêm câu hỏi')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông tin trung tâm</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
      <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
<div class="col-lg-12 mb-4">
  <!-- Simple Tables -->
  <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h4 class="m-0 font-weight-bold">Trả lời câu hỏi</h4>
    </div>
    <header class="panel-heading wht-bg">
        <h4 class="gen-case">
            <form action="{{ route('admin.question.search') }}" class="pull-right mail-src-position" method="post">
                @csrf
                <div class="input-append">
                    <input type="text" name ="keySearch"class="form-control " placeholder="Tìm câu hỏi">
                    <button type="submit" class="btn-success">Tìm kiếm</button>
                </div>
            </form>
        </h4>
    </header>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th><i class="fa fa-star"></i></th>
            <th width="20%">Người gửi</th>
            <th width="25%">Nội dung</th>
            <th width="20%">Loại câu hỏi</th>
            <th>Trả lời</th>
            <th width="10%">Thực hiện</th>
          </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <span style="display: none">{{$question = \App\Models\Question::find($question->id)}}</span>
          <tr class="question-{{$question->id}}">
            <td style="width: 100px;">
                <i class="fa fa-star" style="{{$question->questionReply == null? "color:blue":""}}"></i>
            </td>
            <td>{{$question->user->Hoten}}</td>
            <td>
                <a  class="content-question" data-id ="{{$question->id}}" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                    <p style="width: 35vh;color: blue;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;height: 5vh;">
                        {{$question->content}}
                    </p>
                </a>
            </td>
            <td>
                <span class="">{{$question->type}}</span>
            </td>
            <td>
                <p style="width: 35vh;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;height:5vh;">{{$question->questionReply == null? "---": $question->questionReply->content}}
                </p>
            </td>
            <td>
                <button class="reply" data-id="{{ $question->id }}" style="width: 65px;">Trả lời</button>
                <button class="change-type" data-id="{{ $question->id }}" style="width: 65px;">Loại câu</button>
            </td>
          </tr>
          <tr id="{{$question->id}}" style="display: none;">
            <form id="form-{{$question->id}}">
                @csrf
                <td colspan="6"><textarea cols="130" name="question" class="input-{{$question->id}}"></textarea>
                    <button type="submit" class="submit"> Trả lời</button>
                </td>
            </form>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer"></div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Câu hỏi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-modal">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nhập nội dung:</label>
                        <input type="text" class="form-control" id="recipient-name" name="question">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary save-data"  data-dismiss="modal">Lưu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    var questionReplyUrl = '{{ route('admin.question.reply', ':id') }}'
    var questionChangeTypeUrl = '{{ route('admin.question.change.type', ':id') }}'
    var questionEditTypeUrl = '{{ route('admin.question.edit', ':id') }}'

    function getData(id) {
        $.ajax({
            type:'GET',
            url: questionReplyUrl.replace(':id', id),
            success: function (data) {
                $('.question-'+id).html(data);
                $('.input-'+id).val('');
            }
        });
    }
    $(document).ready(function () {
    let idQestion;
    $(document).on('click',".reply",function() {
        idQestion = $(this).data('id');

        $("#"+idQestion).toggle();
    });

    $('.submit').click(function (e) {
        $('#'+idQestion).css('display','none' );
        e.preventDefault();

        $.ajax({
            type:'POST',
            url: questionReplyUrl.replace(':id', idQestion),
            data: $("#form-"+idQestion).serialize(),
            success: function () {
                getData(idQestion);
            }
        });
    });
        $(document).on('click',".change-type",function() {
            idQestion = $(this).data('id');
            $.ajax({
                type:'GET',
                url: questionChangeTypeUrl.replace(':id', idQestion),
                success:function () {
                    getData(idQestion);
                }
            });
        });
        $(document).on('click', '.content-question',function () {
            idQestion = $(this).data('id');
        });

    $('.save-data').click(function () {
        $.ajax({
            type:'POST',
            url: questionEditTypeUrl.replace(':id', idQestion),
            data:$('#form-modal').serialize(),
            success:function () {
                getData(idQestion);
            }
        });
    });
});
</script>

@endsection
