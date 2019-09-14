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
        url: ABSPATH + "admin/inc/class-module-xml.php",
        data: post_parameter,
        dataType: 'json',
        success: function(response) {
            process_ajax_ata(response);
            console.log(response);

        }
    });
}



function process_ajax_ata(response){
    document.title = response.title;
    window.history.pushState({"html":response.html,"title":response.title},"", response.url);
}

window.onpopstate = function(e){
    if(e.state){
        $('#content').html(e.state.html);
        document.title = e.state.title;
    }
};



$('.hover-list:first-child').hover(
    function(){ $(this).addClass('first-child-hover') },
    function(){ $(this).removeClass('first-child-hover') }
)


function get_form_data(form_id){
    let unindexed_array = $(form_id).serializeArray();
    let indexed_array = {};

    $.map(unindexed_array, function(n){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}


function set_active_menu_item(slug) {
    $('#admin-menu li').removeClass("active");
    $('#menu-'+slug).addClass("active");
}


function js_action_response(action, data) {
    switch (action) {
        case 'LOAD_MODULE':
            set_active_menu_item(data.slug);
        break;
    }
}

function load_xml(action, attr = false, form = false) {
    let data = { 'action': action };
    if(attr) $.extend(data, $.parseJSON(attr));
    if(form) $.extend(data, get_form_data(form));

    $.ajax({
        type: "POST",
        url: ABSPATH + "admin/inc/xml.php",
        data: data,
        success: function(response) {
            if(typeof response !== 'object')
                response = $.parseJSON(response);

            console.log(response);

            if(response.success) {
                process_ajax_ata(response);
                js_action_response(action, data);
                $(response.container).html(response.html)
            }
        }, error: function (error) {
            console.log(error);
            $('body').html(error.responseText + ' - View console for error object')
        }
    });
}

