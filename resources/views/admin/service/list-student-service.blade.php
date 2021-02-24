@extends('admin.layout')
@section('content')
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
