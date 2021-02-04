$(function() {

  $('#works_index_more').click(function(e) {

    e.preventDefault();

    let offset = $('#portfolio_works_list .col-md-4').length;
    let limit = (typeof $(this).data('limit') !== typeof undefined && $(this).data('limit') !== false) ? $(this).data('limit') : 10;

    $.get($(this).data('url'), {
      offset,
      limit: $(this).data('limit')
    }, function(reponsePHP) {
      $('#portfolio_works_list').append(reponsePHP)
        .find('.col-md-4:nth-last-of-type(-n+' + limit + ')')
        .addClass('collapse') // Classe CSS de Bootstrap qui cache le contenu
        .fadeIn("slow");
        myvar = false;
    });

  });


      $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >
                $(document).height() - 100 &&
            myvar == false
        ) {
            myvar = true;
            $("#works_index_more").click();
        }
    });


});