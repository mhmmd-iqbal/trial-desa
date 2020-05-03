$(document).ready(function() {
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
	let name 		 = $('#name').val()
	let username 	 = $('#username').val()
	let idPrivilages = $('#idPrivilages').val()
	if((name === '')||(username === '')||(idPrivilages === '')) {
		notif('Semua Field Wajib Diisi', ' ', 'warning')
	}else {
		$.ajax({
			url: siteurl+'index.php/api/ApiAdmin/addAdmin',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name 		: name,
				username 	: username,
				idPrivilages: idPrivilages
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