$(document).ready(function(){
    console.info("DOM Load")
    $(".event").click(function(){
        document.location.href="./home.php?screen="+$(this).attr("data-target")  
    })
})
        