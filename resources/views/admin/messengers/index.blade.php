@extends('admin.layout')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin trung tâm</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item" aria-current="page">Quản lý tin nhắn</li>
            <li class="breadcrumb-item" aria-current="page">Quản lý tin nhắn</li>
        </ol>
    </div>
    <hr class="sidebar-divider badge-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xl-12 chat-messenger">
                <div class="card-messenger mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search-messenger">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            @foreach($listUserTos as $user)
                                <li class="active">
                                    <a href="{{ route('admin.messengers.detail', $user->user_to) }}">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{asset('images/1.png')}}">
                                            </div>
                                            <div class="user_info">
                                                @php
                                                    $messenger = DB::table('messengers')->orderBy('created_at','desc')->where('user_from', $user->user_to)->first();
                                                @endphp
                                                <span>{{$messenger->user_from}}</span>
                                                <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 30vh">{{$messenger->content}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#action_menu_btn').click(function(){
                $('.action_menu').toggle();
            });
        });
    </script>
@endsection
