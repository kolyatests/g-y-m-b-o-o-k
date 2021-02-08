<?php

function dateNow()
{
    return date('Y-m-d', strtotime(date('Y-m-d H:i:s')) + session('offset', 0));
}

