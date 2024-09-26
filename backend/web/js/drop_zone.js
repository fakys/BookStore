$(document).ready(function (){
    if($('.admin-drop-zone-image').attr('src')){
        $('.admin-drop-zone-content').addClass('d-none')
        $('.admin-close-drop-zone').addClass('d-flex')
    }

    $('.admin-drop-zone').each(function () {
        let input_drop_zone = $('.photo-input');
        let drop_zone = $('.admin-drop-zone');

        function load_photo_drop_zone(file) {
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    let file_name = file.name
                    if (file_name.length >= 20) {
                        file_name = file_name.substring(0, 20) + "...";
                    }
                    $('.name-image-drop-zone').text(file_name)
                    $('.admin-drop-zone-content').addClass('d-none')
                    $('.admin-close-drop-zone').addClass('d-flex')
                    $('.admin-drop-zone-image').attr('src', e.target.result).show();
                };

                reader.readAsDataURL(file);
            }
        }

        input_drop_zone.on('change', function () {
            let file = $(this).prop('files')[0];
            load_photo_drop_zone(file)
        })
        $('.admin-close-drop-zone').on('click', function () {
            $('.admin-drop-zone-content').removeClass('d-none')
            $('.admin-close-drop-zone').removeClass('d-flex')
            $('.admin-drop-zone-image').attr('src', '').show();
            input_drop_zone.val('')
            $('.name-image-drop-zone').text('')
        })
        drop_zone.on('dragover', function (event) {
            event.preventDefault();
            drop_zone.addClass('dragover');
        });
        drop_zone.on('dragleave', function (event) {
            event.preventDefault();
            drop_zone.removeClass('dragover');
        });
        drop_zone.on('drop', function (event) {
            event.preventDefault();
            event.stopPropagation();
            drop_zone.removeClass('dragover');
            let file = event.originalEvent.dataTransfer.files;
            input_drop_zone.prop('files', file);
            load_photo_drop_zone(file[0])
        })
    })
})
