@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông tin trung tâm</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Chỉnh sửa thông tin</li>
      <li class="breadcrumb-item active" aria-current="page">Logo</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
<form action="{{route('admin.save.logo')}}" enctype="multipart/form-data" method="post">
    @csrf
    Logo:<input type="file" class="form-control" name="imagelogo">
    <button type="submit">Cập nhật</button>
</form>
@endsection
