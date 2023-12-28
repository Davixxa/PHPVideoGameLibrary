function carousel(containerId) {
    let container = document.getElementById(containerId);
    let images = container.getElementsByClassName('carousel-image');
    let indicators = container.querySelectorAll('.carousel-indicators li');
    let currentIndex = 0;
    let autoCycleInterval; // Variable to store the interval ID

    function updateIndicators(index) {
        indicators.forEach(ind => ind.classList.remove('active'));
        indicators[index].classList.add('active');
    }

    function showImage(index) {
        images[currentIndex].style.display = 'none';
        currentIndex = index;
        images[currentIndex].style.display = 'block';
        updateIndicators(currentIndex);
    }

    function nextImage() {
        let newIndex = (currentIndex + 1) % images.length;
        showImage(newIndex);
        resetAutoCycle(); // Reset the interval whenever an image is manually changed
    }

    function prevImage() {
        let newIndex = currentIndex - 1;
        if (newIndex < 0) {
            newIndex = images.length - 1;
        }
        showImage(newIndex);
        resetAutoCycle(); // Reset the interval whenever an image is manually changed
    }

    function resetAutoCycle() {
        clearInterval(autoCycleInterval); // Clear the existing interval
        autoCycleInterval = setInterval(nextImage, 5000); // Start a new interval, currently 5 seconds
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showImage(index);
            resetAutoCycle();
        });
    });

    document.querySelector('.carousel-control-next').addEventListener('click', nextImage);
    document.querySelector('.carousel-control-prev').addEventListener('click', prevImage);

    resetAutoCycle(); // Initialize the auto cycle
    showImage(0); // Show the first image when initializing the carousel
}

document.addEventListener('DOMContentLoaded', function() {
    carousel('myCarousel');
});
