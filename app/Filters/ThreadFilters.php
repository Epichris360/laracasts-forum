<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{   
    protected $filters = ['by', 'popular'];
    /**
     * Filter the query by a given username
     * 
     * @param $username
     * @return mixed
     */
    protected function by($username) {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
    /**
     * filter query by most popular threads
     * 
     * @return $this
     */
    protected function popular() {
        return $this->builder->reorder('replies_count', 'desc');
    }
}