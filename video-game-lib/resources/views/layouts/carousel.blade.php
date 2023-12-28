<!-- Carousel HTML -->
<div class="carousel-container" id="myCarousel">
    <ol class="carousel-indicators">
        <li data-slide-to="0" class="active"></li>
        <li data-slide-to="1"></li>
        <li data-slide-to="2"></li>
        <li data-slide-to="3"></li>
        <li data-slide-to="4"></li>
    </ol>

    <div>
        <!-- Add carousel images here -->
        <!-- Wrap each image in an <a> tag with the appropriate link -->
        <a href="http://localhost:8000/games/1">
        <img class="carousel-image" src="{{ asset('carousel-images/AgeofWar.jpg') }}" alt="Carousel Image 1">
        </a>
        <img class="carousel-image" src="{{ asset('carousel-images/Image1.png') }}" alt="Carousel Image 2" style="display: none;">
        <img class="carousel-image" src="{{ asset('carousel-images/Image2.png') }}" alt="Carousel Image 3" style="display: none;">
        <img class="carousel-image" src="{{ asset('carousel-images/Image3.png') }}" alt="Carousel Image 4" style="display: none;">
        <img class="carousel-image" src="{{ asset('carousel-images/Image4.png') }}" alt="Carousel Image 5" style="display: none;">
    </div>

    <!-- Previous and Next controls -->
    <div class="carousel-control-prev" role="button" data-action="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">&#9664;</span> <!-- Left arrow -->
    </div>
    <div class="carousel-control-next" role="button" data-action="next">
        <span class="carousel-control-next-icon" aria-hidden="true">&#9654;</span> <!-- Right arrow -->
    </div>
</div>

<!-- Carousel JavaScript -->
<script src="{{ asset('js/carousel.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        carousel('myCarousel');
    });
</script>
