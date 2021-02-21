<style type="text/css">
    body{
    background:#eee;    
}
.chat-list {
    padding: 0;
    font-size: .8rem;
}

.chat-list li {
    margin-bottom: 10px;
    overflow: auto;
    color: #ffffff;
}

.chat-list .chat-img {
    float: left;
    width: 48px;
}

.chat-list .chat-img img {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    width: 100%;
}

.chat-list .chat-message {
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    background: #0084FF;
    display: inline-block;
    padding: 10px 20px;
    position: relative;
}

.chat-list .chat-message:before {
    content: "";
    position: absolute;
    top: 15px;
    width: 0;
    height: 0;
}

.chat-list .chat-message h5 {
    margin: 0 0 5px 0;
    font-weight: 600;
    line-height: 100%;
    font-size: .9rem;
}

.chat-list .chat-message p {
    line-height: 18px;
    margin: 0;
    padding: 0;
}

.chat-list .chat-body {
    margin-left: 20px;
    float: left;
    width: 70%;
}

.chat-list .in .chat-message:before {
    left: -12px;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #0084FF;
}

.chat-list .out .chat-img {
    float: right;
}

.chat-list .out .chat-body {
    float: right;
    margin-right: 20px;
    text-align: right;
}

.chat-list .out .chat-message {
    background: #666b6f;
}

.chat-list .out .chat-message:before {
    right: -12px;
    border-bottom: 20px solid transparent;
    border-left: 20px solid #666b6f;
}

.card .card-header:first-child {
    -webkit-border-radius: 0.3rem 0.3rem 0 0;
    -moz-border-radius: 0.3rem 0.3rem 0 0;
    border-radius: 0.3rem 0.3rem 0 0;
}
.card .card-header {
    background: #17202b;
    border: 0;
    font-size: 1rem;
    padding: .65rem 1rem;
    position: relative;
    font-weight: 600;
    color: #ffffff;
}

.content{
    margin-top:40px;    
}
</style>
    <div class="card-body height3">
        <ul class="chat-list">
            @foreach($messengers as $messenger)
            @if($messenger->belong == \App\Models\Messenger::BELONG_ADMIN)
            <li class="in">
                <div class="chat-img">
                    <img alt="Avtar" src="{{asset('images/1.png')}}">
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
                <div class="chat-img">
                    <img alt="Avtar" src="{{asset('images/1.png')}}">
                </div>
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
        <input type="text" id="messenger" name="messenger" placeholder="Type a message..." style="width: 100%;background: #ffffff;padding: 15px 70px 15px 15px;border-radius: 0 0 15px 15px;resize: none;border-width: 1px 0 0 0;border-style: solid;border-color: #f8f8f8;color: #7a7a7a;font-weight: normal;font-size: 13px;transition: border-color 0.5s ease;">
        <div class="input-action-icon" style="width: 61px;white-space: nowrap;position: absolute;z-index: 1;top: 15px;right: 15px;text-align: right;">
            <a style="display: inline-block;margin-left: 5px;cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg></a>
            <button id="submit" type="submit" style="display: inline-block;margin-left: 5px;cursor: pointer;border: none;background: white;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
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