@extends('admin.layout')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tất cả tin nhắn</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item" aria-current="page">Quản lý tin nhắn</li>
        </ol>
    </div>
    <hr class="sidebar-divider badge-light">

  <div class="row rounded-lg overflow-hidden shadow">
    <div class="col-12 px-0">
      <div class="bg-white">

        <div class="messages-box">
          <div class="list-group rounded-0">
          @foreach($listUserTos as $user)
                  @php
                      $messenger = DB::table('messengers')->orderBy('created_at','desc')->where('user_from', $user->user_from)->first();
                  @endphp
              @if($messenger->viewed == \App\Models\Messenger::NOT_SEEN)
                <a href="{{ route('admin.messengers.detail', $user->user_from) }}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                  <div class="media"><img src="{{asset('images/1.png')}}" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-4">
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0 text-dark">{{$messenger->user_from}}</h6>
                      </div>
                      <p class="font-italic text-dark mb-0 text-small">{{$messenger->content}}</p>
                    </div>
                  </div>
                </a>
              @endif
            @endforeach
          </div>
        </div>
          <div class="messages-box">
              <div class="list-group rounded-0">
                  @foreach($listUserTos as $user)
                      @php
                          $messenger = DB::table('messengers')->orderBy('created_at','desc')->where('user_from', $user->user_from)->first();
                      @endphp
                      @if($messenger->viewed == \App\Models\Messenger::SEEN)
                          <a href="{{ route('admin.messengers.detail', $user->user_from) }}" style="opacity: 0.5" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                              <div class="media"><img src="{{asset('images/1.png')}}" alt="user" width="50" class="rounded-circle">
                                  <div class="media-body ml-4">
                                      <div class="d-flex align-items-center justify-content-between mb-1">
                                          <h6 class="mb-0">

                                          {{$messenger->user_from}}
                                          </h6>
                                      </div>
                                      <p class="font-italic text-muted mb-0 text-small">{{$messenger->content}}</p>
                                  </div>
                              </div>
                          </a>
                      @endif
                  @endforeach
              </div>
          </div>

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
