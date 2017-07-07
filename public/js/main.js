/* 
    Erm Projects Main js
*/
Dropzone.options.addImages = {
    acceptedFiles: "image/*",
    maxFilesize: 8,
    uploadMultiple: false,
    createImageThumbnails: true,
    addRemoveLinks: true,

    success: function(file, response) {
        if(file.status == 'success') {
            handleDropzoneFileUpload.handleSuccess(response);
        } else {
            handleDropzoneFileUpload.handleError(response);
        }
    }
};

var handleDropzoneFileUpload = {
    handleError: function(response) {
        console.log(response);
},

    handleSuccess: function(response) {
        var images   = $('#gallery-images ul');
        var imageSrc = baseUrl + '/cars/' + response.filename;
        $(images).append('<a onclick="return confirm("Are you sure you want to delete this gallery Image?");" href=""><i class="fa fa-trash"></i></a> <img src="' + imageSrc + '"></li>');
    }
};

jQuery(document).ready(function()  {
    console.log('Document is ready');

    jQuery('#triggersubmit').on('click', function(e) {
        
    jQuery('#postsubmit').click();
        e.preventdefault();
    });

        jQuery('.dropdown-toggle').click(function() {
      jQuery('.dropdown-menu').toggle();
    });

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#mainImage').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

 $("#inputImage").change(function(){
    $('#mainImage').css('display', 'block');
    readURL(this);
 });


});