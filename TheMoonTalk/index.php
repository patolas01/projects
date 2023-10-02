<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/moon.svg" type="image/x-icon">
    <title>TheMoonTalk</title>
</head>

<body>
    <img class="moon" src="img/moon.svg" alt="the moon">

    


</body>

<script>

    document.querySelector(".moon").addEventListener("click", () => {
        const message = prompt("Write your message (100 characters max):");
        if (message !== null && message !== "") {
            createStar(message);
        }
    });

    function createStar(message) {
        const star = document.createElement("div");
        star.className = "star";
        star.style.left = `${getRandomPositionWidth()}px`;
        star.style.top = `${getRandomPositionHeight()}px`;

        const tooltip = document.createElement("div");
        tooltip.className = "tooltip";
        tooltip.textContent = message;

        star.appendChild(tooltip);

        document.body.appendChild(star);

        // Remove the star after a certain duration (e.g., 10 seconds)
        setTimeout(() => {
            star.remove();
        }, 86400000);
    }

    function getRandomPositionWidth() {
        // Return a random position within the container size
        const containerWidth = document.body.clientWidth;
        return Math.random() * (containerWidth - 20); // Adjust for star size
    }
    function getRandomPositionHeight() {
        // Return a random position within the container size
        const containerHeight = document.body.clientHeight;
        return Math.random() * (containerHeight - 20); // Adjust for star size
    }

</script>



</html>