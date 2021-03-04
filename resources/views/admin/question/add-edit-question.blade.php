@extends('admin.layout')
@section('title','Câu hỏi chung')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Câu hỏi</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
      <li class="breadcrumb-item" aria-current="page">Thêm câu hỏi</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
    <div class="table-agile-info">
    <div class="panel-heading">
        @if(isset($question)) Sửa câu hỏi @else Thêm câu hỏi  @endif
    </div>
    <br>
    <form action="{{ route("admin.question.save") }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Câu hỏi</label>
            <div class="col-sm-10">
                <textarea  class="form-control" id="question" name="question"></textarea>
                @if ($errors->has('question'))
                    <small class="form-text text-danger">{{ $errors->first('question') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Trả lời</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="questionReply" name="questionReply"></textarea>
                @if ($errors->has('questionReply'))
                    <small class="form-text text-danger">{{ $errors->first('questionReply') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

    </div>
@endsection
