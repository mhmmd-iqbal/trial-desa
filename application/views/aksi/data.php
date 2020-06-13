<script type="text/javascript">
window.onload = function() {

	let chart_show = $('#chartContainer').data('target')
	switch (chart_show) {
		case 'jenis-kelamin':
			get_gender()
		break;
		case 'usia':
			get_age()
		break;
		default:
		break;
	}
}

function get_gender(){
	$.ajax({
		url: baseurl+'data/api_get_gender',
		type: 'GET',
		dataType: 'JSON',
		success: (res) =>{
			let arr = res.penduduk;
			let data = []
			arr.forEach( function(d, i) {
				data[i] = {
					'y' 	: d.persen.toFixed(2),
					'label' : d.jnsKlm,
				}
			});
			grafik("Data Penduduk Berdasarkan Jenis Kelamin", data)
		}
	})
}

function get_age(){
	$.ajax({
		url: baseurl+'data/api_get_age',
		type: 'GET',
		dataType: 'JSON',
		success: (res) =>{
			let arr = res.penduduk;
			let data = []
			arr.forEach( function(d, i) {
				data[i] = {
					'y' 	: d.persen.toFixed(2),
					'label' : d.keterangan,
				}
			});
			grafik("Data Penduduk Berdasarkan Rentang Usia", data)
		}
	})
}

function grafik(judul, newData){
	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		exportEnabled: true,
		animationEnabled: true,
		title: { text: judul },
		data: [{
			type: "pie",
			startAngle: 25,
			toolTipContent: "<b>{label}</b>: {y}%",
			showInLegend: "true",
			legendText: "{label}",
			indexLabelFontSize: 16,
			indexLabel: "{label} - {y}%",
			dataPoints: newData
		}]
	});
	chart.render();
}
</script>