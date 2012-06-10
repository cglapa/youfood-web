$(document).ready(function() {
   var x = [];
   setInterval(function(){   
       $.getJSON("/order/news.json",
            function(result) {
                if(result != null) {
                    $.each(result.table_order, function(key, value) {
                        if(!x[value.id]) {
                            $.gritter.add({
                                title: "Nouvelle commande numéro "+ value.id,
                                text: "Commande de la table "+value.dining_table+"<br />Créé à "+value.created_at+"<br /><a href='/order/new/detail/"+value.id+"' >Voir le détail</a>",
                                sticky: true,
                                before_open: function() {
                                    x[value.id] = true;
                                },
                                before_close: function() {
                                    x[value.id] = false;
                                    $.post("/order/news.json", {id: value.id });
                                }
                            });
                        }
                    });
                }
                    
            }
       );
   }, 2000);
});