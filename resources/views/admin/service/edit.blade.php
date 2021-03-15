@extends('admin.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Thêm dịch vụ</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page">Dịch vụ</li>
        <li class="breadcrumb-item" aria-current="page">Quản lý dịch vụ</li>
        <li class="breadcrumb-item" aria-current="page">Sửa dịch vụ</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
    <form class="mt-5" action="{{ route('admin.service.update', $service->id) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Tên dịch vụ</label>
            <div class="col-sm-8 col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="Tên dịch vụ" name="name" value="{{ $service->name }}">
                @if ($errors->has('name'))
                    <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="fee" class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-8 col-lg-6">
                <input type="number" class="form-control" id="fee" placeholder="Giá" name="fee" value="{{ $service->fee }}">
            </div>
        </div>

        <div class="field-list">
            @foreach($service->fields as $key => $field)
            <div class="field-item badge-dark mt-3" data-field-index="{{ $key }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Trường</h5>
                        <i class="delete-field fa fa-trash-alt cursor-pointer"></i>
                    </div>
                    <div class="form-group row">
                        <label for="name1" class="col-sm-2 col-form-label">Tên trường</label>
                        <div class="col-sm-8 col-lg-6">
                            <input type="text" class="form-control" id="name1" placeholder="Tên" name="fields[{{ $key }}][name]" value="{{ $field->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type1" class="col-sm-2 col-form-label">Kiểu dữ liệu</label>
                        <div class="col-sm-8 col-lg-6">
                            <select class="field-type form-control" id="type1" name="fields[{{ $key }}][type]">
                                <option {{ $field->type == 'text' ? 'selected' : '' }} value="text">Text</option>
                                <option {{ $field->type == 'number' ? 'selected' : '' }} value="number">Number</option>
                                <option {{ $field->type == 'textarea' ? 'selected' : '' }} value="textarea">Textarea</option>
                                <option {{ $field->type == 'checkbox' ? 'selected' : '' }} value="checkbox">Checkbox</option>
                                <option {{ $field->type == 'radio' ? 'selected' : '' }} value="radio">Radio</option>
                                <option {{ $field->type == 'select' ? 'selected' : '' }} value="select">Select</option>
                                <option {{ $field->type == 'file' ? 'selected' : '' }} value="file">File</option>
                                <option {{ $field->type == 'date' ? 'selected' : '' }} value="date">Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Validate</label>
                        <div class="col-sm-8 col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fields[{{ $key }}][validate]" id="validate1" value="required" {{ $field->validate == 'required' ? 'checked' : '' }}>
                                <label class="form-check-label" for="validate1">
                                    Required
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fields[{{ $key }}][validate]" id="validate2" value="option" {{ $field->validate == 'option' ? 'checked' : '' }}>
                                <label class="form-check-label" for="validate2">
                                    Option
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="show-value"> <!-- card -->
                        @if($field->value)
                            @php
                                $values = json_decode($field->value);
                            @endphp
                            <div class="card-body">
                                <h6 class="card-title">Values</h6>
                                <div class="list-value">
                                    @foreach($values as $vKey => $value)
                                        <div class="value-item form-group row" data-value-index="{{ $vKey }}">
                                            <label for="value{{ $vKey }}0" class="col-sm-2 col-form-label">Value</label>
                                            <div class="col-sm-8 col-lg-6">
                                                <input type="text" class="form-control" id="value{{ $vKey }}0" placeholder="Value" name="fields[{{ $vKey }}][values][]" value="{{ $value }}">
                                            </div>
                                            <div class="position-relative">
                                                <div class="position-absolute delete-center">
                                                    <div class="delete-value fa fa-minus-circle cursor-pointer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="add-value fa fa-plus-circle cursor-pointer"></div>
                                </div>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="add-field fa fa-plus-circle cursor-pointer"></div>
        </div>


        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('/js/admin/service/create.js') }}"></script>
@endsection
