<?php
namespace App\Lib\LinkPreview;

final class ModelUpdateResponse
{
    public string $comment;
    public int $category;

    public function __construct($model, string $comment, int $category)
    {
        $model->comment = $comment;
        $model->category = $category;
    }
}
