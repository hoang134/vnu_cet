@extends('admin.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ">Dịch vụ</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item" aria-current="page">Dịch vụ</li>
            <li class="breadcrumb-item" aria-current="page">Quản lý dịch vụ</li>
        </ol>
    </div>
    <hr class="sidebar-divider badge-light">
    <h3 class="">Danh sách dịch vụ</h3>

    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên dịch vụ</th>
            <th scope="col">Chi phí</th>
            <th scope="col">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listServices as $service)
            <tr>
                <th scope="row">{{ $service->id }}</th>
                <td>{{ $service->name }}</td>
                <td>{{ $service->fee }}</td>
                <td>
                    <div>
                        <a href="{{ route('admin.service.edit', $service->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <i class="fa fa-trash text-danger"></i>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
