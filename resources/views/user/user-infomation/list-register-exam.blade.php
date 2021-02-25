@extends('dashboard')
@section('content')
<div class="w-100">
    <h2>Các kỳ thi đã đăng ký</h2>
    <br>
    <table class="table w-100">
    	<thead>
    		<tr>
        		<th>Tên kỳ thi</th>
        		<th>Ca thi</th>
        		<th>Xác nhận</th>
        	</tr>
    	</thead>
    	<tbody>
    		@foreach($exams as $exam)
    		<tr>
    			<td>{{\Illuminate\Support\Facades\DB::table('cet_kythi')->where('MaKythi',$exam->Makythi)->first()->TenKythi}}</td>
    			<td>{{$exam->Cathi}}</td>
    			<td><a href="{{ route('student.infor.exam',$exam->id) }}">Lấy</a></td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
</div>
@endsection
