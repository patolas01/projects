<?php 
session_start();
//echo $_GET['res'];
$result=explode(",",$_GET['res']);
//print_r($result[0]);
$bet = $_GET['ap'];
$_SESSION['ap'] = $bet;

const a1 = "❌";
const a2 = "1️⃣";
const a0 = "⚽";
const a4 = "💎";

if($result[1] == a1 || $result[2] == a1 || $result[0] == a1){
        include('up.php');
        //echo "alert(".$coins.");";
        $coins = $coins - $bet;
        include('coinSel.php');
 }
        else{
            if($result[1] == a4 && $result[2] == a4 && $result[0] == a4){
                include('up.php');
                //echo "alert(".$coins.");";
                $coins = $coins - $bet + ($bet*500);
                //echo "alert(".$bet.");";
                include('coinSel.php');
            }
            else{
                if($result[1] == a4 && $result[2] == a4 || $result[1] == a4 && $result[0] == a4 || $result[2] == a4 && $result[0] == a4){
                    include('up.php');
                   // echo "alert(".$coins.");";
                    $coins = $coins - $bet + ($bet*50);
                    //echo "alert(".$bet.");";
                    include('coinSel.php');
                }
                else{
                    if($result[1] == a4 || $result[2] == a4 || $result[0] == a4){
                        include('up.php');
                        //echo "alert(".$coins.");";
                        $coins = $coins - $bet + ($bet*5);
                        //echo "alert(".$bet.");";
                        include('coinSel.php');
                    }
                    else{
                        if($result[1] == a2 && $result[2] == a2 && $result[0] == a2){
                            include('up.php');
                                //echo "alert(".$coins.");";
                                $coins = $coins;
                               // echo "alert(".$bet.");";
                                include('coinSel.php');
                        }
                        else{
                            if($result[1] == a0 && $result[2] == a0 && $result[0] == a0){
                                include('up.php');
                                //echo "alert(".$coins.");";
                                $coins = $coins - $bet + ($bet*8);
                               // echo "alert(".$bet.");";
                                include('coinSel.php');
                            }
                            else{
                                if($result[1] == a0 && $result[2] == a0 || $result[1] == a0 && $result[0] == a0 || $result[2] == a0 && $result[0] == a0){
                                    include('up.php');
                                    //echo "alert(".$coins.");";
                                    $coins = $coins - $bet + ($bet*4);
                                    //echo "alert(".$bet.");";
                                    include('coinSel.php');
                                }
                                else{
                                    if($result[1] == a0 || $result[2] == a0 || $result[0] == a0){
                                        include('up.php');
                                        //echo "alert(".$coins.");";
                                        $coins = $coins - $bet + ($bet*2);
                                        //echo "alert(".$bet.");";
                                        include('coinSel.php');
                                    }
                                }
                            }
                        }
                    }
                } 
            }
        }
$_SESSION['coins'] = $coins;
header('Refresh:0; url=index.php');
?>