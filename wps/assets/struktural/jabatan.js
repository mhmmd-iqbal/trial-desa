$('#add').on('click', function(event) {
	event.preventDefault();
	$('#modal-id').modal('toggle')
	$('.submit').attr('id', 'addData');

	showTime()

	setInterval(function(){
	 	showTime() 
	}, 1000);
});

function showTime(){
	let time = new Date()
	let parseTime =  time.getDate()+"/"+time.getMonth()+"/"+time.getFullYear()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds()
	return $('#time').html(parseTime)
}

$('.modal-footer').on('click', '#addData', function(event) {
	event.preventDefault();
	let jabatan = $('#jabatan').val()
	if(jabatan === ''){
		notif("Semua Field Wajib Diisi", " ", "warning")
	}else{
		$.ajax({
			url: siteurl+'index.php/api/ApiStruktural/addJabatan',
			type: 'POST',
			dataType: 'JSON',
			data: {jabatan: jabatan},
			success: function(res){
				$('input').val('')
				$('#modal-id').modal('toggle')		
				toaster(res.header, res.msg, res.icon)
				showData()
			}
		})
	}
});

showData()

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
            "url": siteurl+"index.php/api/ApiStruktural/getJabatans",
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
