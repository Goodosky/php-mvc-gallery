<?php
$title = "Zapamiętane zdjęcia";
include "partials/header.php";
?>

<h1>Twoja wybrane zdjęcia</h1>

<form action="/remove-selected" method="POST">
  <div class="grid grid-cols-3 gap-5 mt-16">
    <?php foreach ($images as $image) : ?>
      <a href="static/images/watermarked-<?php echo $image['filename'] ?>">
        <img class="rounded-md" alt="" src="static/images/thumb-<?php echo $image['filename'] ?>" />
        <span class="text-base"><b>Autor:</b> <?php echo $image['author'] ?></span><br>
        <span class="text-base"><b>Tytuł:</b> <?php echo $image['title'] ?></span><br>

        <div class="text-base bg-dark flex w-fit px-3 rounded text-white mt-1">
          <input type="checkbox" name="unselected_images[]" id="<?= $image['filename'] ?>" value="<?= $image['filename'] ?>">
          <label class="px-3" for="<?= $image['filename'] ?>">Usuń z zapamiętanych</label>
        </div>
      </a>
    <?php endforeach ?>
  </div>

  <div class="mt-10">
    <button type="submit" name="action" value="remember_selected" class="text-lg bg-dark flex w-fit p-3 px-10 rounded text-white mt-1">Usuń wybrane z zapamiętanych</button>
  </div>
</form>

<?php include "partials/footer.php"; ?>