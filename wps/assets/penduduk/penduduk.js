showData()

$('.select-plugin-agama').select2({
    placeholder: 'Pilih Agama...',
    width: '100%',
    theme: "bootstrap",
});

$('#simpan').on('click', function(event) {
  $('#submit-form').trigger('submit');
  return false
});

$('#submit-form').on('submit', function(event) {
	event.preventDefault();
	let nama = $('input[name="nama"]').val()
	let nip = $('input[name="nip"]').val()
	if((nama === '') || (nip === '')){
		notif("Nama dan NIK tidak boleh kosong!", " ", "warning")
	}else{
		$.ajax({
			url         : siteurl+"index.php/api/ApiPenduduk/addPenduduk",
			type        : "POST",
			data        : new FormData(this),
			contentType : false,
			cache       : false,
			processData : false,
			beforeSend  : function(){
				loading()
		        $('#simpan').attr('disabled', true);
			},
			success		: function(res){
				var json = JSON.parse(res);
		        if(json.err === true){
			        $('#simpan').attr('disabled', false);
			        return notif(json.header, json.msg, json.icon)
		        }
		        notif(json.header, json.msg, json.icon)
		        window.location.href =siteurl+'Penduduk'
			},
			error 		: function(request, error){
		        notif("ERROR", "Terjadi Kesalahan Saat Menyimpan Data", "")
		        $('#simpan').attr('disabled', true);
		        alert(" Can't do because: " + error);
			}
		})
	}
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
            "url": siteurl+"index.php/api/ApiPenduduk/getPenduduks",
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