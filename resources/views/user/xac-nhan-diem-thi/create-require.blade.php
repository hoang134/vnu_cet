@extends('dashboard')
@section('content')
    <div style="margin-left: 100px">
       <h3>Xác nhận điểm thi</h3>
        <div class="col-12">
            <form action="{{route('student.xacnhandiemthi.store')}}" method="post">
                @csrf
                <div class="mt-3">
                    <p class="mb-1">Lý do</p>
                    <div class="ml-4">
                        <textarea class="form-control" name="lydo" placeholder="Lý do"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <p class="mb-1">Nơi nhận</p>
                    <div class="ml-4">
                        <input class="select-place" type="radio" name="noinhan" id="noinhan1" value="{{\App\Models\CetXacNhanDiemThi::NHAN_TAI_TRUNG_TAM}}" checked>
                        <label for="noinhan1">
                            Nhận tại trung tâm
                        </label>

                        <input class="ml-3 select-place" type="radio" name="noinhan" id="noinhan2" value="{{\App\Models\CetXacNhanDiemThi::NHAN_TAI_NHA}}">
                        <label for="noinhan2">
                            Nhận tại nhà
                        </label>
                    </div>
                </div>

                <div id="address" name="address" class="mt-3" style="display: none">
                    <p class="mb-1">Địa chỉ</p>
                    <div class="ml-4">
                        <input id="address" name="address" class="form-control" type="text" placeholder="Nhập địa chỉ">
                    </div>
                </div>

                <div class="mt-3">
                    <p class="mb-1">Chọn kỳ thi</p>
                    <div class="ml-4">
                        @foreach($kyThis as $key => $kythi)
                            <input class="{{ $loop->first ? '' : 'ml-3' }}" name="makythis[]" type="checkbox" id="makythi{{ $key }}" value="{{$kythi->Makythi}}">
                            <label for="makythi{{ $key }}">{{\Illuminate\Support\Facades\DB::table('cet_kythi')->where('Makythi',$kythi->Makythi)->first()->TenKythi}}</label>
                        @endforeach
                    </div>
                </div>
                <br>
            <button type="submit">gửi</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $( document  ).ready(function() {
            $('.select-place').change(function (){
                    $('#address').toggle();
            });
        });
    </script>
@endsection
