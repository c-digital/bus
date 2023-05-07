function confirmDelete(event, that) {
    event.preventDefault();
    href = $(that).attr('href');

    if (confirm('¿Está seguro que desea eliminar?')) {
        window.location.href = href;
    }
}

$(document).ready(function () {
    i = 0;

    if (window.location.href.indexOf('bus-type/edit')) {
        myFunction();
    }

    $('.role-create').change(function () {
        role = $(this).val();

        $('.extra').load('/users/extra/' + role, function (response, status, xhr) {
            if (status == 'error') {
                console.log(response);
            }
        });
    });

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

    $('.ChooseSeat').click(function () {
        seat = $(this).html();
        seat = seat.replace( /(<([^>]+)>)/ig, '');
        seat = seat.trim();

        price = $('[name=price]').val();

        $('[name=seat]').val(seat);
        $('#passenger-info').find('[name=amount]').val(price);

        $('#passenger-info').modal('show');
    });

    $('#passenger-ci').keyup(function () {
        ci = $(this).val();

        $.ajax({
            type: 'POST',
            url: '/customers/info',
            data: {
                ci: ci
            },
            success: function (response) {
                console.log(response);
                $('#passenger-info').find('[name=name]').val(response.name);
                $('#passenger-info').find('[name=date_birth]').val(response.date_birth);
                $('#passenger-info').find('[name=age]').val(response.age);
                $('#passenger-info').find('[name=phone]').val(response.phone);
                $('#passenger-info').find('[name=address]').val(response.address);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    });

    $('#passenger-info').find('#save').click(function () {
        seat = $('#passenger-info').find('[name=seat]').val();
        ci = $('#passenger-info').find('[name=ci]').val();
        name = $('#passenger-info').find('[name=name]').val();
        date_birth = $('#passenger-info').find('[name=date_birth]').val();
        age = $('#passenger-info').find('[name=age]').val();
        phone = $('#passenger-info').find('[name=phone]').val();
        address = $('#passenger-info').find('[name=address]').val();
        amount = $('#passenger-info').find('[name=amount]').val();

        $('.tbody-sale').append(`
            <tr>
                <td>${name}</td>
                <td>${ci}</td>
                <td>${seat}</td>
                <td>${amount}</td>

                <input type="hidden" name="tickets[${i}][seat]" value="${seat}">
                <input type="hidden" name="tickets[${i}][ci]" value="${ci}">
                <input type="hidden" name="tickets[${i}][name]" value="${name}">
                <input type="hidden" name="tickets[${i}][date_birth]" value="${date_birth}">
                <input type="hidden" name="tickets[${i}][age]" value="${age}">
                <input type="hidden" name="tickets[${i}][phone]" value="${phone}">
                <input type="hidden" name="tickets[${i}][address]" value="${address}">
                <input type="hidden" name="tickets[${i}][amount]" value="${amount}">
            </tr>
        `);

        $('#passenger-info').modal('hide');

        i++;
    });

    $('#passenger-info').on('hide.bs.modal', function () {
        $('#passenger-info').find('[name=seat]').val('');
        $('#passenger-info').find('[name=ci]').val('');
        $('#passenger-info').find('[name=name]').val('');
        $('#passenger-info').find('[name=date_birth]').val('');
        $('#passenger-info').find('[name=age]').val('');
        $('#passenger-info').find('[name=phone]').val('');
        $('#passenger-info').find('[name=address]').val('');
        $('#passenger-info').find('[name=amount]').val('');
    });

    $('[name=date_birth').change(function () {
        date = $(this).val();

        today = new Date();
        birth = new Date(date);

        age = today.getFullYear() - birth.getFullYear();
        month = today.getMonth() - birth.getMonth();

        if (month < 0 || (m === 0 && today.getDate() < birth.getDate())) {
            age--;
        }

        $('[name=age]').val(age);
    });
});
