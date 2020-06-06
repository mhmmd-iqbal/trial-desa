<script type="text/javascript">
$(document).ready(function() {
	$('#admin').addClass('active')
	$('#admin-list').removeClass('nav-treeview')
	showData()

	$.ajax({
		url: siteurl+'index.php/api/ApiAdmin/optionPrivilage',
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			$('.select-plugin').select2({
		    	placeholder: 'Pilih Jenis Privilage...',
		    	width: '100%',
		    	theme: "bootstrap",
		    	data : res
		    });
		}
	})
});

function showData(){
	var table;
	table = $('#table').DataTable({
		"orderable": false, 
		"destroy": true,
    	"responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiAdmin/getAdmins",
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
$('#simpan').on('click', function(event) {
	event.preventDefault();
	let name 		= $('#name').val()
	let username 	= $('#username').val()
	let idAccess 	= $('#idAccess').val()
	if((name === '')||(username === '')||(idAccess === '')) {
		notif('Semua Field Wajib Diisi', ' ', 'warning')
	}else {
		$.ajax({
			url: siteurl+'index.php/api/ApiAdmin/addAdmin',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name 		: name,
				username 	: username,
				idAccess 	: idAccess
			},
			success: function(res){
				$('input').val('')
				$('#modal-id').modal('toggle')		
				toaster(res.header, res.msg, res.icon)
				showData()
			}
		})
	}
});	

$('#table').on('click', '.delete', function(event) {
	event.preventDefault();
	let id =  $(this).attr('value');
	$.confirm({
		title: 'Non Aktivasi Admin',
		content: 'Hapus Admin Ini ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'lanjutkan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.getJSON(siteurl+'index.php/api/ApiAdmin/disabled_admin/'+id, function(res){
		        		toaster(res.header, res.msg, res.icon)
		        		showData()			
		        	})
		        }
		    }
		}
	})
});

$('#table').on('click', '.recovery', function(event) {
	event.preventDefault();
	let id =  $(this).attr('value');
	$.confirm({
		title: 'Aktivasi Admin',
		content: 'Aktifkan Kembali Admin Ini ?',
		buttons: {
		    batal: function () {},
		    simpan: {
		        text: 'lanjutkan',
		        btnClass: 'btn-blue',
		        keys: ['enter'],
		        action: function(){
		        	$.getJSON(siteurl+'index.php/api/ApiAdmin/recovery_admin/'+id, function(res){
		        		toaster(res.header, res.msg, res.icon)
		        		showData()			
		        	})
		        }
		    }
		}
	})
});

</script>