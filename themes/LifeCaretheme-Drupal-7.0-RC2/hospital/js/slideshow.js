/************ Start Slide Show Script ***********/

$(document).ready(function() {
$(".paging").show();
$(".paging a:first").addClass("active");

var imageWidth = $(".window").width();
var imageSum = $(".image_reel img").size();
var imageReelWidth = imageWidth * imageSum;

$(".image_reel").css({'width' : imageReelWidth});

rotate = function(){
    var triggerID = $active.attr("rel") - 1; 
    var image_reelPosition = triggerID * imageWidth;

    $(".paging a").removeClass('active'); 
    $active.addClass('active'); 

    //Slider Animation
    $(".image_reel").animate({
        left: -image_reelPosition
    }, 500 );

};

//Rotation  and Timing Event
rotateSwitch = function(){
    play = setInterval(function(){ 
        $active = $('.paging a.active').next(); 
        if ( $active.length === 0) { 
            $active = $('.paging a:first'); 
        }
        rotate(); 
    }, 7000); 
};

rotateSwitch(); 


//On Hover
$(".image_reel a img").hover(function() {
    clearInterval(play); //Stop the rotation
}, function() {
    rotateSwitch(); //Resume rotation timer
});

//On Click
$(".paging a").click(function() {
    $active = $(this); //Activate the clicked paging
    //Reset Timer
    clearInterval(play); //Stop the rotation
    rotate(); //Trigger rotation immediately
    rotateSwitch(); // Resume rotation timer
    return false; //Prevent browser jump to link anchor
});
});

/************ End Slide Show Script ***********/