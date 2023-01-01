<?php
$title = "Index - Galeria zdjęć";
include "partials/header.php";
?>

<h1>Galeria Zdjęć</h1>

<?php foreach ($images as $image) : ?>
  <div class="grid grid-cols-3 popup-gallery gap-5 mt-16">
    <a href="static/images/watermarked-<?php echo $image['filename'] ?>">
      <img class="rounded-md" alt="" src="static/images/thumb-<?php echo $image['filename'] ?>" />
    </a>
  </div>
<?php endforeach ?>



<?php include "partials/footer.php"; ?>