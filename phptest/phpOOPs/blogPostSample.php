<?php

/* we're going to create a class for a blog post. 
 * Let's also say that our blog post will have an author, 
 * a date on which it was published, whether or not it is published, 
 * and the actions to publish and delete.
 */

class blog_post{
    private $author;
    private $publish_date;
    private $is_published;
    public function publish() {
        // Publish the article here
    }
     
    public function delete() {
        // Delete the article here
    }
}
$first_post = new Blog_Post();
$second_post = new Blog_Post();