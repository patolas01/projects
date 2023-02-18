var r = 255, g = 0, b = 0;
var time = 50;

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
    document.querySelector(".screen").style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
}, time);

function bright() {
    document.querySelector(".screen").style.filter = "brightness("+document.getElementById("brightnessSlider").value+"%)";
}

