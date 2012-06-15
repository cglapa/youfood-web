function setIntervention(androidId) {
    $.post("/api.php/help/list", {androidId: androidId, help: 2 });
    $("#help_"+androidId).text("Intervention en cours");
    $("#help_"+androidId+"_a").attr('disabled', 'disabled');
}

$(document).ready(function() {
   var shownOrders = [];
   var shownAlerts = [];
   setInterval(function(){   
       $.getJSON("/api.php/help/list",
            function(result) {
                if(result != null) {
                    $.each(result.tablet, function(key, value) {
                        if(!shownOrders[value.androidId]) {
                            shownAlerts[value.androidId] = $.gritter.add({
                                title: "Demande d'aide de la table "+ value.diningTable,
                                text: "La table "+value.diningTable+" a besoin d'aide !<br />\n\
                                        <a id='help_"+value.androidId+"_a' href='#' class='btn btn-info' onclick='setIntervention("+value.androidId+");'>\n\
                                            <i class='icon-ok icon-white'></i>\n\
                                            <span id='help_"+value.androidId+"'>Intervenir !</span>\n\
                                        </a>",
                                sticky: true,
                                before_open: function() {
                                    shownOrders[value.androidId] = true;
                                },
                                before_close: function() {
                                    shownOrders[value.androidId] = false;
                                    $.post("/api.php/help/list", {androidId: value.androidId, help: 0 });
                                }
                            });
                        }
                    });
                }
                    
            }
       );
   }, 2000);
});