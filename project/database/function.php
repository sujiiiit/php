<?php

function validate_data($fullname, $email, $city)
{
    $valid = true;

    if (empty($fullname)) {
        $valid = false;
    } elseif (strlen($fullname) < 3) {
        $valid = false;
    }

    if (empty($email)) {
        $valid = false;
    } else {
        // check if email is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
    }

    if (empty($city)) {
        $valid = false;
    }

    return $valid;
}

function searchCity($userInput, $cities)
{
    // Convert the user input to lowercase for case-insensitive matching
    $userInput = strtolower($userInput);
    $valid = true;
    // Check if the user input matches any city in the array
    if (in_array($userInput, array_map('strtolower', $cities))) {
        $valid = true;
    } else {
        $valid = false;
    }
    return $valid;
}
