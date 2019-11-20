<?php

function random_color() {
    return '#'.bin2hex(openssl_random_pseudo_bytes(3));
}