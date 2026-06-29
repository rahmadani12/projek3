<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notes', function () {
    return true;
});