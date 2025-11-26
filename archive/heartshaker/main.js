(function () {
    var shakeThreshold = 15;
    var lastX = null;
    var lastY = null;
    var lastZ = null;
    var lastTime = 0;
    var permissionRequested = false;

    function deviceMotionHandler(event) {
        var acceleration = event.accelerationIncludingGravity;
        var currentTime = new Date().getTime();

        if ((currentTime - lastTime) > 100) {
            var deltaTime = currentTime - lastTime;
            lastTime = currentTime;

            if (lastX !== null && lastY !== null && lastZ !== null) {
                var deltaX = Math.abs(lastX - acceleration.x);
                var deltaY = Math.abs(lastY - acceleration.y);
                var deltaZ = Math.abs(lastZ - acceleration.z);

                if ((deltaX > shakeThreshold && deltaY > shakeThreshold) ||
                    (deltaX > shakeThreshold && deltaZ > shakeThreshold) ||
                    (deltaY > shakeThreshold && deltaZ > shakeThreshold)) {
                    changeDivStyles();
                }
            }

            lastX = acceleration.x;
            lastY = acceleration.y;
            lastZ = acceleration.z;
        }
    }

    function requestMotionPermission() {
        if (typeof DeviceMotionEvent.requestPermission === 'function') {
            if (!permissionRequested) {
                permissionRequested = true; // Prevent multiple requests
                DeviceMotionEvent.requestPermission()
                    .then(permissionState => {
                        if (permissionState === 'granted') {
                            window.addEventListener('devicemotion', deviceMotionHandler, false);
                        } else {
                            console.log("Permission denied for motion sensors.");
                        }
                    })
                    .catch(console.error);
            }
        } else {
            // No permission request needed (Android/older iOS)
            window.addEventListener('devicemotion', deviceMotionHandler, false);
        }
    }

    // iOS requires user interaction, Android starts automatically
    if (typeof DeviceMotionEvent.requestPermission === 'function') {
        document.addEventListener('click', requestMotionPermission, { once: true });
        console.log("iOS detected: Click anywhere to enable motion.");
    } else {
        window.addEventListener('devicemotion', deviceMotionHandler, false);
        console.log("Android detected: Motion enabled automatically.");
    }

})();

function changeDivStyles() {
    var div3 = document.getElementById('div3');
    var div4 = document.getElementById('div4');
    var body = document.body;

    if (div3) {
        div3.style.transition = 'transform 640ms';
        div3.style.webkitTransform = 'scale(1.0)';
    }

    if (div4) {
        div4.style.transition = 'opacity 640ms';
        div4.style.opacity = '1';
    }
    body.style.transitionDuration = '640ms';
    body.style.backgroundColor = '#202020';

    setTimeout(function () {
        if (div3) {
            div3.style.transition = 'transform 12000ms';
            div3.style.transform = 'scale(0)';
        }

        if (div4) {
            div4.style.transition = 'opacity 12000ms';
            div4.style.opacity = '0';
        }

        body.style.transitionDuration = '12000ms';
        body.style.backgroundColor = '#6b3b69';

    }, 1000); // Adjust the delay as needed
}
