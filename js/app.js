$( "#submit" ).click(function() {
  alert( "Form Accepted!" );
    });

//LIGHTBOX
// Problem: User goes to a dead end when clicking on image
// Solution: Create an overlay with the large image - Lightbox

var $overlay = $('<div id="overlay"></div>');
var $image = $('<img class="whiteBorder">');
var $caption = $("<p></p>")

// An Image
$overlay.append($image);
// Caption to overlay
$overlay.append($caption);

// Add Overlay
$("body").append($overlay);

// Capture the click event on a link to an image
$("#imageGallery a").click(function(event){
    event.preventDefault();
    var imageLocation = $(this).attr("href");
    // Update overlay with the image linked in the link
    $image.attr("src", imageLocation);

    // Show the overlay
    $overlay.show();

    // Add Caption with alt attribute
    var captionText = $(this).children("img").attr("alt");
    $caption.text(captionText);

});


// When overlay is clicked
$overlay.click(function() {
    // Hide the Overlay
    $overlay.hide();
});

