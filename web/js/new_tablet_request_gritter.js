$(document).ready(function() {
   var shownOrders = [];
   var shownAlerts = [];
   setInterval(function(){   
       $.getJSON("/tablet/request.json",
            function(result) {
                if(result != null) {
                    $.each(result.tablet_request, function(key, value) {
                        if(value.is_new === "true") {
                            if(!shownOrders[value.android_id]) {
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
                                            shownOrders[value.android_id] = true;
                                        },
                                        before_close: function() {
                                        shownOrders[value.android_id] = false;
                                        $.post("/tablet/request.json", {android_id: value.android_id});
                                        }
                                    });
                                });
                                
                            }
                        }
                        else {
                            if(shownOrders[value.android_id]) {
                                $.gritter.remove(shownAlerts[value.android_id], {
                                    fade: true
                                });
                                shownOrders[value.android_id] = false;
                            }
                        }
                    });
                }
                    
            }
       );
   }, 2000);
});