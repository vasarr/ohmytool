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
                {{--<div class="row input-round">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<textarea id="mde" class="form-control" name="description" rows="5" placeholder="TESTMDE"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row input-round">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<textarea id="mde2" class="form-control" name="description" rows="5" placeholder="TESTMDE22"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
    <link rel="stylesheet" href="/simplemde/dist/simplemde.min.css">
    <link rel="stylesheet" href="/simplemde/dist/font-awesome.min.css">
    <script src="/simplemde/dist/simplemde.min.js"></script>
    <script src="/simplemde/dist/inline-attachment.min.js"></script>
    {{--<script src="/simplemde/dist/codemirror-4.inline-attachment.min.js"></script>--}}
    <script src="/simplemde/dist/codemirror.inline-attachment.js"></script>
    <script>
        var inlineAttachmentConfig = {
            uploadUrl: "{{ route('recommend.uploadImage') }}",
            uploadFieldName: 'image',
            jsonFieldName: 'image',
            extraHeaders: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        };
        
        var simplemde = new SimpleMDE({
            element: document.getElementById("mde2"),
            spellChecker: false,
            showIcons: ["code", "table"],
        });
        inlineAttachment.editors.codemirror4.attach(simplemde.codemirror, inlineAttachmentConfig);
    </script>

    <script>

        var simplemde = new SimpleMDE({
            element: document.getElementById("mde"),
            spellChecker: false,
            showIcons: ["code", "table"],
        });

        // 拖拽图片上传
        simplemde.codemirror.on('drop', function (editor, e) {
            e.preventDefault(); // 阻止浏览器默认打开拖拽文件
            if (!e.dataTransfer && e.dataTransfer.files) {
                alert('浏览器不支持此操作');
                return;
            }
            var dataList = e.dataTransfer.files;
            console.log(dataList);
            // 处理图片批量上传
            batchUpload(dataList, e);
        });

        // 粘贴图片上传
        simplemde.codemirror.on('paste', function (editor, e) {
            if (!e.clipboardData && e.clipboardData.files) {
                alert('浏览器不支持此操作');
                return;
            }
            // console.log(e);
            console.log(e.clipboardData.items);
            var dataList = e.clipboardData.items;
            batchUpload(dataList, e);
        });

        // 处理图片批量上传
        function batchUpload(dataList, e) {
            for (let i = 0; i < dataList.length; i++) {
                if (dataList[i].type.indexOf('image') === -1) {
                    continue;
                }
                let formData = new FormData();
                if (e.type === 'paste') {
                    formData.append('image', dataList[i].getAsFile()); // 粘贴
                } else if (e.type === 'drop') {
                    formData.append('image', dataList[i]); // 拖拽
                }
                fileUpload(formData);
            }
        }

        // ajax上传图片
        function fileUpload(formData) {
            {{--formData.append('_token', '{{ csrf_token() }}');--}}
            $.ajax({
                url: '{{ route('recommend.uploadImage') }}',
                type: 'POST',
                cache: false,
                data: formData,
                dataType: 'json',
                timeout: 5000,
                processData: false,
                contentType: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    console.log(data);
                    // 将返回的图片url追加到编辑器内
                    simplemde.value(simplemde.value() + "\n ![file](" + data.url + ") \n");
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传图片出错了");
                }
            });

        }
    </script>
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

