$(document).on('pjax:complete', function() {
    $('a').click(function(e) {
        targetHref = $(this).prop('href');
        currentHref = window.location.href;
        if (targetHref == currentHref) {
            e.preventDefault();
        }
    })
    $("a").each(function () {
        if ($(this).is("[no-data-pjax]")) {
          $(this).removeAttr('data-pjax');
        } else {
          $(this).attr('data-pjax', 'true');
        }
    });
    $(":submit").closest("form").submit(function () {
        $(':submit').attr('disabled', 'disabled');
    });

});

