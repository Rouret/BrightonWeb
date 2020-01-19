<div class="container fill d-flex justify-content-center section-slide-md">
    <div class="row w-100" id="home_page">
        <div class="card m-3 col-md-5 col-xs-12" style="width: 18rem;">
            <img class="card-img-top mt-3" src="https://www.presse-citron.net/wordpress_prod/wp-content/uploads/2018/11/meilleure-banque-image.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card m-3 col-md-5 col-xs-12" style="width: 18rem;">
                <img class="card-img-top mt-3" src="https://www.presse-citron.net/wordpress_prod/wp-content/uploads/2018/11/meilleure-banque-image.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
    </div>
</div>

<script>
    function responsive(){
        select_home=$("#home_page");
        select_section=$("section");
        if ($(window).width() < 768) {
            select_home.addClass('justify-content-center');
            select_home.removeClass('align-items-center');
            select_section.addClass('section-slide-md')
        } else {
            select_home.addClass('justify-content-center');
            select_home.addClass('align-items-center');
            select_section.removeClass('section-slide-md')
        }
    }
    $(document).ready(function() {
        responsive()
    })
</script>