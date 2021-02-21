@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông tin trung tâm</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Chỉnh sửa thông tin</li>
      <li class="breadcrumb-item" aria-current="page">Cơ cấu,tổ chức</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
<form action="{{route('admin.save.infomation')}}" method="post">
    @csrf
    <textarea style="width: 100%;height: 100%;" name="noidung1">{{$infomation->content2}}</textarea>
    <button type="submit">Cập nhật</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
    CKEDITOR.replace( 'noidung1', {
        filebrowserBrowseUrl: '{{ asset('css/ckeditor/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('css/ckeditor/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('css/ckeditor/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('css/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('css/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('css/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
@endsection
