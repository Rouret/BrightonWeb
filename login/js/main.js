$(document).ready(function() {
  var url = new URL(window.location.href);
  if(url.searchParams.get("error")==1){
    customModal("Combinaison Username/Password non valide");
  }

    $("#submit").click(function(event) {
        if ($("#username").val() == "" && $("#username").val() === undefined && $("#password").val() == "" && $("#password").val() === undefined) {
          event.preventDefault();
          customModal("Veuillez rentrer tous les champs");
        }else{
          //location.href = location.href.split('?')[0];
          $("#password").val(sha1($("#password").val()));
        }
    })
})

function customModal(string) {
    $("#customModal").html(string);
    $("#modal").modal();
}
