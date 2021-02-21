@extends('dashboard')
@section('content')
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

                            <div class="d-flex justify-content-center mb-5">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script></script>
@endsection