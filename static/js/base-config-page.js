jQuery(document).ready(function($){
    $(document).on('click', 'a', function(e){
        $.post('class-base-config-page.php', {fuction: 'add_images'}, function(response){
            console.log(response);
        });
    });
});