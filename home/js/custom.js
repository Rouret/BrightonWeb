$(document).ready(function(){
    $(".event").click(function(){
        document.location.href="./home.php?screen="+$(this).attr("data-target")  
    })
})
        
