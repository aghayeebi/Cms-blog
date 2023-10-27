<?php

//helpers function
function is_auth(): bool
{
    if (auth()->user()) {
        return true;
    }
    return false;
}
