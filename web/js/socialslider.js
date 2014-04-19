//user hovers on the share button   
$('#share-wrapper li').hover(function() {
    var hoverEl = $(this); //get element
    
    //browsers with width > 699 get button slide effect
    if($(window).width() > 699) { 
        if (hoverEl.hasClass('visible')){
            hoverEl.animate({"margin-left":"115px"}, "fast").removeClass('visible');
        } else {
            hoverEl.animate({"margin-left":"0px"}, "fast").addClass('visible');
        }
    }
});
