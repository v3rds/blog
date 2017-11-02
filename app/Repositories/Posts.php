<?php

namespace App\Repositories;

class Posts

{
	protected $redis;

	public function __construct(\App\Redis $redis)
		{
			$this->redis = $redis;
		}

	public function all()
		{
			return \App\Post::all();
		}

}