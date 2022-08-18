var global_name = "";

    global_name = $("#global-name").text();
    
    // On load Toast
    setTimeout(function () {
        toastr['success'](
        'You have successfully logged in to Buggbear. Now you can start to explore!',
        '👋 Welcome ' + global_name,
        {
            closeButton: true,
            tapToDismiss: false,
        }
        );
    }, 2000);