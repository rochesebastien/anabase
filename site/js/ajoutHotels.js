$(document).ready(function(){

$('.voirHotels').click(function(){
    $.ajax({
            url: '?controleur=hotels&todo=afficher', // La ressource ciblée
            type: 'POST', // Le type de la requête HTTP,
            data: '',// pas de donnée
            dataType: 'html', // Le type de données à recevoir, ici, du PHP.

            success: function(response) {
                $('.content').replaceWith(response);
            },
          });
      
})

})

    var frm = $('.form-ajout-hotel');

    frm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: 'html',
            success: function (data) {
                $(".content").replaceWith(data);
            },
        });
    });