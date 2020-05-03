<script type="text/javascript">
	$('.pagination').on('click', function(event) {
		event.preventDefault();
		let halaman = $(this).data('target')
		$.ajax({
			url: siteurl+'Welcome/post_halaman',
			type: 'POST',
			dataType: 'JSON',
			data: {halaman: halaman},
			success: function(res){
				window.location.href = siteurl
			}
		})
	});
</script>