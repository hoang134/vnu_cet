@extends('dashboard')
@section('content')
    <div style="margin-left: 100px">
       <h3>Xác nhận điểm thi</h3>
        <div>
            <form action="{{route('xacnhandiemthi.store')}}" method="post">
                @csrf
               lý do <input  name="lydo" type="text"><br>
                <h3>chọn kỳ thi</h3>
                @foreach($kyThis as $kythi)
                <input name="makythis[]" type="checkbox" value="{{$kythi}}"><label>{{\Illuminate\Support\Facades\DB::table('cet_kythi')->where('Makythi',$kythi)->first()->TenKythi}}</label>
                @endforeach
                <br>
            <button type="submit">gửi</button>
            </form>
        </div>
    </div>
@endsection
