<script type="text/javascript">
$(document).ready(function() {
	$(function () {
	    $('#paragraf-1').summernote({
	    	tabsize: 2,
	        height: 300,
			callbacks: {
		    	onKeyup: function(e) {
		      	// $("#result").html($('.description').val());
			      	console.log($('#paragraf-1').val())
					$('#paragraf-1-grt').html($('#paragraf-1').val())
			    }
			}
	    })
	})

	$(function () {
	    $('#paragraf-2').summernote({
	    	tabsize: 2,
	        height: 300,
			callbacks: {
		    onKeyup: function(e) {
		      // $("#result").html($('.description').val());
			      console.log($('#paragraf-2').val())
					$('#paragraf-2-grt').html($('#paragraf-2').val())
			    }
			}
	    })
	})

	$(function () {
	    $('#paragraf-3').summernote({
	    	tabsize: 2,
	        height: 300,
			callbacks: {
		    onKeyup: function(e) {
		      // $("#result").html($('.description').val());
		      		console.log($('#paragraf-3').val())
					$('#paragraf-3-grt').html($('#paragraf-3').val())
			    }
			}
	    })
	})
})

const date = new Date()
$('#nama-surat').on('keyup', function(event) {
	event.preventDefault();
	$('#nama-surat-grt').html($('#nama-surat').val())
});

$('#no-surat').on('keyup', function(event) {
	event.preventDefault();
	$('#no-surat-grt').html('No: ..../'+$('#no-surat').val()+'/'+Romawi(date.getMonth()+1)+'/'+date.getFullYear())
});

$('#paragraf-1').on('keyup', function(event) {
	event.preventDefault();
	$('#paragraf-1-grt').html($('#paragraf-1').val())
});

var first_list = 0
$('#add-list-1').on('click', function(){
	$('#hidden-ket-list-1').removeAttr('hidden')

	first_list++
	
	$('#list-keterangan-1').append(
		'<div class="row">'
			+'<div class="col-lg-3 pb-2">Keterangan '+first_list+'</div>'
			+'<div class="col-lg-9 pb-2"><input type="text" class="form-control first-list" data-count="'+first_list+'" id="ket1-'+first_list+'"></div>'
		+'</div>'
	)

	$('#hasil-list-1').append('<tr id="remove-list-'+first_list+'">'+
            '<td width="150px" id="hasil-list-1-'+first_list+'">keterangan</td>'+
            '<td> :</td>'+
      	'</tr>')
})

$('#list-keterangan-1').on('click', '.remove', function() {
	first_list--
	// $(this).parent().parent().remove()
});

$('#list-keterangan-1').on('keyup', '.first-list', function() {
	let id = $(this).attr('id')
	let count = $(this).data('count')
	let value = $(this).val()

	$('#hasil-list-1-'+count).html(value)
});

$('#paragraf-2').on('keyup', function(event) {
	event.preventDefault();
	$('#paragraf-2-grt').html($('#paragraf-2').val())
});

var second_list = 0
$('#add-list-2').on('click', function(){
	$('#hidden-ket-list-2').removeAttr('hidden')

	second_list++
	
	$('#list-keterangan-2').append(
		'<div class="row">'
			+'<div class="col-lg-3 pb-2">Keterangan '+second_list+'</div>'
			+'<div class="col-lg-9 pb-2"><input type="text" class="form-control second-list" data-count="'+second_list+'" id="ket2-'+second_list+'"></div>'
		+'</div>'
	)

	$('#hasil-list-2').append('<tr id="remove-list-'+second_list+'">'+
            '<td width="150px" id="hasil-list-2-'+second_list+'">keterangan</td>'+
            '<td> :</td>'+
      	'</tr>')
})

$('#list-keterangan-2').on('keyup', '.second-list', function() {
	let id = $(this).attr('id')
	let count = $(this).data('count')
	let value = $(this).val()

	$('#hasil-list-2-'+count).html(value)
});

$('#paragraf-3').on('keyup', function(event) {
	event.preventDefault();
	$('#paragraf-3-grt').html($('#paragraf-3').val())
});

function Romawi(bulan){
	switch (bulan) {
		case 1:
			return 'I'
		break;
		case 2:
			return 'II'
		break;
		case 3:
			return 'III'
		break;
		case 4:
			return 'IV'
		break;
		case 5:
			return 'V'
		break;
		case 6:
			return 'VI'
		break;
		case 7:
			return 'VII'
		break;
		case 8:
			return 'VIII'
		break;
		case 9:
			return 'IX'
		break;
		case 10:
			return 'X'
		break;
		case 11:
			return 'XI'
		break;
		case 12:
			return 'XII'
		break;
	}
}
function option(){
	$.ajax({
		url: siteurl+'index.php/api/ApiStruktural/getAllStruktural',
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			let option 	= '<option value="" data-nip="" data-nama="" selected="" disabled=""></option>'
			$.each(res, function(i, d) {
				option += '<option value="'+d.id+'" data-nip="'+d.nip+'" data-nama="'+d.nama+'" data-jabatan="'+d.jabatan+'" >'+d.nama+'</option>'
			});
			$('#penjabat').html(option)
		}
	})
}

option()


$('.select-plugin-penjabat').select2({
	placeholder: 'Pilih Penjabat Yang Berwenang...',
	width: '100%',
	theme: "bootstrap",
});

$('#penjabat').on('change', function(event) {
	event.preventDefault();
	var $option = $(this).find(':selected');
    var nip 	= $option.data('nip');
    var nama 	= $option.data('nama');
    var jabatan = $option.data('jabatan');
    $('#jabatan').html(jabatan)
    $('#nama-penjabat').html(nama)
    $('#nip').html(nip)
});

$('#simpan').on('click', function(){
	let nm_surat = $('#nama-surat').val()
	let no_surat = $('#no-surat').val()
	let idJabatan = $('#penjabat').val()
	let paragraf1 = $('#paragraf-1').val()
	let paragraf2 = $('#paragraf-2').val()
	let paragraf3 = $('#paragraf-3').val()
	let ket1 	= []
	let ket2 	= []
	if(first_list > 0){
		for(let i = 1; i <= first_list; i++){
			ket1[i-1] = $('#ket1-'+i).val()
		}
	}
	if(second_list > 0){
		for(let i = 1; i <= second_list; i++){
			ket2[i-1] = $('#ket2-'+i).val()
		}
	}
	$.ajax({
		url: siteurl+'index.php/api/ApiSurat/addSurat',
		type: 'POST',
		dataType: 'JSON',
		data: {
			nm_surat: nm_surat,
			no_surat: no_surat,
			idJabatan: idJabatan,
			paragraf1: paragraf1,
			paragraf2: paragraf2,
			paragraf3: paragraf3,
			ket1: ket1,
			ket2: ket2,
		},
		beforeSend: function(){
			loading()
		},
		success: function(res){
			notif(res.header, res.msg, res.icon)
	        window.location.href =siteurl+'LayananSurat'
		}
	})
})
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
            "url": siteurl+"index.php/api/ApiSurat/getSurats",
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

$('#table').on('click', '.info', function(event) {
	event.preventDefault();
	let value = $(this).val()
	$.ajax({
		url: siteurl+'index.php/api/ApiSurat/infoSurat/'+value,
		type: 'GET',
		dataType: 'JSON',
		success: function(res){
			if(res){
				console.log(res)
				$('#head').html(res.nmSurat)
				$('#no-surat-grt').html('No: ..../'+res.noSurat+'/'+Romawi(date.getMonth()+1)+'/'+date.getFullYear())
				$('#paragraf-1-grt').html(res.paragraf1)
				$.each(res.list1, function(i, d) {
					$('#hasil-list-1').append('<tr id="">'+
			            '<td width="150px" id="">'+d.keterangan+'</td>'+
			            '<td> :</td>'+
			      	'</tr>')					
				});
				$('#paragraf-2-grt').html(res.paragraf2)
				$.each(res.list2, function(i, d) {
					$('#hasil-list-2').append('<tr id="">'+
			            '<td width="150px" id="">'+d.keterangan+'</td>'+
			            '<td> :</td>'+
			      	'</tr>')					
				});
				$('#paragraf-3-grt').html(res.paragraf3)
				$('#jabatan').html(res.jabatan)
			    $('#nama-penjabat').html(res.nama)
			    $('#nip').html(res.nip)
				$('#modal-info').modal('toggle')
			}
		}		
	})
});
</script>