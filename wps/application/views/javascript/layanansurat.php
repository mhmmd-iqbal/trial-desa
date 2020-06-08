<script type="text/javascript">
$(document).ready(function(){
	showData()
})

$('#tambah-kop').on('click', function(event) {
	event.preventDefault();
	$('#modal-kop').modal('toggle')
});

$("#inputFile").change(function(event) {  
    getURL(this);  
});

getURL = (input) => {    
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

$('#simpan-gambar').on('click',  function(event) {
	event.preventDefault();
	$('#upload').trigger('submit')
});

$('#upload').on('submit', function(e){
	e.preventDefault()
	$.ajax({
		url         : siteurl+"index.php/api/ApiLayananSurat/add_kop",
	    type        : "POST",
	    data        : new FormData(this),
	    contentType : false,
	    cache       : false,
	    processData : false,
	    beforeSend  : () => {
			$('#spinner').attr('hidden', false)
			$('#simpan-gambar').attr('disabled', true)
	    }, success : (res) => {
	    	$('#spinner').attr('hidden', true)
			$('#simpan-gambar').attr('disabled', false)
			let json = JSON.parse(res)
			toaster(json.header, json.msg, json.icon)
			if(json.err === false){
				$('#upload').trigger('reset')
				$('#modal-kop').modal('toggle')
				showData()
				$('#upload').trigger('reset')
			}
	    }
	})
})

showData = () => {
  var table;
  table = $('#table').DataTable({
    "orderable": false, 
    "destroy": true,
      "responsive": false,
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        
        "ajax": {
            "url": siteurl+"index.php/api/ApiLayananSurat/show_kop_surat",
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
</script>