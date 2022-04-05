<?php

namespace App\Bookmark\UseCase;

// use App\Lib\LinkPreview\LinkPreviewInterface;
use App\Lib\LinkPreview\ModelUpdateInterface;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class UpdateBookmarkUseCase
{
    private ModelUpdateInterface $modelUpdate;

    public function __construct(ModelUpdateInterface $modelUpdate)
    {
        $this->modelUpdate = $modelUpdate;
    }

    public function handle(int $id, string $comment, int $category)
    {
        $model = Bookmark::query()->findOrFail($id);

        if ($model->can_not_delete_or_edit) {
            throw ValidationException::withMessages([
                'can_edit' => 'ブックマーク後24時間経過したものは編集できません'
            ]);
        }

        if ($model->user_id !== Auth::id()) {
            abort(403);
        }

        // $model->comment = $comment;
        // $model->category_id = $category;
        // $model->save();
        $this->modelUpdate->making($model);
    }
}
