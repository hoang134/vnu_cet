@extends('admin.layout')
@section('content')
<style type="text/css">
    body {
  background-color: #74EBD5;
  background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

  min-height: 100vh;
}

::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  width: 5px;
  background: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  width: 1em;
  background-color: #ddd;
  outline: 1px solid slategrey;
  border-radius: 1rem;
}

.text-small {
  font-size: 0.9rem;
}

.messages-box,
.chat-box {
  height: 510px;
  overflow-y: scroll;
}

.rounded-lg {
  border-radius: 0.5rem;
}

input::placeholder {
  font-size: 0.9rem;
  color: #999;
}
</style>

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
                    <div class="card-body msg_card_body" style="overflow: auto;height: 500px;">
                        @foreach($messengers as $messenger)
                          @if($messenger->belong == \App\Models\Messenger::BELONG_USER)
                              <div class="media w-75 mb-3"><img src="{{asset('images/1.png')}}" alt="user" width="50" class="rounded-circle">
                                <div class="media-body ml-3">
                                  <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">{{$messenger->content}}</p>
                                  </div>
                                  <p class="small text-muted">{{$messenger->created_at}}</p>
                                </div>
                              </div>
                          @else
                              <div class="media w-75 ml-auto mb-3" id="newMessenger">
                                <div class="media-body">
                                  <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">{{$messenger->content}}</p>
                                  </div>
                                  <p class="small text-muted">{{$messenger->created_at}}</p>
                                </div>
                              </div>
                          @endif
                      @endforeach
                        <div id="newMessenger">

                        </div>
                    </div>
                    <div class="">
                        <form id="Form-data" class="bg-light w-100">
                          @csrf
                          <div class="input-group">
                            <input type="text" id ="messenger" name="messenger" placeholder="Nhập tin nhắn..." aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                            <div class="input-group-append">
                              <button id="submit" data-user ="{{$user_from}}" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
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
                        location.reload();
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
