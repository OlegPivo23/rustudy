<?php 

if (!empty($_POST["out_sum"])) {

    $out_sum = trim(htmlspecialchars(strip_tags($_POST["out_sum"])));

// your registration data
    $mrh_login = "Uchebnik_RKI-Privet_Rossiya_po_RKI"; 
    // $mrh_pass1 = "W1bQBYhHxmE0qLH151lQ";
    $mrh_pass1 = "AZKqf07v5oJAZaV0nD1X"; //тестовый
// order number. "" for random value
    $inv_id = "";

// urlencoded receipt
    $receipt = "%7B%22items%22:%5B%7B%22name%22:%22name%22,%22quantity%22:1,".
    "%22sum%22:11,%22tax%22:%22none%22%7D%5D%7D";

// double urlencode for headers
    $receipt_urlencode = urlencode($receipt);

// description of the order, if you need
    $inv_desc = "book";

// build own CRC
    $crc = md5("$mrh_login:$out_sum:$inv_id:$receipt:$mrh_pass1");

// payment form
    Header
("Location: https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&".
    "OutSum=$out_sum&InvId=$inv_id&Receipt=$receipt_urlencode&Desc=$inv_desc&".
    "SignatureValue=$crc");
}