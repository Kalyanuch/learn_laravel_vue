<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Implements job for add new comment.
 */
class AddNewComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Value of tries.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Comment subject.
     *
     * @var string
     */
    protected $subject;

    /**
     * Comment body.
     *
     * @var string
     */
    protected $body;

    /**
     * Comment article.
     *
     * @var int
     */
    protected $article_id;


    /**
     * Create a new job instance.
     *
     * @param string $subject
     *   Comment subject.
     * @param string $body
     *   Comment body.
     * @param int $article_id
     *   Comment article.
     */
    public function __construct(string $subject, string $body, int $article_id)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->article_id = $article_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = Comment::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'article_id' => $this->article_id,
        ]);
    }
}
