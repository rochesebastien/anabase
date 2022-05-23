$(document).ready(function(){

var buttonAjouter = document.querySelector('.ajouterHotel');


$('.rowhotel').mouseover(function () { 
    index = this.id;
});

var datas = [];

$('.b2').unbind('click');
$('.b2').click(function(){
    console.log(modifEnable);
    var content = $('#'+index).children().each(function(index){
        datas[index] = $(this).text();
    });


        $.ajax({
            url: '?controleur=hotels&todo=supprimer', // La ressource ciblée
            type: 'POST', // Le type de la requête HTTP,
            data: 'idHotel='+datas[0],// datas[0] === ID
            dataType: 'html', // Le type de données à recevoir, ici, du PHP.

            success: function(response) {
                $(".content").replaceWith(response);
            },
          });

          resetContent();

})

$('.b1').unbind('click');
$('.b1').click(function(){

    if(!modifEnable){
        var content = $('#'+index).children().each(function(index){
            datas[index] = $(this).text();
        });

          $.get("vue/formulaireModifier.html", function(data){

            $('.content').append(data);

            $('.content').css('display', 'flex');
            $('.content').css('justify-content', 'space-between');
            $('.content').css('width', '80%');
            $('.content').css('margin-left', 'auto');
            $('.content').css('margin-right', 'auto');
            $('.firstFlex').css('width', '55%');
            $('.modifHotel').css('height', 'auto');
            $('.content').css('transform', "none");

            $('#nomModif').val(datas[1]);
            $('#adresseModif').val(datas[2]);
            $('#etoileModif').val(datas[3]);
            $('#prixParticipantModif').val(datas[4].slice(0,-1)); // slice enlève le symbole €
            $('#prixSuppModif').val(datas[5].slice(0,-1));
            $('#h2modif').html("Modifier l'hotel n° "+datas[0]);
            $('#idModif').val(datas[0]);

            $('.b1').html("Annuler<i class='fas fa-tools' aria-hidden='true' style='float: right; margin-right: 12px'></i>");

        });

          modifEnable = true;
    } else{

        $('.modifHotel').remove();

        resetContent();

        $('.firstFlex').css('width', 'auto');

        $('.b1').html("Modifier<i class='fas fa-tools' aria-hidden='true' style='float: right; margin-right: 12px'></i>");
        
        modifEnable = false;
    } 
})

$('.b0').unbind('click');
$('.b0').click(function(){
        $.ajax({
            url: '?controleur=hotels&todo=afficher', // La ressource ciblée
            type: 'POST', // Le type de la requête HTTP,
            data: '',// pas de donnée
            dataType: 'html', // Le type de données à recevoir, ici, du PHP.

            success: function(response) {
                $(".content").replaceWith(response);
            },
          });
})

$('.b3').unbind('click');
$('.b3').click(function(){

    var content = $('#'+index).children();
    $(content).css('background-color', '#19106F');
    $(content).css('color', 'white');
})









buttonAjouter.addEventListener('click', function(){

        $.ajax({
            url: '?controleur=hotels&todo=afficherajout', // La ressource ciblée
            type: 'POST', // Le type de la requête HTTP,
            data: '',// pas de données à recevoir
            dataType: 'html', // Le type de données à recevoir, ici, du PHP.

            success: function(response) {
                $(".content").replaceWith(response);
            },
          }); 
    })

    $('.rowhotel').contextmenu((e)=> {
        e.preventDefault();

        $('.menuperso').css('display', 'block');
        $('.menuperso').css('top', `${e.clientY}px`);
        $('.menuperso').css('left', `${e.clientX}px`);
    })

    $(document).click(function() {
        $('.menuperso').css('display', 'none');
    })

    $('.btn').click(function() {
        $('.menuperso').css('display', 'none');
    })

})

setTimeout(() => {
    $('.confirmationajout').fadeOut();
  }, 2500);  

  var frmModif = $('.formModif');

  frmModif.submit(function (e) {
      
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: frmModif.attr('action'),
        data: frmModif.serialize(),
        dataType: 'html',
        success: function (data) {
            $(".content").replaceWith(data);
            
            resetContent();

            modifEnable = false;
        },
    });

});

function resetContent(){
        $('.content').css('display', '');
        $('.content').css('justify-content', 'auto');
        $('.content').css('width', 'auto');
        $('.content').css('margin-left', '50%');
        $('.content').css('transform', "translateX(-50%)");
        $('.content').css('margin-right', 'auto');
}