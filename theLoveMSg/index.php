<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alkatra&display=swap');

        body {
            transition-duration: 1012ms;
            //background: linear-gradient(to right, #ff00cc, #333399);
            background: linear-gradient(to right, #333852, #311a40);
            //background-image: url('https://youtu.be/BFhp7Y0iLSA');
            font-family: 'Alkatra', cursive;
            color: white;
            margin: 0;
            height: 100svh;
        }

        div.main {
            margin: 0;
            height: 96%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #heart {
            display: flex;
            font-size: 190%;
            text-align: center;
            margin: 0 auto;
            cursor: pointer;
            user-select: none;
            transition-duration: 800ms;
            font-family: 'Alkatra', cursive;
        }

        #heart:hover {
            transform: scale(130%);
        }

        div.prompt {
            transition-duration: 1012ms;
            position: fixed;
            color: white;
            background-color: #2b2b2b;
            padding: 15px;
            border-radius: 10px;
            display: grid;
            align-items: center;
            opacity: 0;
            visibility: hidden;
        }

        textarea {
            transition-duration: 312ms;
            border: 0;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 100%;
            padding: 5px;
            padding-left: 8px;
            padding-right: 8px;
            font-family: 'Alkatra', cursive;
            resize: none;
            outline: 0;
        }


        .prompt button {
            transition-duration: 712ms;
            height: 80%;
            font-family: 'Alkatra', cursive;
            font-size: 80%;
            margin-top: 20px;
            padding: 10px;
            border: 0;
            border-radius: 5px;
            color: white;
            background-color: green;
            user-select: none;
            cursor: pointer;
        }

        button:hover {
            transform: scale(102%);
        }

        .message {
            display: grid;
            text-align: center;
        }

        #texto {
            margin-left: auto;
            margin-right: auto;
            width: 90%;
            text-align: center;
            font-size: 200%;
            margin-bottom: 2svh;
        }

        #shareBTN {
            transition-duration: 112ms;
            display: grid;
            user-select: none;
            border: 4px white solid;
            width: 30px;
            height: 30px;
            padding: 10px;
            border-radius: 50%;
            position: fixed;
            bottom: 10svh;
            backdrop-filter: brightness(110%);
            background-image: url('link-button-svgrepo-com.svg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 60%;
        }

        #shareBTN:hover {
            transform: scale(102%);
            box-shadow: 0px 0px 10px black;
            backdrop-filter: brightness(120%);
        }

        #shareBTN img {
            -webkit-user-drag: none;
            user-select: none;
            width: 30px;
        }

        #signtrTxt {
            color: black;
            text-align: right;
            margin: 0;
            margin-right: 5px;
        }

        a {
            text-decoration: none;
            color: #171347;
        }

        a:hover {
            filter: brightness(250%);
        }

        @media only screen and (max-width: 751px) {
            body {
                font-size: 150%;
            }

            div.prompt {
                height: 40%;
                width: 80%;
                font-size: 80%;
            }

            .prompt button {
                margin-top: 20px;
                padding: 20px;
            }

            #texto {
                height: 45svh;
                overflow: scroll;
                font-size: 100%;
                margin-top: -10svh;
            }

            textarea {
                height: 100%;
            }

            div.main {
                height: calc(100%-8px);
            }

            #shareBTN {
                transform: scale(110%);
            }

            #shareBTN:hover {
                transform: scale(112%);
            }

            #signtrTxt {
                height: 5px;
                font-size: 40%;
            }
        }
    </style>
    <title>TheLoveMSG</title>
    <link rel="shortcut icon" href="hrt.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="main">
        <div class="prompt">
            <label for="msg">Mensagem:</label>
            <textarea name="msg" id="msg" cols="30" rows="4"></textarea>
            <button onclick="saveMsg()">Guardar</button>
        </div>
        <div class="message">
            <div id="texto">
            </div>
            <div id="heart" onclick="showPrompt()">❤️</div>
        </div>
        <div id="shareBTN" name="send_msg">
            <a id="shareLink" href="javascript:void(0);" onclick="copyURL()"></a>
        </div>
    </div>
    <p id="signtrTxt">by <a target="_blank" href="https://www.instagram.com/paulo.leal04">@patolas</a></p>
</body>
<script>
    var heart = document.querySelector("#heart");
    var prompte = document.querySelector(".prompt");
    var xereLinque = document.querySelector("#shareLink");
    var baquegraunde = document.body;

    function showPrompt() {
        heart.style.display = "none";
        prompte.style.visibility = "visible";
        prompte.style.opacity = 1;
        xereLinque.style.display = "none";
        baquegraunde.style.backdropFilter = "brightness(40%)";
    }

    function hidePrompt() {
        heart.style.display = "flex";
        prompte.style.visibility = "hidden";
        prompte.style.opacity = 0;
        xereLinque.style.display = "flex";
        baquegraunde.style.backdropFilter = "brightness(100%)";
    }

    function encodeMessage(message) {
        var encodedMessage = btoa(message);
        return encodedMessage;
    }

    function decodeMessage(encodedMessage) {
        var decodedMessage = atob(encodedMessage);
        return decodedMessage;
    }

    function saveMsg() {
        var texto = document.querySelector("#texto");
        var mensagemTexto = document.querySelector("#msg").value;
        hidePrompt();
        texto.textContent = mensagemTexto;
        var encodedMessage = encodeMessage(mensagemTexto);
        var newURL = updateURLParameter(window.location.href, 'msg', encodedMessage);
        xereLinque.href = newURL;
    }

    function copyURL() {
        var shareLink = document.querySelector("#shareLink");
        var dummyInput = document.createElement("input");
        document.body.appendChild(dummyInput);
        dummyInput.value = shareLink.href;
        dummyInput.select();
        document.execCommand("copy");
        document.body.removeChild(dummyInput);
        alert("Link copiado!");
    }

    // Extract the message content from URL parameters and decode
    function getMessageFromURL() {
        var urlParams = new URLSearchParams(window.location.search);
        var encodedMessage = urlParams.get('msg');
        if (encodedMessage) {
            var decodedMessage = decodeMessage(encodedMessage);
            var msgTextarea = document.querySelector("#msg");
            msgTextarea.value = decodedMessage;
            var texto = document.querySelector("#texto");
            texto.textContent = decodedMessage;
            xereLinque.href = removeURLParameter(window.location.href, 'msg'); // Remove the existing 'msg' parameter from the URL
        }
    }

    // Update or add a parameter in the URL
    function updateURLParameter(url, param, value) {
        var newURL = url;
        var regex = new RegExp('([?&])' + param + '=.*?(&|$)', 'i');
        var separator = newURL.indexOf('?') !== -1 ? '&' : '?';

        if (newURL.match(regex)) {
            newURL = newURL.replace(regex, '$1' + param + '=' + value + '$2');
        } else {
            newURL = newURL + separator + param + '=' + value;
        }

        return newURL;
    }

    // Remove a parameter from the URL
    function removeURLParameter(url, param) {
        var newURL = url;
        var regex = new RegExp('([?&])' + param + '=.*?(&|$)', 'i');

        if (newURL.match(regex)) {
            newURL = newURL.replace(regex, '$1');
            newURL = newURL.replace(/[?&]$/, '');
        }

        return newURL;
    }

    // Call the function to extract the message from URL when the page loads
    getMessageFromURL();
</script>
</html>