@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông báo</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Chỉnh sửa thông báo</li>
      <li class="breadcrumb-item" aria-current="page">Sửa sự kiện</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
<form action="{{route('admin.save.edit.notification')}}" enctype="multipart/form-data" method="post">
    @csrf
    Tiêu đề:<input type="text" class="form-control" name="title" value="{{$events->title}}">
    <br>
    Ảnh tiêu đề:<input type="file" class="form-control" name="imagetitle">
    <img src="/{{$events->imagetitle}}" width="400">
    <br>
    Thời gian bắt đầu:<input type="date" class="form-control" name="timestart" value="{{$events->timestart}}">
    <br>
    Thời gian kết thúc:<input type="date" class="form-control" name="timeend" value="{{$events->timeend}}">
    <br>
    Nội dung:<textarea style="width: 100%;height: 100%;" name="addevent">{{$events->content}}</textarea>
    <input type="hidden" name="event_id" value="{{$events->id}}">
    <button type="submit">Cập nhật</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
    CKEDITOR.replace( 'addevent');
</script>
@endsection
