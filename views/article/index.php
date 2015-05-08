<?php

foreach ($articles as $article) {
    echo "Id: " . $article->getId() . "<br>";
    echo "Title: " . $article->getTitle() . "<br>";
    echo '<a href="http://localhost/simple-blog/article/edit/'.$article->getId().'">Edit</a><br>';
    echo '<a href="http://localhost/simple-blog/article/remove/'.$article->getId().'">Remove</a><br>';
    echo "<br></br>";
}
