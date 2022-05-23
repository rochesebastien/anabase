$(document).ready(function(){
    $('#cancelModif').click(function(){
        $('.modifHotel').remove();
    
        $('.content').css('display', 'auto');
        $('.content').css('justify-content', 'auto');
        $('.content').css('width', 'auto');
        $('.content').css('margin-left', '50%');
        $('.content').css('transform', "translateX(-50%)");
        $('.content').css('margin-right', 'auto');
        $('.firstFlex').css('width', 'auto');
        $('.modifHotel').css('height', 'auto');
    
        $('.b1').html("Modifier<i class='fas fa-tools' aria-hidden='true' style='float: right; margin-right: 12px'></i>");
        modifEnable = false;
    })
    
    
    
})

