var currUrl = window.location.href.split('/');
currUrl.pop();
var globalUrl = currUrl.join('/');

$(document).ready(function() {
    var tbdata = $('#tbdata').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'responsive': true,
        //'searching': false, // Remove default Search Control
        'ajax': {
            'url': globalUrl+'/logGenerate'
        },
        'columns': [
            { data: 'waktu' },
            { data: 'username' },
            { data: 'keterangan' },
            
        ]
    });
});