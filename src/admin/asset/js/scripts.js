
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

$(function(){
    var nav = $('.nav'),
        animateTime = 300,
        navLink = $('.header .top .navLink');
    navLink.click(function(){
        if(nav.height() === 0){
            autoHeightAnimate(nav, animateTime);
        } else {
            nav.stop().animate({ height: '0' }, animateTime);
        }
    });
})

/* Function to animate height: auto */
function autoHeightAnimate(element, time){
    var curHeight = element.height(), // Get Default Height
        autoHeight = element.css('height', 'auto').height(); // Get Auto Height
    element.height(curHeight); // Reset to Default Height
    element.stop().animate({ height: autoHeight }, time); // Animate to Auto Height
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

            if(response.success) {
                process_ajax_ata(response);
                js_action_response(action, data);
                if(response.container)
                    $(response.container).html(response.html)
            }
        }, error: function (error) {
            console.log(error);
            $('body').html(error.responseText + ' - View console for error object')
        }
    });
}

function show_children(id) {


    remove_odd_even();

    let data_id = $('*[data-id="'+id+'"]');
    let data_parent = $('*[data-parent="'+id+'"]');
    let visible_rows = $('table tbody tr:not(.hidden)');

    $('tr:not(.hidden) input[type="checkbox"]').prop('checked', false)


    $('#view-all').data('show_parent', true);
    // asd.parent().removeClass()
    // asd.parent().addClass('small-block')

    data_id.addClass('active_parent');
    data_id.insertBefore('table tbody tr:first-child');
    visible_rows.addClass('hidden')
    add_selector_lines(data_parent);

    data_id.find('td:first-child').prepend(get_back_button());


    data_id.find('.checkmark').attr('onClick', 'select_children();');
    data_parent.find('.checkmark').attr('onClick', 'select_parent(this);');
    data_parent.removeClass('hidden');
    data_parent.addClass('active_child');
    data_id.removeClass('hidden');

    $('#view-all tbody tr:first-child .view-container').addClass('small-block');
    $('#view-all tbody tr:first-child .small-block').removeClass('view-container');



    setTimeout(function(){
        data_id.find('.fade-right').removeClass('fade-right');
    }, 1);

    add_odd_even();
}

function add_selector_lines(data_parent) {
    let count = 0;
    data_parent.each(function() {
        let checkbox_td = $(this).find('td:first-child');
        if(count === data_parent.length - 1) {
            checkbox_td.prepend(get_bottom_lines());
        } else {
            console.log(checkbox_td);
            checkbox_td.prepend(get_middle_lines());
        }
        count++;
    })
}
function show_default() {

    remove_odd_even();

    let default_item = $('*[data-parent="0"]');
    $('#view-all').data('show_parent', false);
    $('#no-result').remove();
    $('#quick-search-input').val('');
    $('#disable-quick-stats').removeClass('show');

    $('#view-all tbody tr input[type="checkbox"]').prop('checked', false);
    $('#view-all tbody tr:not(.hidden)').addClass('hidden');
    $('.lines').remove();
    default_item.removeClass('hidden');
    $('#view-all .active_parent').removeClass('active_parent');
    $('#view-all .active_child').removeClass('active_child');

    $('#view-all tbody tr .td-parent .small-block').addClass('view-container');
    $('#view-all tbody tr .td-parent .view-container ').removeClass('small-block');

    $('.back-container').addClass('fade-left');
    setTimeout(function(){
        $('.back-container').find('.fade-left').remove();
    }, 300);

    add_odd_even();
}

// VIEW POST
function select_all_posts() {
    $('#view-all tbody tr:not(.hidden) input[type="checkbox"]').prop('checked', function (i, value) {
        return !value;
    });
}
function select_children() {
    if($('#view-all .active_parent input:checked').length > 0) {
        $('#view-all .active_child input[type="checkbox"]').prop('checked', false);
    } else {
        $('#view-all .active_child input[type="checkbox"]').prop('checked', true);
    }
}
function select_parent(obj) {
    let act = $('#view-all .active_parent input:checked');
    let chi = $('#view-all .active_child input:checked');
    let acc = $('#view-all .active_child');

    if(act.length > 0 && chi.length === acc.length) {
        $('#view-all .active_parent input[type="checkbox"]').prop('checked', false);
    }
}

$('#view-all tbody tr.active_parent .checkmark').click(function() {
    console.log('asdasd');

});

function delete_item(post_id) {

    show_popup()
}
function show_poup() {
    let popup_wrapper = $('popup-wrapper');

}
function remove_odd_even() {
    $('.odd_row').removeClass('odd_row');
    $('.even_row').removeClass('even_row');
}
function add_odd_even() {

    let trs = $('#view-all tbody tr:not(.hidden)');

    trs.each(function (i) {
        $(this).addClass(function () {
            return (i % 2 === 0 ? 'even_row' : 'odd_row');
        })
    })

}
function quick_search(table, val) {
    var value = val.toLowerCase(),
        selct = $('#disable-quick-stats'),
        qsarc = $('#q_search_count');

    remove_parent_elements(table);
    remove_odd_even();

    if(val === '') {
        show_default();
        selct.removeClass('show');
    } else {
        selct.addClass('show');
        let count = 0;

        qsarc.addClass('fade-out');
        setTimeout(function(){
            qsarc.remove();
        }, 300);

        $(table + " tbody tr").filter(function() {
            if($(this).text().toLowerCase().indexOf(value) > -1) {
                $(this).removeClass('hidden');
                count++;
            } else {
                $(this).addClass('hidden')
            }
        });

        selct.prepend('<div id="q_search_count" class="fade-standby" data-res="'+count+'">'+count+'</div>');
        setTimeout(function(){
            selct.find('.fade-standby').removeClass('fade-standby')
        }, 300);

        if(count === 0 ) {
            $(table + ' tbody').append(get_empty_table_row(table));
        }
    }

    add_odd_even();
}

function remove_parent_elements(table) {
    $(table + ' .lines').remove();
    $(table + ' .active_parent').removeClass('active_parent');
    $(table + ' .active_child').removeClass('active_child');
}

function get_empty_table_row(table) {

    let th_count = $(table + ' thead th').length;
    let html = "<tr id='no-result'>" +
                "<td><i class=\"la la-close\" onclick=\"show_default()\"></i> <div class=\"small-block\">No results</div></td>";

    for(var i = 0; i < th_count ; i++) {
        html += "<td></td>";
    }

    return html + "</tr>";

}


function get_back_button() {
    return "<div class='back-container fade-right'>" +
                "<i onclick='show_default()' class=\"la la-angle-left shadow-medium\"></i>" +
          "</div>"
}
function get_middle_lines() {
    return "<div class='lines middle-lines'>" +
                "<div class='vert-line-full'></div> " +
                "<div class='hori-line-half'></div>" +
            "</div>"
}
function get_bottom_lines() {
    return "<div class='lines bottom-lines'>" +
                "<div class='vert-line-half vert-top'></div> " +
                "<div class='hori-line-half'></div>" +
            "</div>"
}

var table = $('#view-all');


jQuery.fn.sortElements = (function(){

    var sort = [].sort;

    return function(comparator, getSortable) {

        getSortable = getSortable || function(){return this;};

        var placements = this.map(function(){

            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,

                // Since the element itself will change position, we have
                // to have some way of storing it's original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );

            return function() {

                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }

                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);

            };

        });

        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });

    };

})();

var inverse = false;
function sort_this(index) {
    remove_odd_even();

    index++;

    table.find('td').filter(function(){
        return $(this).index() === index && (!$(this).parent().hasClass('active_parent'));
    }).sortElements(function(a, b){
        return $.text([a]) > $.text([b]) ?
            inverse ? -1 : 1
            : inverse ? 1 : -1;
    }, function(){
        return this.parentNode;
    });

    let a = $('.active_child'),
        v = $('#view-all').data('show_parent');

    if(v === true) {
        $('.lines').remove();
        add_selector_lines(a);
    }

    let th = $('#view-all thead tr th:nth-child('+index+')'),
        all = $('#view-all thead tr th');

    all.removeClass('active', 'order-desc', 'order-asc');
    th.addClass( function() {
        return (inverse ? 'order-desc' : 'order-asc') + ' active';
    });
    th.removeClass( function() {
        return (inverse ? 'order-asc' : 'order-desc');
    });

    add_odd_even();

    inverse = !inverse;
}
