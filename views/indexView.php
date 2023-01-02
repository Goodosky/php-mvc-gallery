<?php
$title = "Index - Galeria zdjęć";
include "partials/header.php";
?>

<h1>Galeria Zdjęć</h1>

<form action="/remember-selected" method="POST">
  <div class="grid grid-cols-3 gap-5 mt-16">
    <?php foreach ($images as $image) : ?>
      <a href="static/images/watermarked-<?= $image['filename'] ?>">
        <img class="rounded-md" alt="" src="static/images/thumb-<?= $image['filename'] ?>" />
        <span class="text-base"><b>Autor:</b> <?= $image['author'] ?></span><br>
        <span class="text-base"><b>Tytuł:</b> <?= $image['title'] ?></span><br>

        <div class="text-base bg-dark flex w-fit px-3 rounded text-white mt-1">
          <input type="checkbox" name="selected_images[]" id="<?= $image['filename'] ?>" value="<?= $image['filename'] ?>" <?= in_array($image['filename'], $selected_images) ? 'checked' : ''; ?>>
          <label class="px-3" for="<?= $image['filename'] ?>">Zapamiętaj</label>
        </div>
      </a>
    <?php endforeach ?>
  </div>

  <div class="mt-10">
    <button type=" submit" name="action" value="remember_selected" class="text-lg bg-dark flex w-fit p-3 px-10 rounded text-white mt-1">Zapamiętaj wybrane</button>
  </div>
</form>

<?php include "partials/footer.php"; ?>