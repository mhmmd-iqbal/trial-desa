<?php

function clean($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}