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
        console.log('success');
        var images   = $('#gallery-images ul');
        var imageSrc = baseUrl + '/posts/' + response.filename;
        console.log(imageSrc);
        $(images).append('<a onclick="return confirm("Are you sure you want to delete this gallery Image?");" href=""><i class="fa fa-trash"></i></a> <img src="' + imageSrc + '"></li>');
    }
};

jQuery(document).ready(function()  {
    console.log('Document is ready');



 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      

      //alert(id);

      jQuery.ajax({
        url: '/photoget',
        type: 'POST',
        global: true,
        data: {
            id: id
        }

      }).done(function(data) {
         $('#inner-photo-form').html(data);
      }).fail(function(data) {
        alert(data);
      });
});

  $('#save-photo-edit').on('click', function(e) {
     $('.submit-photo-edit').click();
  });


  jQuery('.gallery').featherlightGallery({
      previousIcon: '<',
      nextIcon: '>',
      galleryFadeIn: 300,
      openSpeed: 300
    });



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