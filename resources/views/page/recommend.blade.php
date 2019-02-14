@extends('layouts.app')
@section('title', "推荐资源")

@section('content')
    <div class="row recommend-tool vasar">
        <div class="col-md-12">
            <div id="tool-title">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 5px;"></span>
                <h3 style="display: inline-block;">推荐资源</h3>
            </div>
            <form method="post">
                <div class="row input-round">
                    <div class="col-md-3">
                        <select class="form-control" name="category_id">
                            <option value="">请选择分类</option>
                            <option value="2">在线文档</option>
                            <option value="5">推荐博客</option>
                            <option value="8">常用工具</option>
                            <option value="12">推荐文章</option>
                            <option value="6">学习英语</option>
                            <option value="9">推荐软件</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="title" placeholder="标题">
                    </div>
                </div>
                <div class="row input-round">
                    <div class="col-md-12">
                        <input type=" text" class="form-control" name="url" placeholder="url路径 eg. https://www.ohmytool.net">
                    </div>
                </div>
                <div class="row input-round">
                    <div class="col-md-12">
                        <textarea class="form-control" name="description" rows="5" placeholder="简要描述"></textarea>
                    </div>
                </div>
                <div class="row input-round">
                    <div class="col-md-12">
                        <div style="border-radius: 5px;background-color:#F8F8F9;border: 1px solid #D3E0E8;padding: 20px 0 20px 0;">
                            <div style="margin-left: 20px;">
                                <button id="recommend-sbmt" class="btn" type="button" role="button" style="border: 1px solid red;letter-spacing:2px;color: white;background: #D51E2A;box-shadow: none;padding: 10px;">
                                    <span class="glyphicon glyphicon-send" aria-hidden="true" style="margin-right: 5px;"></span>
                                    <strong>提交资源</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function alertInfo(message) {
            swal(message, {
                buttons: false,
                timer: 2000,
            });
        }
        $(function() {
            $('#recommend-sbmt').click(function() {
                var category_id = $("select[name=category_id]").val();
                var title = $("input[name=title]").val();
                var url = $("input[name=url]").val();
                var description = $("textarea[name=description]").val();
                if (!category_id) {
                    alertInfo("请选择分类");
                    return false;
                }
                if (!title) {
                    alertInfo("请填写标题");
                    return false;
                }
                if (!url) {
                    alertInfo("请填写url地址");
                    return false;
                }
                if (!description) {
                    alertInfo("请填写简要描述");
                    return false;
                }
                // alert($("form").serialize());
                $.ajax({
                    type: "POST",
                    url: "{{ route('page.recommend') }}",
                    data: $("form").serialize(),
                    success: function(msg) {
                        swal('提交成功', '', 'success').then(() => {
                            window.location.href = '/';
                        });

                    },
                    error: function (error) {
                        console.log(error);
                        if (error.status === 422) {
                            // console.log(error.responseJSON.errors);
                            var html = '<div>';
                            $.each(error.responseJSON.errors, function (errors, value) {
                                html += value+'<br>';
                            });
                            html += '</div>';
                            swal({content: $(html)[0], icon: 'error'})
                        }
                    }
                });
            });
        })
    </script>
@stop

