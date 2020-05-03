$(document).ready(function() {
	$(function () {
	    $('.textarea').summernote({
	    	placeholder: "Input text here...",
	    	tabsize: 2,
	        height: 300
	    })
	})

	visi()
	misi()

	dataVisi()
	dataMisi()
})

function visi(){
	$.ajax({
		url: siteurl+'index.php/api/ApiVisiMisi/getNowVisi',
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			$('#this-visi').html(res.visi)
		}
	})
}

function misi(){
	$.ajax({
		url: siteurl+'index.php/api/ApiVisiMisi/getNowMisi',
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			$('#this-misi').html(res.misi)
		}
	})
}

$('#visi-baru').on('click', function(event) {
	event.preventDefault();
	window.location.href = siteurl+"VisiMisi/add_visi"
});

$('#misi-baru').on('click', function(event) {
	event.preventDefault();
	window.location.href = siteurl+"VisiMisi/add_misi"
});

$('#home').on('click', function(event) {
	event.preventDefault();
	window.location.href = siteurl+"VisiMisi"
});

$('#simpan-visi').on('click', function(event) {
	event.preventDefault();
	let visi = $('#input-visi').val()
	$.ajax({
		url: siteurl+'index.php/api/ApiVisiMisi/addVisi',
		type: 'POST',
		dataType: 'JSON',
		data: {visi: visi},
		beforeSend: function(){
			loading()
		},
		success: function(res){
			notif(res.header, res.msg, res.icon)
			if(res.err === false){
				window.location.href = siteurl+'VisiMisi'
			}
		}
	})
});

$('#simpan-misi').on('click', function(event) {
	event.preventDefault();
	let misi = $('#input-misi').val()
	$.ajax({
		url: siteurl+'index.php/api/ApiVisiMisi/addMisi',
		type: 'POST',
		dataType: 'JSON',
		data: {misi: misi},
		beforeSend: function(){
			loading()
		},
		success: function(res){
			notif(res.header, res.msg, res.icon)
			if(res.err === false){
				window.location.href = siteurl+'VisiMisi'
			}
		}
	})
});

function dataVisi(){
	var table;
	table = $('#table-visi').DataTable({
		"orderable": false, 
		"destroy": true,
    	"responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiVisiMisi/getVisis",
            "type": "POST"
        },

        
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],

    });
}

function dataMisi(){
	var table;
	table = $('#table-misi').DataTable({
		"orderable": false, 
		"destroy": true,
    	"responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiVisiMisi/getMisis",
            "type": "POST"
        },

        
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],

    });
}

$('#table-visi').on('click', '.check', function(event) {
	event.preventDefault();
	let id = $(this).val()
	$.confirm({
		title: 'Verifikasi',
		content: 'Aktifkan Visi Ini ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'simpan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.ajax({
		        		url: siteurl+"index.php/api/ApiVisiMisi/ativeVisi/"+id,
		        		type: 'GET',
		        		dataType: 'JSON',
		        		success: function(res){
		        			notif('Visi telah diperbarui!', " ", "success")
							dataVisi()      			
							visi()
		        		}
		        	})
		        }
		    }
		}
	})
});

$('#table-misi').on('click', '.check', function(event) {
	event.preventDefault();
	let id = $(this).val()
	$.confirm({
		title: 'Verifikasi',
		content: 'Aktifkan Misi Ini ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'simpan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.ajax({
		        		url: siteurl+"index.php/api/ApiVisiMisi/ativeMisi/"+id,
		        		type: 'GET',
		        		dataType: 'JSON',
		        		success: function(res){
		        			notif('Visi telah diperbarui!', " ", "success")
							dataMisi()      			
							misi()
		        		}
		        	})
		        }
		    }
		}
	})
});