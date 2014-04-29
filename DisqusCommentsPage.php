<?php

class DisqusCommentsPage
{
		public $loadTime = 0;
		public $comments = null;

		public function __construct($comments, $loadTime = 0)
		{
			$this->comments = $comments;
			$this->loadTime = (float) number_format($loadTime, 2);
		}

        /**
         * Get comments array
         *
         * @return array
         */
		public function getComments()
		{
			return $this->comments->response;
		}

        /**
         * Get total comments count
         *
         * @return int
         */
		public function totalComments()
		{
			return count($this->comments->response);
		}
}

?>
