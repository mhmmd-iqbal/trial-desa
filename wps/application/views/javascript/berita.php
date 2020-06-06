<script type="text/javascript">
$(document).ready(function() {
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
</script>