// Function to detect shake event
(function () {
    var shakeThreshold = 15;
    var lastX = null;
    var lastY = null;
    var lastZ = null;
    var lastTime = 0;

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

    // function changeDivStyles() {
    //     var div3 = document.getElementById('div3');
    //     var div4 = document.getElementById('div4');

    //     if (div3) {
    //         div3.style.transition = 'transform 850ms';
    //         div3.style.transform = 'scale(1)';
    //     }

    //     if (div4) {
    //         div4.style.transition = 'opacity 850ms';
    //         div4.style.opacity = '1';
    //     }
    // }

    if (window.DeviceMotionEvent) {
        window.addEventListener('devicemotion', deviceMotionHandler, false);
    } else {
        console.log("DeviceMotionEvent is not supported");
    }
})();

function changeDivStyles() {
    var div3 = document.getElementById('div3');
    var div4 = document.getElementById('div4');

    if (div3) {
        div3.style.transition = 'transform 640ms';
        div3.style.webkitTransform = 'scale(1.0)';
    }

    if (div4) {
        div4.style.transition = 'opacity 640ms';
        div4.style.opacity = '1';
    }

    setTimeout(function() {
        if (div3) {
            div3.style.transition = 'transform 12000ms';
            div3.style.transform = 'scale(0)';
        }

        if (div4) {
            div4.style.transition = 'opacity 12000ms';
            div4.style.opacity = '0';
        }
    }, 1000); // Adjust the delay as needed
}