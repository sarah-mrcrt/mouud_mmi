// Pjax
$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');
$(document).pjax('[data-pjax-toggle] a, a[data-pjax-toggle]', '#pjax-container', { push: false});

$(document).ready(function () {
    // AUDIO
    $('body').on('click', '.chanson', function (event) {
        event.preventDefault();
        let url = $(this).attr('data-file');
        //console.log(url);
        let audio = $('#audio');
        audio[0].src = url;
        audio[0].play();
    });

    // AJAX SEARCH
    // $("#search").submit(function (e) {
    //     e.preventDefault();
    //     if ($.support.pjax)
    //         $.pjax({
    //             url: "/recherche/" + e.target.elements[0].value,
    //             container: '#pjax-container'
    //         });
    //     else
    //         window.location.href = "/recherche/" + e.target.elements[0].value;
    // });
    $('#search').submit(function (e) {
        e.preventDefault();
        document.location.href = "/recherche/" + e.target.elements[0].value;
    })

    // Quitter la modal box
    window.addEventListener('popstate', function () {
        // Au clic du bouton retour (avant)
        var $backdrop = $('.modal-backdrop');
        if ($backdrop.length) {
            $backdrop.remove();
            $('body').removeClass('modal-open');
        }
    });
    window.addEventListener('popstate', function () {
        // Au clic du bouton retour (après)
        var $modal = $('.modal');
        if ($modal.length) {
            $('.modal').remove('.show');
            $('body').removeClass('modal-open');
        }
    });

    // Notifications
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    // toastr["success"]("Test");    

    // // TEST AJAX
    // $('#testajax').click(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type:"GET",
    //         url:"/testajax",
    //         success: function(data,textStatus, jqXHR){
    //             $("#aremplir").html(data);
    //         },
    //         error: function (jqXHR,textStatus,errorThrown){

    //         }
    //     });
    // });
})

// Apercu avatar
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
