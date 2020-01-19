function modal(title,description){
    $("#modal-title").html(title)
    $("#modal-content").html(description)
    $("#modal").modal()
}
$(document).ready(function(){
    console.info("DOM Load")

    $(".event").click(function(){
        // console.log("./home.php?screen="+$(this).attr("data-target")  )
        document.location.href="./home.php?screen="+$(this).attr("data-target")  
    })
})
        