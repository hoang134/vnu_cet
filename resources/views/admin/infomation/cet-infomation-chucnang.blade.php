@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông tin trung tâm</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Chỉnh sửa thông tin</li>
      <li class="breadcrumb-item" aria-current="page">Chức năng,nhiệm vụ</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
<form action="{{route('admin.save.infomation')}}" method="post">
    @csrf
    <textarea style="width: 100%;height: 100%;" name="noidung2">{{$infomation->content3}}</textarea>
    <button type="submit">Gửi</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
    CKEDITOR.replace( 'noidung2');
</script>
@endsection
