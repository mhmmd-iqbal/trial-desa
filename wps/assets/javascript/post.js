$(document).ready(function() {
	$(function () {
	    $('.textarea').summernote({
	    	placeholder: "Input post here...",
	    	tabsize: 2,
	        height: 500
	    })
	})		

	$("#inputFile").change(function(event) {  
	    getURL(this);  
	    let size = (this.files[0].size / 1024).toFixed(2)

	    if(size > 500){
			toaster('Gambar Tidak Sesuai!', 'Ukuran File '+size+' KB ', 'error')
			$('#show-alert').html('Ukuran file gambar '+size+'KB. File Tidak Diizinkan').addClass('text-danger')
	    }else{
	    	$('#show-alert').html('')
			// toaster('File Gambar Sesuai', 'Ukuran File '+size+' KB ', 'success')
	    }
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


	category()
	function category(){
		$.ajax({
		    url: siteurl+'index.php/api/ApiInformasiUmum/select_category',
		    type: 'GET',
		    dataType: 'JSON',
		    success: function(res){
		      $('.select-plugin').select2({
		        placeholder: 'Pilih Jenis Kategori...',
		        width: '100%',
		        theme: "bootstrap",
		        data : res
		      });
		    }
		})
	}

	$('#submit-form').on('submit',  function(event) {
		event.preventDefault();
		$.ajax({
			url         : siteurl+"index.php/api/ApiInformasiUmum/add_konten",
	        type        : "POST",
	        data        : new FormData(this),
	        contentType : false,
	        cache       : false,
	        processData : false,
	        success 	: function(res){
		        let json = JSON.parse(res);
	        	notif(json.header, json.msg, json.icon)
	        	if(json.err == false){
	        		setTimeout(function(){ 
				        window.location.href =siteurl+'InformasiUmum'
	        		}, 1000);
	        	}
	        },error 	: function(){
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
            "url": siteurl+"index.php/api/ApiInformasiUmum/show_konten",
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