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
    //console.log(speed);
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
}

function bright() {
    const brightnessValue = document.getElementById("brightness").value;
    document.getElementById("bright-value").innerText = brightnessValue;
    document.body.style.backdropFilter = "brightness(" + brightnessValue + "%)";
}

// Add event listeners with input for the two input elements
document.getElementById("speed").addEventListener('input', speedC);
document.getElementById("brightness").addEventListener('input', bright);