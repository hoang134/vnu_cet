<link rel="stylesheet" type="text/css" href="{{asset('css/libs3/messenger.css')}}">

<div class="card-body height3" style="overflow: auto;height: 231px;border-radius: 20px;">
    <ul class="chat-list">
        @foreach($messengers as $messenger)
        @if($messenger->belong == \App\Models\Messenger::BELONG_ADMIN)
        <li class="in">
            <div class="chat-img">
                <img alt="Avtar" src="{{asset('images/logo.png')}}">
            </div>
            <div class="chat-body">
                <div class="chat-message">
                    <h5>Trung tâm khảo thí</h5>
                    <p>{{$messenger->content}}</p>
                </div>
            </div>
        </li>
        @else
        <li class="out">
            <div class="chat-body">
                <div class="chat-message">
                    <h5>{{Auth::user()->Hoten}}</h5>
                    <p>{{$messenger->content}}</p>
                </div>
            </div>
        </li>
        @endif
        @endforeach
        <div id="newMessenger">

        </div>
    </ul>
</div>
<form id="Form-data">
    @csrf
    <div class="chat-input" style="width: 100%;position: relative;margin-bottom: -5px;">
        <input type="" id="messenger" name="messenger" placeholder="Nhập tin nhắn..." 
        style="width: 100%;
        background: #ddd;
        padding: 15px 70px 15px 15px;
        resize: none;border-width: 1px 0 0 0;
        border-style: solid;
        border-color: #f8f8f8;
        color: #7a7a7a;
        font-weight: normal;
        font-size: 13px;
        transition: border-color 0.5s ease;">
        <div class="input-action-icon" 
        style="width: 61px;
        white-space: nowrap;
        position: absolute;
        z-index: 1;
        top: 12px;
        right: 4px;
        text-align: right;">
            <button id="submit" type="submit" style="display: inline-block;margin-left: 5px;cursor: pointer;border: none;background: #ddd;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"class="feather feather-send">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var studentMessengersReply = '{{ route('student.messengers.reply') }}'
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            let idUser =$(this).data('id');
            $.ajax({
                type:"POST",
                url: studentMessengersReply,
                data:$('#Form-data').serialize(),
                success:function (data) {
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