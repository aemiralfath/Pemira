var currUrl = window.location.href.split('/');
currUrl.pop();
var globalUrl = currUrl.join('/');

$('#updateTimeline').click(function(){
    var status = $('#status').val();
    $.ajax({
        type: 'POST',
        url: globalUrl+'/updateTimeline',
        dataType: 'JSON',
        data: {'timeline_status':status},
        success: function(data) {
            if(data.status == 'success') {
                alert("Update Success");
            }
        }
    });
});