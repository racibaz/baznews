/**
 * Created by aliduman on 15/04/2017.
 */

//Menü active code...
function activeMenu(child_name,name) {
    $('.sidebar-menu').find('li').each(function (index) {
        var data = $(this).data('name');
        if(data === child_name || data === name){
            $(this).addClass('active');
        }
    });
}