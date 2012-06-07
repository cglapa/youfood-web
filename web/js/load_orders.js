$(document).ready(function() {
    setInterval(function(){
        $('#loader').show();
        $.ajax({
            type: "GET",
            url: '/order/list',
            dataType: 'html',
            success: function(result) {
                $('#orders').html(result);
                $('#loader').hide();
            }
        });
    }, 10000);
});