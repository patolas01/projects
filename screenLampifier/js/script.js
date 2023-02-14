var r = 255, g = 0, b = 0;
var time = 15;

setInterval(function () {
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
}, time);



function fadeFX(time) {
    
}

function bright() {
    document.body.style.backdropFilter = "brightness("+document.getElementById("brightnessSlider").value+"%)";
}