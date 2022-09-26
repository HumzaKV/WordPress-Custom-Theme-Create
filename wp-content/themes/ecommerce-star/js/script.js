jQuery(function($) {
    $(".loader").hide();
    $('.btn-cat').change(function() {
        $('.sub').html('');
        var cid = $('.btn-cat').val();
        $.ajax({
                type: "POST",
                dataType: "html",
                url: ajaxpost.ajax_url,
                beforeSend: function() {
                    $("#loader").show();
                    setTimeout(function() {
                        $(".loader").hide();
                    }, 2000);
                },
                // hides the loader after completion of request, whether successfull or failor.             
                complete: function() {
                    $("#loader").hide();
                },
                data: {
                    action: 'my_action_name',
                    cat_id: cid // <-- category ID of clicked item / link
                }
            })

            .done(function(data) {
                console.log(data);
                $('#sub-cat').html(data);
                $.each(data, function(i, item) {

                    if ($('.sen')) {
                        $('.sub').append('<option class="sen" value="' + item.id + '">' + item.title + '</option>');
                    } else {
                        $('.sub').html('<option class="sen" value="' + item.id + '">' + item.title + '</option>');
                    }
                });

            });
    });
    // .btn-cat

    let currentPage = 1;
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {

            currentPage++; // Do currentPage + 1, because we want to load the next page
            var count = $('.content').attr('id');
            if (currentPage <= count) {
                console.log('user is on bottom');
                $.ajax({
                    type: 'POST',
                    url: ajaxpost.ajaxurl,
                    dataType: 'html',
                    beforeSend: function() {
                        $(".loader").show();
                    },
                    data: {
                        action: 'load_more',
                        paged: currentPage,
                    },
                    success: function(res) {
                        // hides the loader after completion of request.  
                        $(".loader").hide();
                        $('.content').append(res);
                    }
                });
            }

        }
    });

  $(".dd").click(function(){
    $(this).closest(".sp").slideToggle();
  });

});
