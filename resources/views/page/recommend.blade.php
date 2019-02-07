@extends('layouts.app')
@section('title', isset($categoryName) ? $categoryName.'列表' : '资源列表')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="recommend-tool" style="">
                <div id="tool-title">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 5px;"></span>
                    <h3 style="display: inline-block;">推荐资源</h3>
                </div>
                <form method="post">
                    <div class="row" style="display: flex; margin: 0 20px 20px 20px;">
                        <div class="col-md-3" style="margin: 0; padding: 0;">
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
                    <div class="row" style="display: flex; margin: 0 20px 20px 5px;">
                        <div class="col-md-12" ">
                        <input type=" text" class="form-control" name="url" placeholder="url路径 eg. https://www.ohmytool.net">
                    </div>
            </div>
            <div class="row" style="display: flex; margin: 0 20px 20px 5px;">
                <div class="col-md-12">
                    <textarea class="form-control" name="description" rows="5" placeholder="简要描述"></textarea>
                </div>
            </div>
            <div class="submit" style="border: 1px solid #D3E0E8; border-radius: 5px;background-color:#F8F8F9;margin: 0 30px 0 20px; padding: 20px 0 20px 0;">
                <div class="row" style="display: flex;">
                    <div class="col-md-3" style="">
                        <button id="recommend-sbmt" class="btn center-block" role="button" type="button" style="border: 1px solid red;letter-spacing:2px;color: white;background: #D51E2A;box-shadow: none;padding: 10px;">
                            <span class="glyphicon glyphicon-send" aria-hidden="true" style="margin-right: 5px;"></span>
                            <strong>提交资源</strong>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
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
                // if (!category_id) {
                //     alertInfo("请选择分类");
                //     return false;
                // }
                // if (!title) {
                //     alertInfo("请填写标题");
                //     return false;
                // }
                // if (!url) {
                //     alertInfo("请填写url地址");
                //     return false;
                // }
                // if (!description) {
                //     alertInfo("请填写简要描述");
                //     return false;
                // }
                // alert($("form").serialize());
                $.ajax({
                    type: "POST",
                    url: "{{ route('page.recommend') }}",
                    data: $("form").serialize(),
                    success: function(msg) {
                        // alert("Data Saved: " + msg);
                    }
                });
            });
        })
    </script>
@stop

