$(document).ready(function() {
   var shownOrders = [];
   var shownAlerts = [];
   setInterval(function(){   
       $.getJSON("/order/news.json",
            function(result) {
                if(result != null) {
                    $.each(result.table_order, function(key, value) {
                        if(value.is_new === "true") {
                            if(!shownOrders[value.id]) {
                                shownAlerts[value.id] = $.gritter.add({
                                    title: "Nouvelle commande numéro "+ value.id,
                                    text: "Commande de la table "+value.dining_table+"<br />Créée à "+value.created_at+"<br /><a href='/order/new/detail/"+value.id+"' >Voir le détail</a>",
                                    sticky: true,
                                    before_open: function() {
                                        shownOrders[value.id] = true;
                                    },
                                    before_close: function() {
                                        shownOrders[value.id] = false;
                                        $.post("/order/news.json", {id: value.id });
                                    }
                                });
                            }
                        }
                        else {
                            if(shownOrders[value.id]) {
                                $.gritter.remove(shownAlerts[value.id], {
                                    fade: true
                                });
                                shownOrders[value.id] = false;
                            }
                        }
                    });
                }
                    
            }
       );
   }, 2000);
});