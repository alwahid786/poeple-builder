// reject user request

function rejectUserRequest(id) {

    swal({
        title: "Are you sure you want to reject this user request?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((confirmed) => {
        if (confirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: rejecUserUrl,
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {

                    if (data?.status == true) {
                        swal({
                            title: "User Request",
                            text: data?.message,
                            icon: "success",
                        })
                        .then(function() {
                            window.location.reload();
                        });
                    }

                },
                error: function (data) {
                    swal({
                        title: "Error",
                        text: data?.message,
                        icon: "error",
                    })
                    .then(function() {
                        window.location.reload();
                    });
                }

            })

        } else {
            return false;
        }
    });

}


// accept user request
function acceptUserRequest(id) {

    swal({
        title: "Are you sure you want to accept this user request?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((confirmed) => {
        if (confirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url: acceptUserUrl,
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {

                    if (data?.status == true) {
                        swal({
                            title: "User Request",
                            text: data?.message,
                            icon: "success",
                        })
                        .then(function() {
                            window.location.reload();
                        });
                    }

                },
                error: function (data) {
                    swal({
                        title: "Error",
                        text: data?.message,
                        icon: "error",
                    })
                    .then(function() {
                        window.location.reload();
                    });
                }

            })

        } else {
            return false;
        }
    });

}
