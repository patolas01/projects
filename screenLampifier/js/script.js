var r = 255, g = 0, b = 0;
//speed of transition
var speed = 20;

//show/hide elements timer
var timer = 4;

var fade = setInterval(function () {
    if (r > 0 && b == 0) {
        r--;
        g++;
    }
    if (g > 0 && r == 0) {
        g--;
        b++;
    }
    if (b > 0 && g == 0) {
        r++;
        b--;
    }
    document.body.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
}, speed);


addEventListener('mousemove', (event) => {
    document.getElementById("bright").style.opacity = "initial";
    document.querySelector(".interactMenu").style.opacity = "initial";
    timer = 4;
});

//show/hide timer
setInterval(() => {
    if (timer == 0) {
        document.getElementById("bright").style.opacity = "0";
        document.querySelector(".interactMenu").style.opacity = "0";
    }
    else {
        timer--;
    }
}, 1000);


function speedC() {
    clearInterval(fade);
    speed = document.getElementById("speed").value;
    console.log(speed);
    fade = setInterval(function () {
        if (r > 0 && b == 0) {
            r--;
            g++;
        }
        if (g > 0 && r == 0) {
            g--;
            b++;
        }
        if (b > 0 && g == 0) {
            r++;
            b--;
        }
        document.body.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
        
    }, speed);
    /*console.log(speed);*/
    /*return document.getElementById("speed").value;*/

}





function bright() {
    document.getElementById("bright-value").innerText = document.getElementById("brightness").value;
    document.body.style.backdropFilter = "brightness(" + document.getElementById("brightness").value + "%)";
}

/*function fadeScreenBrightness() {
    let brightness = 100;
    let isFadingOut = true;
    const fadeInterval = setInterval(() => {
        if (isFadingOut) {
            brightness--;
            if (brightness === 10) {
                isFadingOut = false;
            }
        } else {
            brightness++;
            if (brightness === 100) {
                isFadingOut = true;
            }
        }
        document.documentElement.style.filter = `brightness(${brightness}%)`;
    }, 65);
}

// Call the function to start the interval
fadeScreenBrightness();*/