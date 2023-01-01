<?php
$title = "Index - Galeria zdjęć";
include "partials/header.php";
?>

<h1>Galeria Zdjęć</h1>

<div class="grid grid-cols-3 gap-5 mt-16">
  <?php foreach ($images as $image) : ?>
    <a href="static/images/watermarked-<?php echo $image['filename'] ?>">
      <img class="rounded-md" alt="" src="static/images/thumb-<?php echo $image['filename'] ?>" />
      <span class="text-base"><b>Autor:</b> <?php echo $image['author'] ?></span><br>
      <span class="text-base"><b>Tytuł:</b> <?php echo $image['title'] ?></span>
    </a>
  <?php endforeach ?>
</div>

<?php include "partials/footer.php"; ?>