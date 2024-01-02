function createFirework() {
    const fireworkContainer = document.querySelector('.firework-container');
    const firework = document.createElement('div');
    firework.className = 'firework';
    firework.style.left = `${Math.random() * window.innerWidth}px`;
    fireworkContainer.appendChild(firework);

    setTimeout(() => {
        firework.remove();
    }, 1500);
}

function launchFireworks() {
    setInterval(createFirework, 2000);
}

window.onload = launchFireworks;