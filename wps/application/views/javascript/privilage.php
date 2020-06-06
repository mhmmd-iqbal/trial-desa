<script type="text/javascript">
$('#admin').addClass('active')
$('#admin-list').removeClass('nav-treeview')
	
$(document).ready(function() {
	showData()
});

function showData(){
	var table;
	table = $('#table').DataTable({ 
		"destroy": true,
    	"responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiAdmin/getPrivilages",
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
$('#batal').on('click',  function() {
	reset_form()
});

function reset_form(){
	$('#nama-privilage').val('')
	$('input[type=radio][value=1]').prop("checked",true)
}

$('.modal-footer').on('click', '#save', function(event) {
	event.preventDefault();
	let namaPrivilage 	= $('#nama-privilage')
	let admin 			= $('input[name=admin]:checked')
	let struktural  	= $('input[name=struktural]:checked')
	let kependudukan  	= $('input[name=kependudukan]:checked')
	let profile  		= $('input[name=profile]:checked')
	let administrasi  	= $('input[name=administrasi]:checked')
	let verifikasi  	= $('input[name=verifikasi]:checked')
	let informasi  		= $('input[name=informasi]:checked')
	let opendata  		= $('input[name=opendata]:checked')

	// var csrfName = $('.txt_csrfname').attr('name'); // Value specified in $config['csrf_token_name']
  	// var csrfHash = $('.txt_csrfname').val(); // CSRF hash
	$.confirm({
		title: 'Simpan Data',
		content: 'Tambahkan Privilage ' +namaPrivilage.val()+' ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'simpan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	if (namaPrivilage.val() === '') {
		        		notif('Nama Privilage Tidak Boleh Kosong', ' ', 'error')
		        	}
		        	else{
			            $.ajax({
			            	url			: siteurl+'index.php/api/ApiAdmin/addHakAkses',
			            	type 		: 'POST',
			            	dataType 	: 'JSON',
			            	data 		: {
			            		namaPrivilage 	: namaPrivilage.val(),
				            	admin 	 		: admin.val(),
				            	struktural 	 	: struktural.val(),
				            	kependudukan 	: kependudukan.val(),
				            	profile 	 	: profile.val(),
				            	administrasi 	: administrasi.val(),
				            	verifikasi 	 	: verifikasi.val(),
				            	informasi 	 	: informasi.val(),
				            	opendata 	 	: opendata.val(),
			            		// [csrfName]		: csrfHash
			            		// csfrData		: csfrData
			            	},
			            	success 	: function(res){
			            		$('#modal-id').modal('toggle')
				        		toaster(res.header, res.msg, res.icon)	
				        		showData()
				        		reset_form()
			            	}
			            })
		        	}
		        }
		    }
		}
	});
});

$('#add').on('click', function(event) {
	event.preventDefault();
	$('#modal-id').modal('toggle')
	$('.submit')
	.prop('id', 'save')
	.html('Save Data')
	.removeAttr('value')
});

$('#table').on('click', '.on', function(event) {
	event.preventDefault();
	let value = $(this).data('value')
	$.confirm({
		title: 'Aktivasi Hak Akses',
		content: 'Aktifkan Hak Akses (Privilage) ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'simpan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.getJSON(siteurl+'index.php/api/ApiAdmin/activated/'+value, function(res){
		        		toaster(res.header, res.msg, res.icon)
		        		showData()			
		        	})
		        }
		    }
		}
	})
});

$('#table').on('click', '.off', function(event) {
	event.preventDefault();
	let value = $(this).data('value')
	$.confirm({
		title: 'Aktivasi Hak Akses',
		content: 'Aktifkan Hak Akses (Privilage) ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'simpan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.getJSON(siteurl+'index.php/api/ApiAdmin/nonactivated/'+value, function(res){
		        		toaster(res.header, res.msg, res.icon)
		        		showData()			
		        	})
		        }
		    }
		}
	})
});

$('#table').on('click', '.info', function(event) {
	event.preventDefault();
	const id = $(this).val()
	$('#modal-id').modal('toggle')
	$.ajax({
		url: siteurl+'index.php/api/ApiAdmin/getPrivilage/'+id,
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			$('#nama-privilage').val(res.accessName)
			$('input[name=admin][value='+res.admin+']').prop("checked",true)
			$('input[name=struktural][value='+res.struktural+']').prop("checked",true)
			$('input[name=kependudukan][value='+res.kependudukan+']').prop("checked",true)
			$('input[name=profile][value='+res.profile+']').prop("checked",true)
			$('input[name=administrasi][value='+res.administrasi+']').prop("checked",true)
			$('input[name=verifikasi][value='+res.verifikasi+']').prop("checked",true)
			$('input[name=informasi][value='+res.informasi+']').prop("checked",true)
			$('input[name=opendata][value='+res.opendata+']').prop("checked",true)
			$('.submit')
			.prop('id', 'update')
			.html('Update Data')
			.attr('value', res.id)
		}
	})
});

$('.modal-footer').on('click', '#update', function(event) {
	event.preventDefault();
	console.log($(this).val())
});	


</script>