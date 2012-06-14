function association(androidId) {
    $.post("/tablet/association", 
            {
                id: androidId,
                dining_table_id: $('#'+androidId).val()
            });
}

$(document).ready(function() {
   var shownRequests = new Array();
   var shownAlerts = new Array();
   var toDelete = new Array();
   setInterval(function(){  
       for(key in shownAlerts) {
           toDelete[key] = true;
       }
       $.getJSON("/tablet/request.json",
            function(result) {
                if(result != null) {
                    $.each(result.tablet_request, function(key, value) {
                        if(value.is_new === "true") {
                            toDelete[value.android_id] = false;
                            if(!shownRequests[value.android_id]) {
                                var request = $.ajax({
                                    url: "/zone/room/table/request/"+value.android_id,
                                    type: "get",
                                    dataType: "html" 
                                });
                                    
                                request.done(function(resultTable) {
                                    shownAlerts[value.android_id] = $.gritter.add({
                                        title: "Nouvelle demande d'association de la tablette : "+ value.android_id,
                                        text: "Dernière activité à "+value.last_check+"<br />"+resultTable,
                                        sticky: true,
                                        before_open: function() {
                                            shownRequests[value.android_id] = true;
                                        },
                                        before_close: function() {
                                            shownRequests[value.android_id] = false;
                                            $.post("/tablet/request.json", {android_id: value.android_id});
                                        }
                                    });
                                });
                                
                            }
                        }
                        else if(shownRequests[value.android_id]) {
                            $.gritter.remove(shownAlerts[value.android_id], {
                                fade: true
                            });
                            shownRequests[value.android_id] = false;
                        }
                    });
                    
                }
                for(key in toDelete) {
                    if(toDelete[key] == true) {
                        $.gritter.remove(shownAlerts[key], {
                            fade: true
                        });
                        shownRequests[key] = false;
                    }
                }
                    
            }
       );
   }, 2000);
});