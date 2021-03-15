$(document).ready(function() {
    $('[name=jenis_surat]').change(function(){
        $.ajax({
            url : baseUrl+'pelayanan_surat/ajax_load_form/'+this.value,
            dataType: 'JSON'
        }).done(function(r) {
            $('.ajax_load_form').html(r.html);
            init_upload_btn();
        }).fail(function() {

        });
    });

    function init_upload_btn()
    {
        var uploadButton = $('.upload-btn');
        [].slice.call(uploadButton).forEach(function(elm, index){
            $(elm).on('click', function(){
                var elmFileUpload = $(this).next();
                elmFileUpload.click();
                elmFileUpload.on('change', function(){
                    uploadDocument(this);
                });
            });
        });
    }

    function uploadDocument(input){
        $.each(input.files, function (k, v){
            if (input.files[k]) {
                var fileSize = input.files[0].size;
                var fileType = input.files[0].type;
                if (fileSize >= '2000000') {
                    $(input).after('<label class="text-danger">Error !! Image size not more than 2 Mb.</label>');
                    $('#loader').hide();
                } //else {
              //       var reader = new FileReader();
              //       var formData = new FormData();
              //       reader.onload = function (e) {
              //           var data = {
              //               'document' : e.target.result,
              //               'fileType' : fileType
              //           }
              //           $.ajax({
              //               url         : baseUrl+'pelayanan_surat/unggah_dokumen',
              //               type        : "POST",
              //               dataType    : "json",
              //               data        : data
              //           }).done(function(r){
                            
              //           }).fail(function(error){

              //           }); 
              //       }
              //   }
              // reader.readAsDataURL(input.files[k]);
            }
       });
    }
});