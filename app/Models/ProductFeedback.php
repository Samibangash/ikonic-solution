<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    use HasFactory;


    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function getProduct()
    {
        return $this->belongsTo(User::class, 'product_id','id');
    }

    public function feedbackVotes()
    {
        return $this->hasMany(FeedbackVote::class, 'feedback_id', 'id')->sum('vote');
    }

    public function getFeedbackVoteCount()
    {
        return $this->feedbackVotes();
    }

    public function getComment()
    {
        return $this->hasMany(Comment::class, 'product_feedback_id','id');
    }
}
