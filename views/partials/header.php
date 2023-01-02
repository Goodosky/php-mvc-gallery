<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#EFBB43" />
  <meta name="msapplication-navbutton-color" content="#EFBB43" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#EFBB43" />
  <title><?php echo $title ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="static/css/tailwind.css" />
</head>

<body class="body relative">
  <header class="absolute w-full a-mb-0">
    <div class="container flex items-center text-xl pt-3">
      <a class="text-white uppercase text-2xl tracking-widest font-light xl:text-3xl" href="/">Piłeczka24<span class="text-xl">.pl</span></a>
      <ul class="gap-7 lg:flex lg:justify-center text-white/95 ml-auto mr-12 maxlg:hidden">
        <li><a class="animated-underline" href="/addImage">Dodaj zdjęcie</a></li>
        <li><a class="animated-underline" href="/show-selected">Pokaż zapisane</a></li>
      </ul>
      <a class="btn flex items-center maxlg:-mt-1 maxlg:p-3 maxlg:ml-auto" id="change-theme-btn" href="/login"><svg class="text-c1 lg:mr-2 lg:hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
        </svg><span class="maxlg:hidden">Zaloguj się</span></a>
    </div>
  </header>
  <main class="overflow-hidden">
    <section class="bg-dark gradient1 my-0 pt-16 pb-10 lg:py-20">
      <div class="container relative max-w-fit sm:text-center pt-12 pb-0">
        <h1 class="text-white text-2xl sm:text-4xl xl:text-5xl mb-4 sm:mb-6">
          <?php echo $title ?>
        </h1>
    </section>
    <section class="container">