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
            'url': globalUrl+'/listPemilih'
        },
        'columns': [
            { data: 'nim' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'jurusan' },
            { data: 'angkatan' },
            {
                data: null,
                orderable: false,
                render: function(data, type, full, meta) {
                    var btn = '<a href="'+globalUrl+'/detail-pemilih'+data.nim+'" class="btn btn-flat btn-outline-dark btn-xs">Detail</a>';
                    return btn;
                }
            }
        ]
    });

    
});