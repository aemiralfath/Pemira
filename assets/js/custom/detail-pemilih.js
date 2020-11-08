var currUrl = window.location.href.split('/');
currUrl.pop();
var globalUrl = currUrl.join('/');

console.log(globalUrl);

$('#copyCode').click(function() {
    $('#code').select();
    document.execCommand('copy');
    alert("Copied the text : "+$('#code').val());
});

$('#copyLink').click(function() {
    $('#link').select();
    document.execCommand('copy');
    alert("Copied the text : "+$('#link').val());
});

$('#generateCode').click(function(){
        var nim_user = $('#nim').val();
        $.ajax({
            type: 'POST',
            url: globalUrl+'/generateCode',
            dataType: 'JSON',
            data: {nim:nim_user},
            success: function(data) {
                if(data.status == 'success') {
                    $('#code').val(data.key);
                }
            }
        })
    }
)