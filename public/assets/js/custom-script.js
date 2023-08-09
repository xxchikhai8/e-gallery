// Animation and Event in Sidebar
$("#CollapseBtn1").on("click", function () {
    if (!$("#CollapseBtn1").hasClass("collapsed")) {
        $("#CollapseIcon1").css('transform', 'rotate(-90deg)');
    } else {
        $("#CollapseIcon1").css('transform', 'rotate(0deg)');
    }
});

$("#CollapseBtn2").on("click", function () {
    if (!$("#CollapseBtn2").hasClass("collapsed")) {
        $("#CollapseIcon2").css('transform', 'rotate(-90deg)');
    } else {
        $("#CollapseIcon2").css('transform', 'rotate(0deg)');
    }
});

$("#CollapseBtn3").on("click", function () {
    if (!$("#CollapseBtn3").hasClass("collapsed")) {
        $("#CollapseIcon3").css('transform', 'rotate(-90deg)');
    } else {
        $("#CollapseIcon3").css('transform', 'rotate(0deg)');
    }
});

$("#CollapseBtn4").on("click", function () {
    if (!$("#CollapseBtn4").hasClass("collapsed")) {
        $("#CollapseIcon4").css('transform', 'rotate(-90deg)');
    } else {
        $("#CollapseIcon4").css('transform', 'rotate(0deg)');
    }
});

$("#CollapseBtnUser").on("click", function () {
    if (!$("#CollapseBtnUser").hasClass("collapsed")) {
        $("#CollapseIconUser").css('transform', 'rotate(-90deg)');
    } else {
        $("#CollapseIconUser").css('transform', 'rotate(0deg)');
    }
});

$(window).on("load", function () {
    if ($("#CollapseBtn1").hasClass("collapsed")) {
        $("#CollapseIcon1").css('transform', 'rotate(0deg)');
    }
});

$(window).on('load', function () {
    $('html').css('visibility', 'visible');
});

$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-component');

$(".offcanvas-body").on("scroll", function () {
    $(".offcanvas-body").css('overflowY', 'auto');
});

// Disable when click submit
$(":submit").closest("form").submit(function () {
    $(':submit').attr('disabled', 'disabled');
});

$(document).ready(function () {
    $('#showPass').click(function () {
        if ($(this).is(':checked')) {
            $('#passwordInput').attr('type', 'text');
        }
        else {
            $('#passwordInput').attr('type', 'password');
        }
    });
});

$(window).on("load", function () {
    var footerHeight = $("footer").outerHeight(true);
    footerHeight = footerHeight + 5;
    $("body").css("padding-bottom", footerHeight + "px");
});

var fileLoaded = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var view = document.getElementById('viewImage');
        view.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
};

$('#updateAvatarModal').on('hidden.bs.modal', function () {
    $('#updateAvatarModal').find('form').trigger('reset');
    var view = document.getElementById('viewImage');
    view.src = '';
})
$('.select2').select2();
