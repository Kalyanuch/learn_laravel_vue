<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Jobs\AddNewComment;

/**
 * Implements comments functionality.
 */
class CommentController extends Controller
{

    /**
     * Adding new comment.
     *
     * @param CreateRequest $request
     *   Create comment request.
     *
     * @return \Illuminate\Http\JsonResponse
     *   Json response.
     */
    public function store(CreateRequest $request)
    {
        AddNewComment::dispatch($request['subject'], $request['body'], $request['article_id']);

        return response()->json([
            'status' => 'success',
        ], 200);
    }
}
