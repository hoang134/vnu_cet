@extends('admin.layout')
@section('title', 'Thêm câu hỏi')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Cập nhật thông báo</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
      <li class="breadcrumb-item" aria-current="page">Chỉnh sửa thông báo</li>
      <li class="breadcrumb-item" aria-current="page">Tất cả sự kiện</li>
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
            <th>Tiêu đề</th>
            <th>Thời gian bắt đầu</th>
            <th>Thời gian kết thúc</th>
            <th>Nội dung</th>
            <th>Lựa chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->timestart }}</td>
                <td>{{ $event->timeend }}</td>
                <td><?php echo "$event->content" ?></td>
                <td>
                    <div>
                        <a href="{{route('admin.edit.notification',$event->id)}}">
                            <i class="fa fa-edit"></i>Sửa
                        </a>
                        <a href="{{route('admin.delete.notification',$event->id)}}"><i class="fa fa-trash text-danger"></i>Xóa</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer"></div>
  </div>
</div>
@endsection
