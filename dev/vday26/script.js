document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Language Roller Logic ---
    const words = ["Ciao", "Bonjour", "Hola", "Hello", "Olá"];
    let index = 0;
    const textElements = document.getElementsByClassName("welcome-text");

    if (textElements.length > 0) {
        const textElement = textElements[0];
        function updateText() {
            index = (index + 1) % words.length;
            textElement.textContent = words[index];
        }
        setInterval(updateText, 1500);
        textElement.classList.add("fade-up");
    }

    // --- 2. Audio Setup ---
    const song = new Audio('assets/audio/A PERFECT WORLD.flac');
    song.volume = 0;
    const jsmediatags = window.jsmediatags;

    // --- 3. Extract Metadata ---
    if (jsmediatags) {
        jsmediatags.read(song.src, {
            onSuccess: function (tag) {
                const { data, format } = tag.tags.picture;
                let base64String = "";
                for (let i = 0; i < data.length; i++) {
                    base64String += String.fromCharCode(data[i]);
                }
                const imgUrl = `data:${format};base64,${window.btoa(base64String)}`;

                const coverImg = document.getElementById('cover-img');
                const dynamicBg = document.getElementById('dynamic-bg');

                if (coverImg) coverImg.src = imgUrl;
                if (dynamicBg) dynamicBg.style.backgroundImage = `url(${imgUrl})`;

                document.getElementById('song-title').innerText = tag.tags.title || "A Perfect World";
                document.getElementById('artist-name').innerText = tag.tags.artist || "Unknown Artist";
            }
        });
    }


    let played = false;
    // --- 4. Swiper Initialization ---
    const swiper = new Swiper('.swiper', {
        speed: 800,
        on: {
            slideChange: function () {
                const color = this.slides[this.activeIndex].dataset.bg;
                document.body.style.backgroundColor = color;

                //swiper guide
                const hint = document.querySelector('.swipe-hint');

                const currentSlide = this.slides[this.activeIndex];

                if (this.activeIndex === 0) {
                    hint.classList.add('large');
                } else {
                    hint.classList.remove('large');
                }

                if (currentSlide.classList.contains('slide-tulip')) {
                    // 1. Rotate the Left Petal out (-25 degrees)
                    gsap.to(".petal-left", { rotation: -25, x: -10, delay: 0.8, duration: 2, ease: "power2.out" });

                    // 2. Rotate the Right Petal out (25 degrees)
                    gsap.to(".petal-right", { rotation: 25, x: 10, delay: 0.8, duration: 2, ease: "power2.out" });

                    // 3. Reveal the hidden text
                    gsap.to(".tulip-message", {
                        opacity: 1,
                        y: -20,
                        duration: 1,
                        delay: 1
                    });
                } else {
                    // Reset flower when swiping away
                    gsap.to(".petal-left, .petal-right", { rotation: 0, x: 0, duration: 0.5 });
                    gsap.to(".tulip-message", { opacity: 0, y: 0, duration: 0.5 });
                }



                if (this.activeIndex === 4) {
                    hint.style.opacity = '0';
                } else {
                    hint.style.opacity = '1';
                }

                if (this.activeIndex === 4 && played === false) { // Music Slide
                    played = true;

                    song.currentTime = /*86*/112;
                    song.volume = 0;
                    song.play().then(() => updateIcons()).catch(e => console.log("Waiting for user interaction..."));

                    gsap.to(song, { volume: 0.8, duration: 3, ease: "power1.inOut" });
                } else {
                    gsap.to(song, {
                        volume: 0,
                        duration: 1,
                        onComplete: () => {
                            song.pause();
                            updateIcons();
                        }
                    });
                }
            }
        }
    });

    // --- 5. Spotify Player Controls ---
    const playBtn = document.getElementById('playBtn');
    const playSvg = document.getElementById('play-svg');
    const pauseSvg = document.getElementById('pause-svg');
    const timeline = document.getElementById('timeline');
    const currentTimeEl = document.getElementById('current-time');
    const durationTimeEl = document.getElementById('duration-time');

    function formatTime(seconds) {
        if (isNaN(seconds)) return "0:00";
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }

    function updateIcons() {
        if (song.paused) {
            playSvg.classList.remove('hidden-icon');
            pauseSvg.classList.add('hidden-icon');
        } else {
            playSvg.classList.add('hidden-icon');
            pauseSvg.classList.remove('hidden-icon');
        }
    }

    // Play/Pause Click
    if (playBtn) {
        playBtn.addEventListener('click', () => {
            if (song.paused) {
                song.play().then(() => updateIcons());
                gsap.to(song, { volume: 1, duration: 0.5 });
            } else {
                song.pause();
                updateIcons();
            }
        });
    }

    // THE FIX: Scrubbing logic
    timeline.addEventListener('input', () => {
        if (!isNaN(song.duration)) {
            const seekTime = (timeline.value / 100) * song.duration;
            song.currentTime = seekTime;
        }
    });

    // Update slider and timers as song plays
    song.ontimeupdate = () => {
        if (timeline && !isNaN(song.duration)) {
            const progress = (song.currentTime / song.duration) * 100;
            timeline.value = progress;

            currentTimeEl.innerText = formatTime(song.currentTime);
            durationTimeEl.innerText = formatTime(song.duration);

            updateSliderBackground();
        }
    };

    // Ensure duration shows up as soon as the file is ready
    song.onloadedmetadata = () => {
        durationTimeEl.innerText = formatTime(song.duration);
    };

    function updateSliderBackground() {
        if (timeline) {
            const val = timeline.value;
            // Changed from Green to White for the "Modern" look
            timeline.style.background = `linear-gradient(to right, #ffffff ${val}%, rgba(255, 255, 255, 0.2) ${val}%)`;
        }
    }
});