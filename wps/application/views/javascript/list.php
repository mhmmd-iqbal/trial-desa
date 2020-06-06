$(document).ready(function() {
	$('#back').on('click', function(event) {
		event.preventDefault();
		window.location.href = siteurl+'InformasiUmum/'
	});
	$('#add').on('click', function(event) {
		event.preventDefault();
		$('#modal-id').modal('toggle')
	});

	$('#close').on('click', function(event) {
		event.preventDefault();
		$('#kategori').val('')
	});

	$('#save-data').on('click', function(event) {
		event.preventDefault();
		let kategori = $('#kategori').val()

		$.ajax({
			url: siteurl+"index.php/api/ApiInformasiUmum/add_kategori",
			type: 'POST',
			dataType: 'JSON',
			data: {kategori: kategori},
			success: function(res){
				if(res.err === false){
					$('#kategori').val('')
					$('#modal-id').modal('toggle')
					showData()
				}
				toaster(res.header, res.msg, res.icon)
			},error : function(){
				toaster('Gagal Menyimpan!', 'Internal Error', 'error')
			}
		})
	});
	showData()
})

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
            "url": siteurl+"index.php/api/ApiInformasiUmum/show_kategori",
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

