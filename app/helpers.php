<?php

function back_url($default = '/dashboard') {
    $previous = url()->previous();
    $current = url()->current();

    return $previous !== $current ? $previous : url($default);
}