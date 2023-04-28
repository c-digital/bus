function confirmDelete(event, that) {
    event.preventDefault();
    href = $(that).attr('href');

    if (confirm('¿Está seguro que desea eliminar?')) {
        window.location.href = href;
    }
}

$(document).ready(function () {

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
});
