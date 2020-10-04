<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function path(){
        return '/threads/' . $this->channel->slug . '/' . $this->id;
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    /**
     * Add a reply to the thread.
     *
     * @param $reply
     */
    public function addReply($reply) {
        $this->replies()->create($reply);
    }
    // query is an instance of the query builder!
    public function scopeFilter($query, $filters) {
        return $filters->apply($query);
    }
}
