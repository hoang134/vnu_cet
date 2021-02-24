@extends('admin.layout')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-xl-12 chat-messenger">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="{{asset('/images/1.png')}}">
                            </div>
                            <div class="user_info">
                                <span>{{\Illuminate\Support\Facades\Auth::user()->Hoten}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        @foreach($messengers as $messenger)
                            @if($messenger->belong == \App\Models\Messenger::BELONG_USER)
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{asset('/images/1.png')}}" class="rounded-circle user_img_msg">
                                    </div>
                                    <div class="msg_cotainer">
                                    {{$messenger->content}}
                                    <!-- <span class="msg_time">{{$messenger->created_at}}</span> -->
                                    </div>
                                </div>

                            @else
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                    {{$messenger->content}}
                                    <!-- <span class="msg_time_send">{{$messenger->created_at}}</span> -->
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="{{asset('/images/1.png')}}" class="rounded-circle user_img_msg">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div id="newMessenger">

                        </div>
                    </div>
                    <div class="card-footer">
                        <form id="Form-data">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea id ="messenger" name="messenger" class="form-control type_msg" placeholder="Nhập tin nhắn..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><button id="submit" data-user ="{{$user_from}}" type="submit">gửi</button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var replyMessUrl = '{{ route('admin.messengers.reply', ':tendangnhap') }}'

        $(document).ready(function () {
            $('#submit').click(function (e) {
                e.preventDefault();
                let userFrom = $(this).data('user');
                let url = replyMessUrl.replace(':tendangnhap', userFrom)
                $.ajax({
                    type:"POST",
                    url: url,
                    data:$('#Form-data').serialize(),
                    success:function (data){
                        $('#newMessenger').append(data);
                        $('#messenger').val(' ');

                    }
                });
            });
        });

        $(document).ready(function(){
            $('#action_menu_btn').click(function(){
                $('.action_menu').toggle();
            });
        });
    </script>
@endsection
