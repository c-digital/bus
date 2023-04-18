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
});