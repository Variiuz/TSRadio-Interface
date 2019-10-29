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
