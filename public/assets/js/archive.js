document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('customVideo');
    const playButton = document.getElementById('playButton');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const playIcon = document.getElementById('playIcon');
    const pauseIcon = document.getElementById('pauseIcon');
    const progressBar = document.getElementById('progressBar');
    const progressContainer = document.getElementById('progressContainer');
    const progressHandle = document.getElementById('progressHandle');
    
    // Play/Pause functionality
    function togglePlay() {
        if (video.paused) {
            video.play();
            playButton.style.display = 'none';
            playIcon.classList.add('hidden');
            pauseIcon.classList.remove('hidden');
        } else {
            video.pause();
            playIcon.classList.remove('hidden');
            pauseIcon.classList.add('hidden');
        }
    }
    
    // Event listeners
    playButton.addEventListener('click', togglePlay);
    playPauseBtn.addEventListener('click', togglePlay);
    
    // Update progress bar
    video.addEventListener('timeupdate', function() {
        const progress = (video.currentTime / video.duration) * 100;
        progressBar.style.width = progress + '%';
        progressHandle.style.left = progress + '%';
    });
    
    // Click on progress bar to seek
    progressContainer.addEventListener('click', function(e) {
        const rect = progressContainer.getBoundingClientRect();
        const pos = (e.clientX - rect.left) / rect.width;
        video.currentTime = pos * video.duration;
    });
    
    // Video ended
    video.addEventListener('ended', function() {
        playButton.style.display = 'flex';
        playIcon.classList.remove('hidden');
        pauseIcon.classList.add('hidden');
    });

    // Initialize Swiper for products showcase
    if (typeof Swiper !== 'undefined') {
        new Swiper('.product-slider', {
            slidesPerView: 2,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: '.product-slider .swiper-button-next',
                prevEl: '.product-slider .swiper-button-prev'
            },
            pagination: {
                el: '.product-slider .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        });
    }
});
