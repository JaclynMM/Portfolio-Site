$( "#submit" ).click(function() {
  alert( "Form Accepted!" );
    });

//LIGHTBOX
// Problem: User goes to a dead end when clicking on image
// Solution: Create an overlay with the large image - Lightbox

//1. Capture the click event on a link to an image
$("#imageGallery a").click(function(event){
    event.preventDefault();
    var href = $(this).attr("href");
    console.log(href);

    //1.1 Show the overlay
    //1.2 Update overlay with the image linked in the link
    //1.3 Add Caption with alt attribute

});

//2. Add Overlay
    //2.1 An Image
    //2.2 Caption
//3. When overlay is clicked
    //3.1 Hide the Overlay

