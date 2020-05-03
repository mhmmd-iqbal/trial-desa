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

$('.modal-footer').on('click', '#save', function(event) {
	event.preventDefault();
	let namaPrivilage 	= $('#nama-privilage')
	let dataAdmin 		= $('input[name=data-admin]:checked')
	let dataStruktural	= $('input[name=data-struktural]:checked')
	let dataPenduduk	= $('input[name=data-penduduk]:checked')
	let dataKategori	= $('input[name=data-kategori]:checked')
	let strukturOrg		= $('input[name=struktur-organisasi]:checked')
	let visiMisi		= $('input[name=visi-misi]:checked')
	let potensiDesa		= $('input[name=potensi-desa]:checked')
	let layananSurat	= $('input[name=layanan-surat]:checked')
	let verifikasiSurat	= $('input[name=verifikasi-surat]:checked')
	let dataAdmSurat	= $('input[name=data-adm-surat]:checked')
	let informasiUmum	= $('input[name=informasi-umum]:checked')
	let photoGaleri		= $('input[name=photo-galeri]:checked')
	let dokumen			= $('input[name=dokumen]:checked')
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
			            	url			: siteurl+'index.php/api/ApiAdmin/addPrivilage',
			            	type 		: 'POST',
			            	dataType 	: 'JSON',
			            	data 		: {
			            		namaPrivilage 	: namaPrivilage.val(),
			            		dataAdmin 	 	: dataAdmin.val(),
			            		dataStruktural 	: dataStruktural.val(),
			            		dataPenduduk 	: dataPenduduk.val(),
			            		dataKategori 	: dataKategori.val(),
			            		strukturOrg  	: strukturOrg.val(),
			            		visiMisi 		: visiMisi.val(),
			            		potensiDesa 	: potensiDesa.val(),
			            		layananSurat 	: layananSurat.val(),
			            		verifikasiSurat : verifikasiSurat.val(),
			            		dataAdmSurat 	: dataAdmSurat.val(),
			            		informasiUmum 	: informasiUmum.val(),
			            		photoGaleri 	: photoGaleri.val(),
			            		dokumen 		: dokumen.val(),
			            		// [csrfName]		: csrfHash
			            		// csfrData		: csfrData
			            	},
			            	success 	: function(res){
			            		$('#modal-id').modal('toggle')
				        		toaster(res.header, res.msg, res.icon)		
				        		showData()
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

$('#table').on('click', '.info', function(event) {
	event.preventDefault();
	const id = $(this).val()
	$('#modal-id').modal('toggle')
	$.ajax({
		url: siteurl+'index.php/api/ApiAdmin/getPrivilage/'+id,
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			$('#nama-privilage').val(res.priviName)
			$('input[name=data-admin][value='+res.m1m1+']').prop("checked",true)
			$('input[name=data-struktural][value='+res.m1m2+']').prop("checked",true)
			$('input[name=data-penduduk][value='+res.m1m3+']').prop("checked",true)
			$('input[name=data-kategori][value='+res.m1m4+']').prop("checked",true)
			$('input[name=struktur-organisasi][value='+res.m2m1+']').prop("checked",true)
			$('input[name=visi-misi][value='+res.m2m2+']').prop("checked",true)
			$('input[name=potensi-desa][value='+res.m2m3+']').prop("checked",true)
			$('input[name=layanan-surat][value='+res.m3m1+']').prop("checked",true)
			$('input[name=verifikasi-surat][value='+res.m3m2+']').prop("checked",true)
			$('input[name=data-adm-surat][value='+res.m3m3+']').prop("checked",true)
			$('input[name=informasi-umum][value='+res.m4m1+']').prop("checked",true)
			$('input[name=photo-galeri][value='+res.m4m2+']').prop("checked",true)
			$('input[name=dokumen][value='+res.m4m3+']').prop("checked",true)
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

