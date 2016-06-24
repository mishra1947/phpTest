var baseUrl = location.protocol + "//" + location.hostname;
function dialogbox(id) {
    var data = "id=" + id;
    $.ajax({
        type: 'POST',
        url: baseUrl + '/yii/login/index.php?r=registration/viewData&' + data,
        data: data,
        success: function (data) {
            $("#data-view").html(data);
        },
        error: function (data) { // if error occured
            console.log(data);
        },
        dataType: 'html'
    });
    $("#mydialog").dialog("open");
    return false;
}

function logdialogbox(id){
    var data = 'id='+id;
    $.ajax({
        type: 'POST',
        url: baseUrl + '/yii/login/index.php?r=registration/viewData&' + data,
        data: data,
        dataType: 'html',
        success: function(data){
           $('#view-log').html(data); 
        },
       error: function(data){
           console.log(data);
       } 
    });
    $("#mylogdialog").dialog("open");
    return false;
}
 