<?
function vardump($var) {
    echo '< pre >';
var_dump($var);
echo '< / pre >';
exit;
}



$intentSubject  = null;
if(isset($_GET["subject"]))
$intentSubject = $_GET["subject"];


if(isset($_GET["message"]))
$msg = $_GET['message'];

$jsonBytes = file_get_contents('data.json');
$data = json_decode($jsonBytes, true);

$repetitors = $data["repetitors"];

$subjects =  array();
foreach ($repetitors as $person){
if (!in_array($person["subject"],$subjects))
array_push($subjects,$person["subject"]);
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Репетитор онлайн</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/coin-slider.min.js"></script>
  <script type="javascript" src="js/bootstrap.min.js"></script>
  <script type="javascript" src="js/npm.js"></script>
</head>
<body>
<div class="main">
  <?
    if(isset($msg)){
        echo"<div class=\"alert alert-success\" role=\"alert\">Выша заявка создана! С вами свяжутся позднее.</div>";
}
?>
<div class="header">
  <div class="header_resize">
    <div class="slider">
      <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="960" height="500" alt="" /> </a>
        <a href="#"><img src="images/slide2.jpg" width="960" height="500" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="960" height="500" alt="" /> </a> </div>
    </div>
    <div class="menu_nav">
      <ul>
        <li ><a href="index.php"><span>Главная</span></a></li>
        <li ><a href="about.php"><span>Информация</span></a></li>
        <li class="active"><a href="contact.php"><span>Свяжитесь с нами</span></a></li>
      </ul>
    </div>
    <div class="logo">
      <h1><a href="index.php"><span>Скоро ЕГЭ?</span> <small>Это не проблема!</small></a></h1>
    </div>
    <div class="clr"></div>
  </div>
</div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Связь с администрацией</span></h2>
          <div class="clr"></div>
          <p>Если хотите сообщить об ошибке, различных пожеланиях или любой другой информации, просто напишите нам сообщение при помощи формы ниже. Мы обязательно учтем ваши пожелания!</p>
        </div>
        <div class="article">
          <h2><span>Отправка</span> сообщения</h2>
          <div class="clr"></div>
          <form action="handler.php" method="post" id="sendemail">
            <ol>
              <li>
                <label for="name">Имя (обязательно)</label>
                <input id="name" name="name" class="text" />
              </li>
              <li>
                <label for="email">Email (обязательно)</label>
                <input id="email" name="email" class="text" />
                <input type="hidden" name="request_type" value="message"/>
              </li>

              <li>
                <label for="message">Сообщение</label>
                <textarea id="message" name="message" rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="image" name="imageField" id="imageField" src="images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
      </div>
      <div class="sidebar">
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star">Предметы</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?
            foreach ($subjects as $item){
              echo "<li><a href=\"index.php?subject=$item\">$item</a></li>";
            }
            ?>

          </ul>
        </div>

      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c2">
        <h2><span>Почему</span> мы?</h2>
        <p>Наш сервис поможет вам подготовиться к экзамену по любому предмету.</p>
        <ul class="fbg_ul">
          <li><a href="#">Все наши преподаватели проверены.</a></li>
          <li><a href="#">Еженедельный обзвон клиентов.</a></li>
          <li><a href="#">Правдивая репутация репетиторов на основе отзывов.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Связь</span> с нами</h2>
        <p>Если возникли какие-либо вопросы,вы можете связаться с нами следующим образом:</p>
        <p class="contact_info"> <span>Адресс:</span> Галерея Чижова этаж 8 оф.314<br />
          <span>Телефон:</span> +890030303<br />
          <span>E-mail:</span> <a href="#">serebryanskiysergei@gmail.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Разработчик &copy; <a href="#">Серебрянский Сергей</a>. </p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
