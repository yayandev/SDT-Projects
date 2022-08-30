$(document).ready(function(){
  $("#message").attr("placeholder", "type message here..")
  $("#message").on("keyup", function(event){
    let key = event.which || event.keyCode || event.charCode;
    let keyname = event.key
    if(key == 13) {
      let height = $(this).innerHeight()
      $(this).css("height", `${height + 5}px`)
    }
    
    // console.log(keyname);
    /* backspace or delete */
    if (key == 8 || keyname === "Backspace") {
      let height = $(this).innerHeight()
      $(this).css("height", `5vh`)
    }
  })
})