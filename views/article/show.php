<?php

echo "Id: " . $article->getId() . "<br>";
echo "Nombre: " . $article->getTitle() . "<br>";
echo '<a href="http://localhost/simple-blog/article/edit/'.$article->getId().'">Edit</a><br>';
echo '<a href="http://localhost/simple-blog/article/remove/'.$article->getId().'">Remove</a><br>';
