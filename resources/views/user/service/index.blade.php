@extends('dashboard')
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Dịch vụ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach($listServices as $service)
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-home-tab{{ $service->id }}" data-toggle="pill" href="#v-pills-home{{ $service->id }}" role="tab" aria-controls="v-pills-home{{ $service->id }}" aria-selected="true">{{ $service->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    @foreach($listServices as $service)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="v-pills-home{{ $service->id }}" role="tabpanel" aria-labelledby="v-pills-home-tab{{ $service->id }}">
                                            <form action="{{ route('student.requite.service', $service->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @foreach($service->fields as $field)
                                                    <div class="form-group row">
                                                        <label for="field{{ $field->id }}" class="col-sm-2 col-form-label">{{ $field->name }}</label>
                                                        <div class="col-sm-10">
                                                            @if($field->type == 'text' || $field->type == 'number' || $field->type == 'file')
                                                                <input type="{{ $field->type }}" name="fields[{{ $field->id }}]" class="form-control{{ $field->type == 'file' ? '-file' : '' }}" id="field{{ $field->id }}" placeholder="{{ $field->name }}">
                                                            @elseif($field->type == 'textarea')
                                                                <textarea class="form-control" name="fields[{{ $field->id }}]" id="field{{ $field->id }}" rows="3"></textarea>
                                                            @elseif($field->type == 'checkbox' || $field->type == 'radio')
                                                                @php
                                                                    $values = json_decode($field->value);
                                                                @endphp
                                                                @foreach($values as $key => $value)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="{{ $field->type }}" name="fields[{{ $field->id }}]" value="{{ $value }}" id="{{ 'value' . $service->id . $field->id . $key }}">
                                                                        <label class="form-check-label" for="{{ 'value' . $service->id . $field->id . $key }}">
                                                                            {{ $value }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @elseif($field->type == 'select')
                                                                @php
                                                                    $values = json_decode($field->value);
                                                                @endphp
                                                                <select class="form-control" name="fields[{{ $field->id }}]" id="field{{ $field->id }}">
                                                                    @foreach($values as $value)
                                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            @elseif($field->type == 'date')
                                                                <input type="text" name="fields[{{ $field->id }}]" class="form-control" id="field{{ $field->id }}" placeholder="{{ $field->name }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="d-flex justify-content mb-5">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="blog-sidebar">
                    <div class="recent-post">
                    <h4>Trang liên kết</h4>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="http://tracuu.dgnl.edu.vn/" class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/CET_KTHP chung.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                                <a class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/CET_tracuuthongtin_0.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                                <a class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/CET_DKDT_1.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                                <a class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/CET_tracuudangkyduthi_0.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                                <a href="http://diemthi.dgnl.edu.vn/" class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/CET_TracuuDiemthi_0.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                                <a class="l">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('images/cetdky/khaosatykiensinhvien.png')}}" alt="" class="img-fluid float-left">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="http://facebook.com" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script></script>
@endsection