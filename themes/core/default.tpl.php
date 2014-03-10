<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
  <link rel='shortcut icon' href="<?=$favicon?>">
  <link rel='stylesheet' href="<?=$stylesheet?>">
</head>
<body>
 <div id='wrap-header'>  
  <div id='header'>
   <div id='login-menu'>
    <?=login_menu()?>
   </div>
   <div id='banner'>
    <a href='<?=base_url()?>'><img class='site-logo' src='<?=$logo?>' alt='logo' width='<?=$logo_width?>' height='<?=$logo_height?>' /></a> 
    <p class='site-title'><?=$header?></p>
    <p class='site-slogan'><?=$slogan?></p>
   </div>
<<<<<<< HEAD
  </div>
 </div>
 <div id='wrap-main'>
=======
  </div>
 </div>
 <div id='wrap-main'>
=======
  <link rel='stylesheet' href="<?=$stylesheet?>">
</head>
<body>
  <div id='header'>
    <?=$header?>
  </div>
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
  <div id='main' role='main'>
    <?=get_messages_from_session()?>  
    <?=@$main?>
    <?=render_views()?>
  </div>
<<<<<<< HEAD
 </div>
 <div id='wrap-footer'>
=======
<<<<<<< HEAD
 </div>
 <div id='wrap-footer'>
=======
>>>>>>> 54b207c45d2f4e322a4c6c77068d2814af0d0f6c
>>>>>>> d875652d98481f4b50b42ee5ee85cebc41f27c92
  <div id='footer'>
    <?=$footer?>
    <?=get_debug()?>
  </div>
 </div>
</body>
</html>
