jQuery(document).ready(function($){   
    jQuery(document).on('input', '.input', function(e) {
        jQuery.ajax({
            url: siteurl + "/search_ajax/search1",
            type: 'post',
            data: {  keyword: keyword },
            beforeSend: function() {
                jQuery('.datafetch').html('<div class="ph-item wowload-box"> <div class="ph-col-12"> <div class="ph-row"> <div class="ph-col-12 big"></div><div class="ph-col-6 empty"></div><div class="ph-col-6"></div><div class="ph-col-12"></div></div></div></div>');
            },
            success: function(data) {
                jQuery('.datafetch').html(data);
            }
        });
    });
});
