<?php
	/**
	 * Iterator class
	 *
	 * @link http://disqus.com/api/docs/cursors/
	 * @link http://disqus.com/api/docs/errors/
	 * @link http://www.php.net/manual/ru/class.iterator.php
	 */
	class DisqusCommentPagesIterator implements Iterator
	{
		protected $_apiKey         = "Your public API key here";
		protected $_forum          = "your site short code name";
		protected $_limit          = 100;
		protected $_getCommentsUrl = 'https://disqus.com/api/3.0/posts/list.json';
		protected $_response       = null;
		protected $_cursor         = null;

		/**
		 * @link http://www.php.net/manual/ru/iterator.current.php
		 */
		public function current()
		{
			return $this->_response;
		}

		/**
		 * @link http://www.php.net/manual/ru/iterator.key.php
		 */
		public function key()
		{
			return $this->_response->comments->cursor->id;
		}

		/**
		 * Get next page
		 *
		 * @link http://www.php.net/manual/ru/iterator.next.php
		 */
		public function next()
		{
			if (true === $this->_response->comments->cursor->hasNext)
			{
				$startTime = microtime(true);
				$requestParams = http_build_query(array(
					'api_key'	=> $this->_apiKey,
					'forum'	    => $this->_forum,
					'limit'	    => $this->_limit,
					'cursor'	=> $this->_response->comments->cursor->next,
				));
				$response = file_get_contents($this->_getCommentsUrl.'?'.$requestParams);
				$endTime  = microtime(true);

				$this->_response = new DisqusCommentsPage(
					json_decode($response),
					$endTime - $startTime
				);
			}
		}

		/**
		 * Get first page
		 *
		 * @link http://www.php.net/manual/ru/iterator.rewind.php
		 */
		public function rewind()
		{
			$startTime = microtime(true);
			$requestParams = http_build_query(array(
				'api_key'	=> $this->_apiKey,
				'forum'	    => $this->_forum,
				'limit'	    => $this->_limit,
			));
			$response = file_get_contents($this->_getCommentsUrl.'?'.$requestParams);
			$endTime  = microtime(true);

			$this->_response = new DisqusCommentsPage(
				json_decode($response),
				$endTime - $startTime
			);
		}

		/**
		 * Check fetched response for being valid
		 *
		 * @link http://www.php.net/manual/ru/iterator.valid.php
		 */
		public function valid()
		{
			return isset($this->_response->comments->code)
				&& ($this->_response->comments->code == 0);
		}
	}
?>
