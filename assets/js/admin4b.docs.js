function search() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputsearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("tables");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function search2() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputsearch2");
    filter = input.value.toUpperCase();
    table = document.getElementById("tables");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function search4() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputsearch3");
    filter = input.value.toUpperCase();
    table = document.getElementById("tables");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function search3() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputsearch3");
    filter = input.value.toUpperCase();
    table = document.getElementById("tables");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
jQuery(document).ready(function () {

    /*
        Form validation
    */
    $('.formzero input[type="text"], .formzero textarea').on('focus', function () {
        $(this).removeClass('input-error');
    });

    $('.formzero').on('submit', function (e) {

        $(this).find('input[type="text"], textarea').each(function () {
            if ($(this).val() == "") {
                e.preventDefault();
                $(this).addClass('input-error');
            } else {
                $(this).removeClass('input-error');
            }
        });

    });



});



$(function () {
    /*
     * Code highlight
     */
    $('pre code').each(function (i, code) {
        hljs.highlightBlock(code);
    });

    /*
     * Spinner
     */
    $('#spinner-toggle').on('click', function () {
        $('#spinner').addClass('show');

        setTimeout(function () {
            $('#spinner').removeClass('show');
        }, 3000);
    });

    /*
     * Input suggestion async
     */
    var juices = [
        'Apple, carrot, and orange',
        'Beet, carrot, ginger, and turmeric',
        'Homemade tomato juice',
        'Orange and grapefruit',
        'Pumpkin seed',
        'Spinach, lettuce, and kale',
        'Strawberry and mango',
        'Strawberry-kiwi mint'
    ];

    $('[data-toggle="suggestion"][data-async]').on('suggestion:search', function () {
        var $input = $(this);
        var $uggestion = $input.closest('.input-suggestion');
        var $list = $uggestion.find('.list-group.items');

        var filteredJuices = juices.filter(function (juice) {
            return juice.contains($input.val());
        });

        var $result = filteredJuices.map(function (juice) {
            return $('<a>')
                .attr('href', '#')
                .attr('tabindex', '-1')
                .addClass('list-group-item list-group-item-action')
                .text(juice);
        });

        $list.empty();
        $list.append($result);

        $input.suggestion('refresh');
    });

    /*
     * File manager
     */
    $('[data-toggle="file-manager"]').on('file:change', function (e, file) {
        $('#file-name').text(file.name);
        $('#file-size').text((file.size / 1024).toFixed(2) + ' KB');
        $('#is-invalid').toggleClass('d-none', !file.errors.length);
        $('#is-valid').toggleClass('d-none', !!file.errors.length);

        if (file.type.startsWith('image')) {
            $('#file-preview').attr('src', file.dataURL).removeClass('d-none');
        } else {
            $('#file-preview').removeAttr('src').addClass('d-none');
        }

        $('#file-empty').addClass('d-none');
        $('#file-data').removeClass('d-none');
    });

    /*
     * Camera
     */
    var $modalCamera = $('#modal-camera');
    var $camera = $('#camera');
    var $btnSnapshot = $('#button-snapshot');
    var $snapshotPreview = $('#snapshot-preview');

    $modalCamera
        .on('shown.bs.modal', function () {
            $camera.camera('play');
        })
        .on('hidden.bs.modal', function () {
            $camera.camera('stop');
        });

    $btnSnapshot.on('click', function () {
        $camera.camera('snapshot', {
            width: 320,
            height: 240
        });
    });

    $camera
        .on('camera:snapshot', function (e, blob) {
            $snapshotPreview.attr('src', blob.dataURL);
            $modalCamera.modal('hide');
        })
        .on('camera:notSupported', function () {
            $modalCamera.find('.modal-body').find('p').removeClass('d-none');
        });

    /*
     * Input date (displays calendar)
     */
    var $calendar = $('#calendar');
    var $btnApplyDate = $('#btnApplyDate')

    $calendar.on('show.bs.modal', function (e) {
        var $formControl = $(e.relatedTarget)
            .closest('.form-group')
            .find('.form-control');

        $btnApplyDate.prop('target', $formControl);
        $calendar.calendar('date', $formControl.prop('date') || new Date());
    });

    $btnApplyDate.on('click', function () {
        var $target = $btnApplyDate.prop('target');
        var date = $calendar.calendar('date');
        var formattedDate = moment(date).format('dddd, MMMM D, YYYY');

        $target.prop('date', date).text(formattedDate);
    });
});
