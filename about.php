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
        <li class="active"><a href="about.php"><span>Информация</span></a></li>
        <li><a href="contact.php"><span>Свяжитесь с нами</span></a></li>
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
          <h2><span>Инфомрация о сайте</span> </h2>
          <div class="clr"></div>
          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</strong></p>
          <p>Curabitur purus mi, pharetra vitae viverra et, mattis sit amet nunc. Quisque enim ipsum, convallis sit amet molestie in, placerat vel urna. Praesent congue auctor elit, nec pretium ipsum volutpat vitae. Vivamus eget ipsum sit amet ipsum tincidunt fermentum. Sed hendrerit neque ac erat condimentum vulputate. Nulla velit massa, dictum etinterdum quis, tempus at velit.</p>
        </div>
        <div class="article">
          <h2><span>Наша</span> Цель</h2>
          <div class="clr"></div>
          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</strong></p>
          <p>Maecenas vestibulum fermentum eleifend. Mauris erat sem, suscipit non tincidunt quis, vestibulum eget elit. Duis eget arcu ante. Proin nulla elit, elementum sit amet commodo et, eleifend vitae quam. Nam vel aliquam tortor. Aliquam bibendum erat a urna interdum quis mattis augue interdum. Phasellus fermentum bibendum mauris, ut semper justo pharetra vestibulum. Duis dictum purus sed nibh commodo a congue elit lobortis. Nunc sed feugiat tellus. Mauris aliquet lorem non enim euismod quis fermentum erat porta. Nullam non elit orci. Aliquam blandit mattis feugiat. Cras pulvinar aliquet massa, quis laoreet mi pulvinar ac. Aliquam mi augue, vehicula in consectetur in, porttitor sed tellus. Mauris convallis dapibus auctor. Integer in egestas lorem. In nulla dolor, sollicitudin vitae sollicitudin quis, viverra at lorem.</p>
          <p>Ut ullamcorper velit et nisi feugiat non sagittis tortor pharetra. Mauris ut urna et magna commodo cursus. Curabitur quis elementum arcu. Maecenas eleifend, urna vitae vehicula bibendum, felis tellus tincidunt lorem, at iaculis neque eros ac dui. Nunc malesuada pulvinar suscipit. Phasellus sed tortor quis ligula facilisis aliquam. Aliquam quis magna eu dolor posuere malesuada. Quisque consequat, metus fermentum convallis imperdiet, ante justo pharetra enim, vel commodo ipsum mauris eget purus. Morbi lacinia nisl urna, scelerisque suscipit lacus. Nulla ac orci ut nunc venenatis gravida.</p>
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
