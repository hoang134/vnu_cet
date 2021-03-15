@extends('admin.layout')
@section('content')
    <div>
        <div>
            <h3 style="cursor: pointer;color: #007bff" data-toggle="modal"data-target="#exampleModalCenter">Thay đổi giá dịch vụ</h3>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Tên Học Sinh</th>
                <th scope="col">Dịch vụ</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Trạng thái thực hiện</th>
                <th scope="col">Chi phí</th>
                <th scope="col">Sử lý</th>
            </tr>
            </thead>
            <tbody>
                @foreach($cet_dichvus as $cet_dichvu)
                    <tr>
                        <td>{{\Illuminate\Support\Facades\DB::table('cet_student_acc')->where('tendangnhap',$cet_dichvu->tendangnhap)->first()->Hoten}}</td>
                        <td>{{$cet_dichvu->tendichvu}}</td>
                        <td>{{$cet_dichvu->trangthaithanhtoan}}</td>
                        <td>{{$cet_dichvu->trangthaithuchien}}</td>
                        <td>{{\Illuminate\Support\Facades\DB::table('le_phi_dich_vus')->where('tendichvu',$cet_dichvu->tendichvu)->first()->phidichvu}}</td>
                        <td><a href="{{ route('admin.xacnhandiemthi.handle',['tendangnhap'=>$cet_dichvu->tendangnhap,'id'=>$cet_dichvu->dichvu_id]) }}">Sử lý</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Phí dịch vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.xacnhandiemthi.fee') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="content-reply" class="col-form-label">Nhập số tiền</label>
                            <input type="number" class="form-control" name="fee">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
