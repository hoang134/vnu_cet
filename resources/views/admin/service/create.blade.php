@extends('admin.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Thêm dịch vụ</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page">Dịch vụ</li>
        <li class="breadcrumb-item" aria-current="page">Thêm dịch vụ</li>
    </ol>
</div>
<hr class="sidebar-divider badge-light">
    <h3 class="card-title">Tạo yêu cầu cho dịch vụ</h3>
    <form class="mt-5" action="{{ route('admin.service.save') }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Tên dịch vụ</label>
            <div class="col-sm-8 col-lg-6">
                <input type="text" class="form-control" id="name" placeholder="Tên dịch vụ" name="name">
            </div>
        </div>

        <div class="form-group row">
            <label for="fee" class="col-sm-2 col-form-label">Chi phí</label>
            <div class="col-sm-8 col-lg-6">
                <input type="number" class="form-control" id="fee" placeholder="Chi phí" name="fee">
            </div>
        </div>

        <div class="field-list mt-5">
            <div class="field-item badge-dark mt-3" data-field-index="0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Trường</h5>
                        <i class="delete-field fa fa-trash-alt cursor-pointer"></i>
                    </div>
                    <div class="form-group row">
                        <label for="name1" class="col-sm-2 col-form-label">Tên trường</label>
                        <div class="col-sm-8 col-lg-6">
                            <input type="text" class="form-control" id="name1" placeholder="Name" name="fields[0][name]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type1" class="col-sm-2 col-form-label ">Kiểu dữ liệu</label>
                        <div class="col-sm-8 col-lg-6">
                            <select class="field-type form-control" id="type1" name="fields[0][type]">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="textarea">Textarea</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio</option>
                                <option value="select">Select</option>
                                <option value="file">File</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label ">Validate</label>
                        <div class="col-sm-8 col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fields[0][validate]" id="validate1" value="required">
                                <label class="form-check-label " for="validate1">
                                    Required
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fields[0][validate]" id="validate2" value="option">
                                <label class="form-check-label " for="validate2">
                                    Option
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="show-value"> <!-- card -->
                        {{--                    <div class="card-body">--}}
                        {{--                        <h6 class="card-title ">Values</h6>--}}
                        {{--                        <div>--}}
                        {{--                            <div class="form-group row">--}}
                        {{--                                <label for="value10" class="col-sm-2 col-form-label ">Value</label>--}}
                        {{--                                <div class="col-sm-8 col-lg-6">--}}
                        {{--                                    <input type="text" class="form-control" id="value10" placeholder="Value" name="fields[0][values][]">--}}
                        {{--                                </div>--}}
                        {{--                                <div class="position-relative">--}}
                        {{--                                    <div class="position-absolute delete-center">--}}
                        {{--                                        <div class="fa fa-minus-circle cursor-pointer"></div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="form-group row">--}}
                        {{--                                <label for="value11" class="col-sm-2 col-form-label ">Value</label>--}}
                        {{--                                <div class="col-sm-8 col-lg-6">--}}
                        {{--                                    <input type="text" class="form-control" id="value11" placeholder="Value" name="fields[0][values][]">--}}
                        {{--                                </div>--}}
                        {{--                                <div class="position-relative">--}}
                        {{--                                    <div class="position-absolute delete-center">--}}
                        {{--                                        <div class="fa fa-minus-circle cursor-pointer"></div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="d-flex justify-content-center">--}}
                        {{--                            <div class="fa fa-plus-circle cursor-pointer"></div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>


                </div>
            </div>
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
    <script src="{{ asset("/js/admin/service/create.js") }}"></script>
@endsection
