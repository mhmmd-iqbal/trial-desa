<script type="text/javascript">
$(document).ready(function() {
	default_home()
	$('.tab').on('click', function(event) {
		event.preventDefault();
		let tab = $(this).data('value')

		switch (tab) {
			case 'visimisi':
				$('.tab-pane').hide()
				$('.tab').attr('disabled', false)
				$(this).attr('disabled', true);
				$('#visimisi').show()
				visi()
				misi()
				dataVisi()
				dataMisi()
			break;
			case 'sambutan':
				$('.tab-pane').hide()
				$('.tab').attr('disabled', false)
				$(this).attr('disabled', true);
				$('#sambutan').show()
				show_sambutan()
				show_gambar_sambutan()
			break;
			case 'logo':
				$('.tab-pane').hide()
				$('.tab').attr('disabled', false)
				$(this).attr('disabled', true);
				$('#logo').show()
				logo()
				get_logo()
			break;
			case 'alamat':
				$('.tab-pane').hide()
				$('.tab').attr('disabled', false)
				$(this).attr('disabled', true);
				$('#alamat').show()
			break;
		}
	});
	$(function () {
	    $('.textarea').summernote({
	    	placeholder: "Input text here...",
	    	tabsize: 2,
	        height: 300
	    })
	})
})



function default_home(){
	// $('#visimisi').hide();
	$('#sambutan').hide();
	$('#logo').hide();
	$('#alamat').hide();
	visi()
	misi()
	dataVisi()
	dataMisi()
}

$("#inputFile").change(function(event) {  
    getURL(this);  
});

function getURL(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#inputFile").val();
      filename = filename.substring(filename.lastIndexOf('\\')+1);
      reader.onload = function(e) {
        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);      
        $('.custom-file-label').text(filename);             
      }
      reader.readAsDataURL(input.files[0]);    
    }
}

$('#btn-gambar').on('click', function() {
	$('#modal-gambar').modal('toggle')
});

$('#btn-sambutan').on('click', function() {
	$('#modal-sambutan').modal('toggle')
});


$('#simpan-sambutan').on('click', function() {
	let sambutan = $('#sambutan').val()
	$.ajax({
		url: siteurl+'index.php/api/ApiProfileDesa/add_sambutan',
		type: 'POST',
		dataType: 'JSON',
		data: {sambutan: sambutan},
		success: function(res){
			$('#modal-sambutan').modal('toggle')
			$('#sambutan').val('')
			show_sambutan()
			toaster(res.header, res.msg, res.icon)
		},error: function(){
			toaster('gagal', 'Internal Error Found !', 'error')	
		}
	})
});

 show_gambar_sambutan = () => {
	$.ajax({
		url: siteurl+'index.php/api/ApiProfileDesa/get_gambar_sambutan',
		type: 'GET',
		dataType: 'JSON',
		success : (res) => {
			$('#gambar').prop('src', baseurl+'assets/upload/gambar/'+res.gambar)
			$('#imgView').prop('src', baseurl+'assets/upload/gambar/'+res.gambar)
		}
	})	
}

function show_sambutan(){
	$.ajax({
		url: siteurl+'index.php/api/ApiProfileDesa/show_sambutan',
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			if(res){
				$('#show_sambutan').html(res.sambutan)
			}
		}
	})		
}

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
	window.location.href = siteurl+"ProfileDesa/add_visi"
});

$('#misi-baru').on('click', function(event) {
	event.preventDefault();
	window.location.href = siteurl+"ProfileDesa/add_misi"
});

$('#home').on('click', function(event) {
	event.preventDefault();
	window.location.href = siteurl+"ProfileDesa"
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



$('#simpan-gambar').on('click', function() {
	$('#upload').trigger('submit')
});

$('#batal').on('click', function(event) {
	event.preventDefault();
	$('#upload').trigger('reset')
    $('.custom-file-label').text('');             
});

$('#upload').on('submit', function(event) {
	event.preventDefault();
	$.ajax({
		url         : siteurl+"index.php/api/ApiProfileDesa/gambar_sambutan",
	    type        : "POST",
	    data        : new FormData(this),
	    contentType : false,
	    cache       : false,
	    processData : false,
	    beforeSend  : () => {
	    	$('#spinner').attr('hidden', false)
	    	$('#simpan-gambar').attr('disabled', true)
	    },
	    success     : (res) => {
	        let json = JSON.parse(res);
	    	$('#spinner').attr('hidden', true)
	    	$('#simpan-gambar').attr('disabled', false)	
        	toaster(json.header, json.msg, json.icon)    
	    	if(json.err === false) {
	    		$('#modal-gambar').modal('toggle') 
		    	show_gambar_sambutan()
				$('#upload').trigger('reset')
	    	}
	    }, 
	    error: (xhr, status, error) => {
			var err = eval("(" + xhr.responseText + ")");
			console.log(err.Message);
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

$('#btn-logo').on('click', function() {
	$('#modal-logo').modal('toggle')
});

$("#inputFile2").change(function(event) {  
    getURL2(this);  
});

function getURL2(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#inputFile2").val();
      filename = filename.substring(filename.lastIndexOf('\\')+1);
      reader.onload = function(e) {
        $('#imgView2').attr('src', e.target.result);
        $('#imgView2').hide();
        $('#imgView2').fadeIn(500);      
        $('.custom-file-label').text(filename);             
      }
      reader.readAsDataURL(input.files[0]);    
    }
}

$('#batal2').on('click', function(event) {
	event.preventDefault();
	$('#upload_logo').trigger('reset')
    $('.custom-file-label').text('');             
});

$('#simpan-logo').on('click', () => {
	$('#upload-logo').trigger('submit')
});

$('#upload-logo').on('submit', function(event) {
	event.preventDefault();
	$.ajax({
		url         : siteurl+"index.php/api/ApiProfileDesa/add_logo",
	    type        : "POST",
	    data        : new FormData(this),
	    contentType : false,
	    cache       : false,
	    processData : false,
	    beforeSend  : () => {
	    	$('#spinner-logo').attr('hidden', false)
	    	$('#simpan-logo').attr('disabled', true)
	    },success   : (res) => {
	    	let json = JSON.parse(res);
	    	$('#spinner-logo').attr('hidden', true)
	    	$('#simpan-logo').attr('disabled', false)
	    	toaster(json.header, json.msg, json.icon)    
	    	if(json.err === false) {
	    		$('#modal-logo').modal('toggle') 
				$('#upload-logo').trigger('reset')
				logo()
	    	}
	    } 
	})	
});

logo = () => {
	var table;
	table = $('#table-logo').DataTable({
		"orderable": false, 
		"destroy": true,
    	"responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiProfileDesa/getLogo",
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

$('#table-logo').on('click', '.show_logo', function(event) {
	event.preventDefault();
	let logo_name = $(this).data('value')
	$('#modal-show-logo').modal('toggle')
	$('#modal-detail-show-logo').prop('src', baseurl+'assets/upload/logo/'+logo_name)
});

$('#table-logo').on('click', '.on', function(event) {
	event.preventDefault();
	let id = $(this).attr('value')
	$.ajax({
		url: siteurl+'api/ApiProfileDesa/select_logo/'+id,
		type: 'GET',
		dataType: 'JSON',
		success : (res) => {
			logo()
			get_logo()
	    	toaster(res.header, res.msg, res.icon)    
		}
	})
});

get_logo = () => {
	$.ajax({
		url: siteurl+'api/ApiProfileDesa/get_active_logo',
		type: 'GET',
		dataType: 'JSON',
		success : (res) => {
			$('#actived-logo').prop('src', baseurl+'assets/upload/logo/'+res.logo)
		}
	})
}
</script>