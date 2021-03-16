@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Danh sách đăng ký</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page">Dịch vụ</li>
        <li class="breadcrumb-item" aria-current="page">Danh sách đăng ký</li>
    </ol>
</div>

<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Tên học sinh</th>
            <th scope="col">Tên dịch vụ</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Trang thái thanh toán</th>
            <th scope="col">Sử lý</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listStudentServices as $studentService)
            <tr>
                <td>{{$studentService->user->Hoten}}</td>
                <td>{{\App\Models\Service::find($studentService->service_id)->name}}</td>
                <td>{{$studentService->status}}</td>
                <td>{{$studentService->payment_status}}</td>
                <td>
                    <a href="{{route('admin.service.handle',$studentService->id)}}">sử lý</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
