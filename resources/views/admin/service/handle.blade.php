@extends('admin.layout')
@section('content')
    <div>
        <div id="printJS-form">
        <center><h3>Xác nhận điểm thi</h3></center>
        <lable>Tên học sinh:</lable>{{ $student->Hoten }} <br>
        @foreach($service->fields as $field )
            @if($field->type == 'file')
                <a href="{{ route('admin.service.download.file',$field->resultsFeld->id) }}">Tải file đính kèm</a>
            @else
                <label>{{ $field->name . " : "}}</label> <span>{{ $field->resultsFeld->content }}</span><br>
            @endif
        @endforeach
        </div>
        <button class="btn-success" type="button" onclick="printJS('printJS-form', 'html')">
            Xuất file
        </button>
    </div>
@endsection
