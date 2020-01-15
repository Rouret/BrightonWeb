$(document).ready(function() {
  var url = new URL(window.location.href);
  if(url.searchParams.get("error")==1){
    customModal("Combinaison Username/Password non valide");
  }

    $("#submit").click(function(event) {
        // if ($("#login").val() == "" || $("#mdp").val() == "") {
        //   event.preventDefault();
        //   customModal("Veuillez rentrer tous les champs");
        // }else{
          //location.href = location.href.split('?')[0];
          $("#mdp").val(sha1($("#mdp").val()));
          $("#form").submit();
        // }
    })
})

function customModal(string) {
    $("#customModal").html(string);
    $("#modal").modal();
}
