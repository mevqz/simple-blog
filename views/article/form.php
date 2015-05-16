<form action="<?php echo "http://localhost/simple-blog/article/".$action; ?>" method="post">
	Id: <input type="text" name="id" value="<?php echo $article->getId(); ?>"/><br>
	Title: <input type="text" name="title" value="<?php echo $article->getTitle(); ?>"/><br>
	<input type="submit" name="Enviar" value="<?php echo $buttonName; ?>"/>
</form>


