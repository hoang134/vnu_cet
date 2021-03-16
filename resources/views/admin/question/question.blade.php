@extends('admin.layout')
@section('title', 'Thêm câu hỏi')
@section('style')
    <style>
        .btn {
            margin: 5px;
        }

        .cursor-pointer {
            cursor: pointer;
        }
        label.error {
            font-size: 1rem;
            color: red;

        }
    </style>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Cập nhật thông tin trung tâm</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
            <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
        </ol>
    </div>
    <hr class="sidebar-divider badge-light">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold">Trả lời câu hỏi</h4>
            </div>
            <div class="table-responsive">
                <table id="tableQuestion" class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="d-flex align-items-center h-100 mb-2">
                                <input id="checkAll" class="form-check-input" type="checkbox">
                            </div>
                        </th>
                        <th width="13%">Người gửi</th>
                        <th width="30%">Nội dung</th>
                        <th>Loại câu hỏi</th>
                        <th>Trả lời</th>
                        <th>Thực hiện</th>
                    </tr>
                    </thead>
                </table>
                <button class="btn btn-danger delete-list">Xóa câu hỏi đã chọn</button>
                <button class="btn btn-primary list-question-type">Thay đổi loại câu hỏi đã chọn</button>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Câu hỏi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-modal">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nhập nội dung:</label>
                            <textarea class="form-control" id="recipient-name" name="question" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save-data">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal reply -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Trả lời</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-reply">
                        @csrf
                        <div class="form-group">
                            <label for="content-reply" class="col-form-label">Nhập nội dung:</label>
                            <textarea class="form-control" id="content-reply" name="reply" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-reply">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script>
        var questionReplyUrl = '{{ route('admin.question.reply', ':id') }}'
        var questionChangeTypeUrl = '{{ route('admin.question.change.type', ':id') }}'
        var questionEditTypeUrl = '{{ route('admin.question.edit', ':id') }}'
        var getQuestions = '{{ route('admin.question.data') }}'
        $(document).ready(function () {

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            var tableQuestion = $('#tableQuestion').DataTable({
                ajax: getQuestions,
                order: [],
                responsive: false,
                columnDefs: [
                    {
                        targets: [0, 1, 3, 4, 5],
                        orderable: false
                    }
                ],
                columns: [
                    {
                        data: null,
                        render: function (question) {
                            return `<input class="form-check-input checkboxes" type="checkbox" name="${question.id}">`
                        }
                    },
                    {
                        data: 'hoten'
                    },
                    {
                        data: 'content'
                    },
                    {
                        data: null,
                        render: function (question) {
                            return `<span class="badge badge-success question-type cursor-pointer" data-id="${question.id}">${question.type}</span>`
                        }
                    },
                    {
                        data: null,
                        render: function (question) {
                            return `<a class="reply" data-id="${question.id}" data-toggle="modal"
                                                   data-target="#exampleModalCenter" data-whatever="Trả lời câu hỏi">
                                                    <div class="w-100">
                                                        <p class="text-primary text-break cursor-pointer">${question.question_reply == null ? "---" : question.question_reply.content}</p>
                                                    </div>
                                    </a>`
                        }
                    },
                    {
                        data: null,
                        render: function (question) {
                            return `<button class="delete btn btn-danger" data-id="${question.id}"><i class="fa fa-trash"></button>`
                        }
                    },
                ]
            });
            let idQestion;
            $(document).on('click', '.reply', function () {
                idQestion = $(this).data('id');
                let text = $(this).text();
                text = text.trim()
                $('#content-reply').val(text);
            });

            $('.submit-reply').click(function () {
                if ($("#form-reply").valid()) {
                    $.ajax({
                    type: 'POST',
                    url: questionReplyUrl.replace(':id', idQestion),
                    data: $("#form-reply").serialize(),
                    success: function () {
                        tableQuestion.ajax.reload();
                        $('#exampleModalCenter').modal('hide');
                    }
                });
                }

            });
            $(document).on('click', ".question-type", function () {
                if (confirm("Bạn có muốn thay đổi!")) {
                    idQestion = $(this).data('id');
                    let listId = [];
                    listId.push(idQestion);
                    $.ajax({
                        type: 'POST',
                        url: questionChangeTypeUrl.replace(':id', idQestion),
                        data: {
                            listId: listId,
                        },
                        success: function () {
                            tableQuestion.ajax.reload()
                        },
                        error: function (e) {
                            toastr.error('error');
                        }
                    });
                }
            });
            $(document).on('click', ".list-question-type", function () {
                if (confirm("Bạn có muốn thay đổi!")) {
                    let listId = [];
                    $('input.checkboxes:checked').each(function () {
                        listId.push($(this).attr('name'));
                    });
                    $.ajax({
                        type: 'POST',
                        url: questionChangeTypeUrl.replace(':id', idQestion),
                        data: {
                            listId: listId,
                        },
                        success: function () {
                            tableQuestion.ajax.reload();
                            toastr.success('Thành công!')
                            $("#checkAll").prop( "checked", false );
                        },
                        error: function (e) {
                            toastr.error('error');
                        }
                    });
                }

            });
            $(document).on('click', '.content-question', function () {
                idQestion = $(this).data('id');
                let text = $(this).text()
                $('#recipient-name').val(text)
            });

            $('.save-data').click(function () {
                if ($("#form-modal").valid()) {
                    $.ajax({
                        type: 'POST',
                        url: questionEditTypeUrl.replace(':id', idQestion),
                        data: $('#form-modal').serialize(),
                        success: function () {
                            tableQuestion.ajax.reload();
                            $("#exampleModal").modal("hide");
                        }
                    });
                }

            });

            $(document).on('click', '.delete-list', function () {
                if (confirm("Bạn có muốn xóa!")) {
                    var listId = [];
                    $('input.checkboxes:checked').each(function () {
                        listId.push($(this).attr('name'));
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/admin/question/delete",
                        data: {
                            listId: listId
                        },
                        success: function (res) {
                            toastr.success('Xóa thành công!')
                            tableQuestion.ajax.reload();
                            $("#checkAll").prop( "checked", false );
                        },
                    });
                }

            });

            $(document).on('click', '.delete', function () {
                if (confirm("Bạn có muốn xóa!")) {
                    var listId = [];
                    listId.push($(this).data('id'));
                    $.ajax({
                        type: 'POST',
                        url: "/admin/question/delete",
                        data: {
                            listId: listId
                        },
                        success: function (res) {
                            toastr.success('Success!')
                            tableQuestion.ajax.reload()
                        },
                        error: function (e) {
                            toastr.error('error');
                        }
                    });
                }
            });
            //validate
            $("#form-reply").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "reply": {
                        required: true,
                    }
                },
                messages: {
                    "reply" : {
                        required: "Bạn chưa nhập nội dung"
                    }
                }
            });

            $("#form-modal").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "question": {
                        required: true,
                    }
                },
                messages: {
                    "question" : {
                        required: "Bạn chưa nhập nội dung"
                    }
                }
            });

        });

    </script>

@endsection
