function confirmDelete(event, that) {
    event.preventDefault();
    href = $(that).attr('href');

    if (confirm('¿Está seguro que desea eliminar?')) {
        window.location.href = href;
    }
}