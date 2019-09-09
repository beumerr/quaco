// VIEW POST
function select_all_posts() {
    $('input:checkbox').not(this).prop('checked', this.checked);
}

// MENU / PAGES JS
function open_page(slug) {
    set_active_menu_item(slug);
    set_page_section(slug);
}
function set_page_section(slug) {
    let post_parameter = "slug="+slug;

    $.ajax({
        type: "POST",
        url: ABSPATH + "admin/inc/qc-load-xml.php",
        data: post_parameter,
        dataType: 'json',
        success: function(response) {
            process_ajax_ata(response);
            console.log(response);

        }
    });
}

function set_active_menu_item(slug) {
    $('#admin-menu li').removeClass("active");
    $('#menu-'+slug).addClass("active");
}

function process_ajax_ata(response){
    document.title = response.title;
    $('#content').html(response.html);
    window.history.pushState({"html":response.html,"title":response.title},"", response.url);
}

window.onpopstate = function(e){
    if(e.state){
        $('#content').html(e.state.html);
        document.title = e.state.title;
    }
};

// LOGIN JS
let login_form_id = $('#admin-login');
let loader_html = '<div class="loader float-right hidden"><div></div><div></div><div></div><div></div></div>';

function submit_login_form() {
    login_form_id.append(loader_html);
    setTimeout(() => {
        login_form_id.find('.loader').removeClass('hidden')
    },300);

    redirect_page();
}

function redirect_page() {
    setTimeout(() => {
        window.location.href = window.location.href+"admin.php";
    },3000);
}



