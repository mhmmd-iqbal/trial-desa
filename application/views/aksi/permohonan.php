<script type="text/javascript">
	const n_list1 = $('#list1').val()
	const n_list2 = $('#list2').val()

	$('.pagination').on('click', function(event) {
		event.preventDefault();
		let halaman = $(this).data('target')
		$.ajax({
			url: siteurl+'surat/post_halaman',
			type: 'POST',
			dataType: 'JSON',
			data: {halaman: halaman},
			success: function(res){
				window.location.href = siteurl+'surat'
			}
		})
	});

	$('.list1').on('keyup', function(event) {
		event.preventDefault();
		let target = $(this).data('target')
		$('#hasil-list1-'+target).html($(this).val())
	});	

	$('.list2').on('keyup', function(event) {
		event.preventDefault();
		let target = $(this).data('target')
		$('#hasil-list2-'+target).html($(this).val())
	});	

	$('#preview').on('click', function() {
		$('#modal-id').modal('toggle')	
	});

	$('#cek-nik').on('click', function() {
		let nik 	 = $('#nik').val()
		if(nik !== ''){
			$.ajax({
				url: '<?=$url?>index.php/main/MainApi/cekAdmin/'+nik,
				type: 'GET',
				dataType: 'JSON',
				success: (res) => {
					if(res.err === false){
						$('#hidden').prop('hidden', false)
					}else{
						notif('Data Tidak Ditemukan', 'Harap Melapor Pada Admin', 'warning')
						$('#hidden').prop('hidden', true)
					}
				},error: () => {
					notif('Internal Error', 'Internal Error Due Ajax Call', 'error')
				}
			})
		}
	});
</script>