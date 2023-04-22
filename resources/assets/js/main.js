function confirmDelete(event, that) {
    event.preventDefault();
    href = $(that).attr('href');

    if (confirm('¿Está seguro que desea eliminar?')) {
        window.location.href = href;
    }
}

$(document).ready(function () {
    $('[name=origin]').change(function () {
        origin = $('[name=origin]').val();
        destination = $('[name=destination]').val();
        $('[name=name]').val(origin + ' x ' + destination);
    });

    $('[name=destination]').change(function () {
        origin = $('[name=origin]').val();
        destination = $('[name=destination]').val();
        $('[name=name]').val(origin + ' x ' + destination);
    });

    $('.select2').select2();

    $('.dropdown-menu-container').hide();

    $('.dropdown-menu-select').click(function () {

        menu = $(this).attr('data-menu');

        console.log($(menu).is(':visible'));

        if ($(menu).is(':visible')) {
            $(menu).hide();
        } else {
            $(menu).show();
        }
    });

    $('[name=total_seats]').keyup(function () {
        total_seats = $(this).val();
        total_seats = parseInt(total_seats);

        design = $('[name=design]').val();

        right = design.split('-')[0];
        right = parseInt(right);        

        left = design.split('-')[1];
        left = parseInt(left);

        html = '<table>';

        iterations = total_seats / (right+left);
        residue = iterations % 1;

        for (i = 0; i <= iterations - 1; i++) {
            html = html + '<tr>';

            for (j = 0; j <= left - 1; j++) {
                html = html + '<td><img src="/resources/assets/img/seat.png"></td>';
            }

            html = html + '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';

            for (k = 0; k <= right - 1; k++) {
                html = html + '<td><img src="/resources/assets/img/seat.png"></td>';
            }

            html = html + '</tr>';
        }

        if (residue) {
            iterations = residue * (right+left);
            html = html + '<tr>';

            if (iterations <= left) {
                for (i = 0; i <= iterations - 1; i++) {
                    html = html + '<td><img src="/resources/assets/img/seat.png"></td>';
                }
            }

            if (iterations > left) {
                for (i = 0; i <= left - 1; i++) {
                    html = html + '<td><img src="/resources/assets/img/seat.png"></td>';
                }

                html = html + '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';

                for (i = 0; i <= (iterations - left) - 1; i++) {
                    html = html + '<td><img src="/resources/assets/img/seat.png"></td>';
                }
            }

            html = html + '</tr>';
        }

        seats = '';

        for (i = 1; i <= total_seats; i++) {
            seats = seats + i + ',';
        }

        $('[name=seats_number]').val(seats.substring(0, seats.length - 1));

        html = html + '</table>';

        $('.design').html(html);
    });
});