$(document).ready(function() {
    let path = window.location.pathname;
    //console.log(path);
    //""/admin/slider
    let c = path.split('/');
    let length = c.length - 1;
    //console.log(c[length]);
    //console.log(length);
    let cls = c[length];
    $('#${cls}').addClass("active");
    if(cls=='product-size') {
        $("#products").addClass("menu-open");
    } else if (cls=='approved-vendors' || cls=='pending-vendors') {
        $("#vendors").addClass("menu-open");
    }
});