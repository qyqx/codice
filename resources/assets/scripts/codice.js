String.prototype.ucfirst = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

bootbox.setLocale(codiceLang['languageCode']);

// Operations performed on each page of notes
function codicePrepare() {
    $('span[data-toggle="tooltip"]').tooltip();

    // Links with client-side confirmation
    $('a[data-confirm]').on('click', function (e) {
        e.preventDefault();

        var langKey = 'confirm' + $(this).data('confirm').ucfirst();
        var location = $(this).attr('href');

        bootbox.confirm(codiceLang[langKey], function(result) {
            if (result) {
                window.location.replace(location);
            }
        });
    });
}

// Call codicePrepare() on first page
codicePrepare();

var $navSearchLabel = $('.nav-search-label');
var $navSearchForm = $('.navbar-form');
$navSearchLabel.on('click', function () {
    $navSearchLabel.addClass('hidden');
    $navSearchForm.removeClass('hidden');
    $('.navbar-form input').focus();
});

$('.alert-fixed').on('click', function () {
    $(this).slideUp('slow', function () {
        $(this).remove();

    });
});

var $quickformControls = $('.quickform .row');
var $quickformContent = $('#quickform_content');

$quickformContent.on('focus', function () {
    $(this).slideDown('slow', function () {
        $quickformContent.attr('rows', '4');
        $quickformControls.removeClass('sr-only');
    });
});

var $quickformCollapseButton = $(
    '<button type="button" class="btn btn-default quickform-collapse">' +
        '<span class="sr-only">' +
            codiceLang.collapse +
        '</span>' +
        '<span class="fa fa-angle-double-up aria-hidden="true"></span>' +
    '</button>')
    .insertBefore($('.quickform-submit').removeClass('btn-block'))
    .click(function () {
        $quickformControls.addClass('sr-only');
        $quickformContent.attr('rows', 1);
    });

function codiceDatetimePicker(domSelector) {
    $(domSelector).datetimepicker({
        locale: codiceLang.languageCode,
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-arrow-up',
            down: 'fa fa-arrow-down',
            previous: 'fa fa-arrow-left',
            next: 'fa fa-arrow-right',
            clear: 'fa fa-trash-o',
            close: 'fa fa-times'
        }
    });
}

function codiceLabelSelector(domSelector) {
    $(domSelector).select2({
        placeholder: codiceLang.selectLabels,
        tags: true,
        theme: "bootstrap",
    });
}

function codiceNotesPager() {
    $('.pager').hide();
    $('.jscroll-container').jscroll({
        loadingHtml: '<i class="fa fa-spinner fa-spin"></i>',
        padding: 10,
        nextSelector: '.pager a[rel="next"]',
        contentSelector: '.jscroll-container',
        callback: function () {
            $('.pager').hide();
            codicePrepare();
        }
    });
}
