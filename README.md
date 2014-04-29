DisqusCommentPagesIterator
==========================

Iterate DISQUS site comments (100 items per page). The page size can be changed.

**Some stats**

* Average comments page (100 per page) load time is 3.37 seconds
* That's it! :)
 
**Links**

* http://disqus.com/api/docs/cursors/
* http://disqus.com/api/docs/errors/
* http://www.php.net/manual/ru/class.iterator.php


**Usage Example**

```php
<?php
    // load classes
    require_once('DisqusCommentPagesIterator.php');
    require_once('DisqusCommentsPage.php');

    // init iterator
    $pages = new DisqusCommentPagesIterator();
    
    // loop pages
    foreach ($pages as $key => $page)
	{
	    var_dump($page);
	
	    // loop pages comments
		foreach ($page->getComments() as $comment)
		{
		    var_dump($comment);
		}
	}
?>
```

This will display somthing like the following:

```
object(DisqusCommentsPage)[4]
  public 'loadTime' => float 3.52
  public 'comments' => 
    object(stdClass)[5]
      public 'cursor' => 
        object(stdClass)[6]
          public 'prev' => null
          public 'hasNext' => boolean true
          public 'next' => string '1398236859000000:0:0' (length=20)
          public 'hasPrev' => boolean false
          public 'total' => null
          public 'id' => string '1398236859000000:0:0' (length=20)
          public 'more' => boolean true
      public 'code' => int 0
      public 'response' => 
        array (size=100)
          0 => 
            object(stdClass)[7]
              ...
          99 => 
            object(stdClass)[502]
              ...
object(stdClass)[7]
  public 'parent' => int 14564351375
  public 'likes' => int 0
  public 'forum' => string 'YOUR FORUM NAME' (length=14)
  public 'thread' => string '48647584354' (length=10)
  public 'isApproved' => boolean true
  public 'author' => 
    object(stdClass)[8]
      public 'username' => string 'disqus_M9IrLdjenv' (length=17)
      public 'about' => string '' (length=0)
      public 'name' => string '******' (length=6)
      public 'url' => string '' (length=0)
      public 'isAnonymous' => boolean false
      public 'rep' => float 1.245943
      public 'profileUrl' => string 'http://disqus.com/disqus_M9IrLdjenv/' (length=36)
      public 'reputation' => float 1.245943
      public 'location' => string '' (length=0)
      public 'isPrivate' => boolean false
      public 'isPrimary' => boolean true
      public 'joinedAt' => string '2014-04-03T02:41:29' (length=19)
      public 'id' => string '46845165354' (length=9)
      public 'avatar' => 
        object(stdClass)[9]
          public 'small' => 
            object(stdClass)[10]
              ...
          public 'isCustom' => boolean false
          public 'permalink' => string 'https://disqus.com/api/users/avatars/disqus_M6IrLdjenv.jpg' (length=58)
          public 'cache' => string '//a.disquscdn.com/uploads/users/10153/8576/avatar92.jpg?8698734818' (length=66)
          public 'large' => 
            object(stdClass)[11]
              ...
  public 'media' => 
    array (size=0)
      empty
  public 'isFlagged' => boolean false
  public 'dislikes' => int 0
  public 'raw_message' => string 'This is some comment message' (length=268)
  public 'createdAt' => string '2014-04-29T01:26:57' (length=19)
  public 'id' => string '1359973100' (length=10)
  public 'numReports' => int 0
  public 'isDeleted' => boolean false
  public 'isEdited' => boolean false
  public 'message' => string '<p>This is some comment message</p>' (length=275)
  public 'isSpam' => boolean false
  public 'isHighlighted' => boolean false
  public 'points' => int 0
```
