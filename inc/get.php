<?php
include "functions.php";

function content(){
    $do = g("do");
    $conn = db();
    Switch ($do){

        case "slot":
            $slots = array();
            $slot = mysqli_query($conn, "SELECT * FROM slot");
            while ($row = row($slot)){
                $slotId = $row["id"];
                $slotName = $row["name"];
                $arr1 = array('id' => $slotId);
                $arr2 = array('name' => $slotName);
                $slots[$slotId] = $arr1 + $arr2;
            }
            require_once "pages/slot.php";
            break;

        case "add_ad":
            $slot = mysqli_query($conn, "SELECT * FROM slot");
            while ($row = row($slot)){
                $slotId = $row["id"];
                $slotName = $row["name"];
                $arr1 = array('id' => $slotId);
                $arr2 = array('name' => $slotName);
                $slots[$slotId] = $arr1 + $arr2;
            }
            require_once "pages/add_ad.php";
            break;

        case "add_ad_post":
            if (!empty($_POST)) {
                $name = p("name", true);
                $slot = p("slot", true);
                $code = p("code");
                $insert = mysqli_query($conn,"INSERT INTO ads SET
                          name = '$name',
                          slot = '$slot',
                          code = '$code'");
                if($insert){
                    echo "Eklendi";
                }else{
                    echo mysqli_error($conn);
                }
            }else{
                echo "peki";
            }
            break;

        default:
            if (!g("do")){
                $ads = [];
                /*$adsQuery = mysqli_query($conn, "SELECT * FROM ads
                                         INNER JOIN slot ON slot.id = ads.slot");*/

                $adsQuery = mysqli_query($conn, "SELECT *, c.id as cid, c.name as cname,
                                                        a.id as aid, a.name as aname 
                                                        FROM ads a
                                                        INNER JOIN slot c           
                                                        ON a.id = c.id");

                while ($row = row($adsQuery)){
                    $slotId = $row["aid"];
                    $slotName = $row["aname"];
                    $categoryName = $row["cname"];
                    $arr1 = array('id' => $slotId);
                    $arr2 = array('name' => $slotName);
                    $arr3 = array('category' => $categoryName);
                    $ads[$slotId] = $arr1 + $arr2 + $arr3;
                }
                require_once "pages/home.php";
            }else{
                echo "Wow";
            }
            break;

    }

}