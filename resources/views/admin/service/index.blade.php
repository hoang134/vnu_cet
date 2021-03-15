@extends('admin.layout')
@section('style')
    <style>
        label.error {
            font-size: 1rem;
            color: red;
            display: block;

        }
    </style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ">Dịch vụ</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
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
                <td id= "serivce-name">{{ $service->name }}</td>
                <td id= "fee">{{ $service->fee }} đ
                </td>
                <td>
                    <div>
                        <a  data-toggle="modal" data-target="#exampleModal" href="">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a  class="m-2" href="{{ route('admin.service.detail', $service->id) }}">
                            <i class="fa fa-window-restore"></i>
                        </a>
                        <a class="m-2" onclick="return confirm('Bạn chắc chắn muốn xóa')" href="{{ route('admin.service.delete',$service->id) }} ">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    modal--}}
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Dịch vụ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-modal">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">Tên dịch vụ : </label>
                                <input type="text" class="form-control" id="recipient-name" name="name">
                                <label for="fee" class="col-form-label">Lệ phí : </label>
                                <input type="number"class="form-control" name="fee">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary save-data" data-id = "{{ $service->id }}">Lưu</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script>
        let urlSaveEdit = '{{ route('admin.service.save.edit',':id') }}'
        $(document).ready(function () {
            $('.save-data').click(function () {
                if ($("#form-modal").valid()) {
                    let service = $('#serivce-name').text();
                    let fee = $('#fee').text();
                    fee = parseInt(fee);
                    let id = $(this).data('id');
                    console.log(id)
                    $.ajax({
                        method: "POST",
                       url:urlSaveEdit.replace(':id',id),
                        data: $('#form-modal').serialize(),
                        success: function () {
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 300);
                            toastr.success('Sửa thành công')
                        }
                    });
                }
            });

            $("#form-modal").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "name": {
                        required: true,
                    },
                    "fee": {
                        required: true,
                    }
                },
                messages: {
                    "name" : {
                        required: "Bạn chưa nhập tên câu hỏi"
                    },
                    "fee": {
                        required:"Bạn chưa nhập lệ phí"
                    }
                }
            });
        });
    </script>
@endsection
