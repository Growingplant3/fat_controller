<?php

namespace App\Lib\LinkPreview;

interface ModelUpdateInterface
{
    public function making($model): ModelUpdateResponse;
}
