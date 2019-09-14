// LOGIN JS
let login_form_id = $('#admin-login');
let loader_html = '<div class="loader float-right hidden"><div></div><div></div><div></div><div></div></div>';

function submit_login_form() {
    let mail = $('#field-username').val();
    let pass = $('#field-password').val();

    login_form_id.append(loader_html);
    setTimeout(() => {
        login_form_id.find('.loader').removeClass('hidden')
    },100);
    $.ajax({
        type: "POST",
        url: ABSPATH + "admin/inc/class-login-xml.php",
        data: {
            'cool_username': mail,
            'scary_password': pass
        }, success: function(response) {
            login_form_id.find('.loader').remove();
            if(response.success)
                window.location.href = response.url || ABSPATH;
        }, error: function (error) {
            console.log(error)
        }
    });
}