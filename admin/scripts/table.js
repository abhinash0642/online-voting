var tables = '#mytable';
$('#maxrows').on('change', function () {
    $('.pagination').html('');
    var trnum = 0;
    var maxrows = $(this).val();
    console.log(maxrows);
    var totalrows = $('table tbody tr').length;
    console.log(totalrows);
    $(tables + ' tr:gt(0)').each(function () {
        trnum++;

        if (trnum > maxrows) {
            $(this).hide();

        }
        if (trnum <= maxrows) {
            $(this).show();
        }
    });

    if (totalrows > maxrows) {
        var pagenum = Math.ceil(totalrows / maxrows);
        for (var i = 1; i <= pagenum;) {
            var p = $('.pagination').append('<li data-page="' + i + '">\<span>' + i++ + ' </span>\</li>').show();
            console.log(p);
        }
    }
    $('.pagination li:first-child').addClass('active');
    $('.pagination li').on('click', function () {
        var pagenum = $(this).attr('data-page');
        var trindex = 0;
        $('.pagination li:first-child').removeClass('active');
        $(this).addClass('active');
        $(tables + ' tr:gt(0)').each(function () {
            trindex++;
            if (trindex > (maxrows + pagenum) || trindex <= ((maxrows + pagenum) - maxrows)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        })
    })
})