

function sendAjax(url, data ={}){
    $.ajax({
        method: 'post',
        url: url,
        data: data,
        dataType: 'json',
        cache: false,
        async: false,
        success: function(response){
            res = response
        },
        error: function(error){
            res = error
        }
    })
    return res
}

function getAjax(url){
    $.ajax({
        type: 'get',
        url: url,
        cache: false,
        async: false,
        dataType: 'json',
        success: function(response){
            res = response
        },
        error: function(error){
            res = error
        }
    })
    return res
}

function swal(title = '', icon = 'success'){
    Swal.fire({
    position: 'top-end',
    icon: icon,
    title: title,
    showConfirmButton: false,
    timer: 1500
    })
}

function toast(title, icon = 'success', iconColor = 'green'){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: iconColor,
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
      })
      Toast.fire({
        icon: icon,
        title: title
      })
}

function newForm(url, data){
    $.ajax({
        method: 'post',
        data: data,
        url: url,
        dataType: 'json',
        async: false,
        cache: false,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function(response){
            res = response
        },
        error: function(err){
            res = err
        }
    })
    return res
}

const server1 = (url, data) => {
    var res = null;
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        async: false,
        processData: false,
        contentType: false,
        beforeSend: function () {
        },
        success: function (data) {
            res = JSON.parse(data);
        },
        error: function (xhr) {
            ERROR();
        },
    });
    return res;
}