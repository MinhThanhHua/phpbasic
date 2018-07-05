
$('.closePopup').click(function() 
{
    $('.pop-outer').fadeOut('fast');
})
     
function showPopup(id)
{   
    $('.pop-outer').fadeIn('fast');
    $('.delete').click(function() {
        window.location.href = '/xoa-user/'+id;
    }) 
}


