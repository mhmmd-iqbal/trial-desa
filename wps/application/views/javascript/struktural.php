<script type="text/javascript">

$(document).ready(function() {
  $('#struktural').addClass('active')
  $('#struktural-list').removeClass('nav-treeview')

  showData()

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

  $.ajax({
    url: siteurl+'index.php/api/ApiStruktural/optionJabatan',
    type: 'GET',
    dataType: 'JSON',
    success: function(res){
      $('.select-plugin-id').select2({
        placeholder: 'Pilih Jenis Jabatan...',
        width: '100%',
        theme: "bootstrap",
        data : res
      });
    }
  })

  $('.select-plugin-agama').select2({
    placeholder: 'Pilih Agama...',
    width: '100%',
    theme: "bootstrap",
  });

  $('.select-plugin-anggota').select2({
    placeholder: 'Status Keaktifan Anggota...',
    width: '100%',
    theme: "bootstrap",
  });

});

$('#simpan').on('click', function(event) {
  $('#submit-form').trigger('submit');
  return false
});

$('#submit-form').on('submit', function(event) {
  event.preventDefault();
  let jabatan = $('#jabatan').val()
  let nama = $('input[name="nama"]').val()
  let nip = $('input[name="nip"]').val()
  if((jabatan === null) || (nama === '') || (nip === '')){
    notif("Nama, Jabatan dan NIP tidak boleh kosong!", " ", "warning")
  }else{
    $.ajax({
      url         : siteurl+"index.php/api/ApiStruktural/simpanData",
      type        : "POST",
      data        : new FormData(this),
      contentType : false,
      cache       : false,
      processData : false,
      beforeSend  : function(){
        loading()
        $('#simpan').attr('disabled', true);
      },
      success     : function(res){
        var json = JSON.parse(res);
        if(json.err === true){
          $('#simpan').attr('disabled', false);
          return notif(json.header, json.msg, json.icon)
        }
        // toaster(json.header, json.msg, json.icon)    
        notif(json.header, json.msg, json.icon)
        window.location.href =siteurl+'Struktural'
        // setTimeout(function(){
        //   window.location.href =siteurl+'Struktural'
        // }, 1500);
      }
    })
  }
});

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
            "url": siteurl+"index.php/api/ApiStruktural/getStrukturals",
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

$('#table').on('click', '.detail', function(event) {
  event.preventDefault();
  let id = $(this).attr('value')
  window.location.href = siteurl+'Struktural/detail/'+id
});

//detail dan update data
$('#edit').on('click',  function() {
  $('.update').attr('hidden', false)
  $('.detail').attr('hidden', true)
  $('select').attr('disabled', false)
  $('input[type=radio]').attr('disabled', false)
  $('input[type=file]').attr('disabled', false)
  $('.change').attr('readonly', false)
  $('.select-plugin-id').val($('#id-jabatan').val()).trigger("change");
  $('.select-plugin-agama').val($('#agama').val()).trigger("change");
  $('.select-plugin-anggota').val($('#statusAnggota').val()).trigger("change");
});

$('#reset').on('click',  function() {
  $('.update').attr('hidden', true)
  $('.detail').attr('hidden', false);
  $('select').attr('disabled', true)
  $('input[type=radio]').attr('disabled', true)
  $('input[type=file]').attr('disabled', false)
  $('.change').attr('readonly', true)
  $('#submit-form').trigger('reset');
});


$('#update').on('click', function(event) {
  $('#submit-update-form').trigger('submit');
  return false
});

$('#submit-update-form').on('submit', function(event) {
  event.preventDefault();
  let id = $('#id').val()
  let jabatan = $('#jabatan').val()
  let nama = $('input[name="nama"]').val()
  let nip = $('input[name="nip"]').val()
  if((jabatan === null) || (nama === '') || (nip === '')){
    notif("Nama, Jabatan dan NIP tidak boleh kosong!", " ", "warning")
  }else{
    $.ajax({
      url         : siteurl+"index.php/api/ApiStruktural/updateData/"+id,
      type        : "POST",
      data        : new FormData(this),
      contentType : false,
      cache       : false,
      processData : false,
      beforeSend  : function(){
        loading()
        $('#simpan').attr('disabled', true);
      },
      success     : function(res){
        var json = JSON.parse(res);
        if(json.err === true){
          $('#simpan').attr('disabled', false);
          return notif(json.header, json.msg, json.icon)
        }
        notif(json.header, json.msg, json.icon)
        setTimeout(function(){
          window.location.href =siteurl+'Struktural'
        }, 1000)
      }
    })
  }
});
</script>