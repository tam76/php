$(document).ready(function() {
    $('.tt').hide();
    $('.addbook').click(function() {
        $(this).slideToggle();
        var newid=$(this).prev().val();
        $.ajax({
            "url":"giohang.html",
            "type":"post",
            "dataType":"json",
            "data":"newid="+newid,
            "async":true,
            "success":function(){
            }
        });
        return false;
    });
    $('.delbook').click(function() {
        var key = $(this).prev().val();
        $(this).parent().remove();
        $.ajax({
            "url":"giohang.html",
            "type":"post",
            "data":"keys="+key,
            "async":true,
            "success":function(){
                document.fCart.reset().reset();
            }
        });
        return false;
    })
    
});