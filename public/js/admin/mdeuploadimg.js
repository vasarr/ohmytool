
var simplemde = new SimpleMDE({
    element: document.getElementById("content"),
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
    $.ajax({
        url: '',
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
