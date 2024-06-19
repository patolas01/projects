<script>
(function () {
  "use strict";

  const items = [
    "💎",
    "💎", 
    "💎", 
    "💎",
    "💎",
    "💎",
    "💎", 
    "💎", 
    "💎",
    "💎",
    //10% diamond
    "❌",
    "❌", 
    "❌", 
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌", 
    "❌", 
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    "❌",
    //35% X
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
        "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
        "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
        "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
        "⚽", 
    "⚽",
    "⚽",
    "⚽", 
    "⚽", 
    "⚽", 
    "⚽",
    //25% <3
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
        "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
        "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
        "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
        "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
        "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣",
    "1️⃣"

    //30%

  ];
  //document.querySelector(".info").textContent = items.join(" ");
  var i = 0;

    function pausecomp(millis)
{
    var date = new Date();
    var curDate = null;
    do { curDate = new Date(); }
    while(curDate-date < millis);
}

  const doors = document.querySelectorAll(".door");
  document.querySelector("#spinner").addEventListener("click", spin);
  const btn = document.querySelector("#spinner");

  var result = [];

  const a1 = "❌";
  const a2 = "1️⃣";
  const a3 = "⚽";
  const a4 = "💎";

    function prob() {

        if(result[1] == a1 || result[2] == a1 || result[3] == a1){
            yourModal.style.display = "block";
        }
        else{
            if(result[1] == a4 && result[2] == a4 && result[3] == a4){
                myModal.style.display = "block";
            }
            else{
                if(result[1] == a4 && result[2] == a4 || result[1] == a4 && result[3] == a4 || result[2] == a4 && result[3] == a4){
                    myModal.style.display = "block";
                }
                else{
                    if(result[1] == a4 || result[2] == a4 || result[3] == a4){
                        myModal.style.display = "block";
                    }
                    else{
                        if(result[1] == a2 && result[2] == a2 && result[3] == a2){
                            myModal.style.display = "block";
                        }
                        else{
                            if(result[1] == a3 && result[2] == a3 && result[3] == a3){
                                myModal.style.display = "block";
                            }
                            else{
                                if(result[1] == a3 && result[2] == a3 || result[1] == a3 && result[3] == a3 || result[2] == a3 && result[3] == a3){
                                    myModal.style.display = "block";
                                }
                                else{
                                    if(result[1] == a3 || result[2] == a3 || result[3] == a3){
                                        myModal.style.display = "block";
                                    }
                                }
                            }
                        }
                    }
                } 
            }          
        }
    }

  async function spin() {
    var ap = document.getElementById("aposta").value;
    if(ap > <?php echo $_SESSION['coins']; ?>){
        alert('Não pode apostar esse valor...');
        return;
    }
    else{
    i = 0;
    result = [];
    //alert(ap);
    document.getElementById("aposta").disabled = true;
    btn.disabled = true;
    init(false, 1, 2);
    for (const door of doors) {
      const boxes = door.querySelector(".boxes");
      const duration = parseInt(boxes.style.transitionDuration);
      boxes.style.transform = "translateY(0)";
      await new Promise((resolve) => setTimeout(resolve, duration * 150));
    }
    await new Promise((resolve) => setTimeout(resolve, 1900));

    prob();
    await new Promise((resolve) => setTimeout(resolve, 2000));

    yourModal.style.display = "none";
      myModal.style.display = "none";


    var pro=[result[1], result[2], result[3]];

    var src2 = "checkPROB.php?ap="+ap+"&res="+pro;
    window.location.href=src2;    

   var moedas = "<?php echo $_SESSION['coins']; ?>";

    $('user-tab.php').ready(function(){
        $('#coins').innerHTML(moedas);
    })

    <?php include('up.php'); ?>

    s = document.getElementById("coins");
    s.innerHTML = moedas;

    /*$.ajax({
        url: "user-tab.php",
        sucess: $(".coins").html(moedas),
    });*/

    

    
    //alert(result[1]);
    //alert(result[2]);
    //alert(result[3]);
    btn.disabled = false;
    document.getElementById("aposta").disabled = false;
    //moedas = 0;
    <?php
    $bet = 0;
    ?>
    
    }
}

  function init(firstInit = true, groups = 1, duration = 1) {
    for (const door of doors) {
      if (firstInit) {
        door.dataset.spinned = "0";
      }

      const boxes = door.querySelector(".boxes");
      const boxesClone = boxes.cloneNode(false);

      const pool = ["?"];
      if (!firstInit) {
        const arr = [];
        for (let n = 0; n < (groups > 0 ? groups : 1); n++) {
          arr.push(...items);
        }
        i=i+1;
        pool.push(...shuffle(arr));

        boxesClone.addEventListener(
          "transitionstart",
          function () {
            door.dataset.spinned = "1";
            this.querySelectorAll(".box").forEach((box) => {
              box.style.filter = "blur(2px)";
            });
          },
          { once: true }
        );

        boxesClone.addEventListener(
          "transitionend",
          function () {
            this.querySelectorAll(".box").forEach((box, index) => {
              box.style.filter = "blur(0)";
              if (index > 0) this.removeChild(box);
            });
          },
          { once: true }
        );
      }
      // console.log(pool);

      for (let i = pool.length - 1; i >= 0; i--) {
        const box = document.createElement("div");
        box.classList.add("box");
        box.style.width = door.clientWidth + "px";
        box.style.height = door.clientHeight + "px";
        box.textContent = pool[i];
        boxesClone.appendChild(box);
      }
      boxesClone.style.transitionDuration = `${duration > 0 ? duration : 1}s`;
      boxesClone.style.transform = `translateY(-${
        door.clientHeight * (pool.length - 1)
      }px)`;
      door.replaceChild(boxesClone, boxes);
      // console.log(door);
    }
  }

    //rand func
  function shuffle([...arr]) {
    let m = arr.length;
    while (m) {
      const i = Math.floor(Math.random() * m--);
      [arr[m], arr[i]] = [arr[i], arr[m]];
    }
    result[i] = arr.slice(-1);
    return arr;
  }
  init();
})();

</script>