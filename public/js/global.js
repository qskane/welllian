$.notifyDefaults({
    allow_dismiss: false,
    placement: {
        from: "top",
        align: "center"
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
