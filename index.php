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
          <li class="active"><a href="index.php"><span>Главная</span></a></li>
          <li><a href="about.php"><span>Информация</span></a></li>
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
          <?
          foreach ($repetitors as $rep){
              if(!isset($intentSubject)){
                  echo "<div class=\"article\">
                      <h2>$rep[name]</h2>
                      <div class=\"clr\"></div>";
                      if (!is_null($rep["photo"]))
                          echo "<div class=\"img\"><img src=\"images/$rep[photo]\" width=\"156\" height=\"207\" alt=\"\" class=\"fl\" /></div>";
                      else
                          echo "<div class=\"img\"><img src=\"images/anon.jpg\" width=\"156\" height=\"207\" alt=\"\" class=\"fl\" /></div>";
                      echo "
                      <div class=\"post_content\">
                        <p><strong>Предмет : $rep[subject].</strong></p>
                        <p>$rep[description]</p>
                        <p><strong>Адрес : $rep[address].</strong></p>
                        <p><strong>Кол-во обучающихся : $rep[student_count].</strong></p>
                        <p><strong>Рейтинг : $rep[ration].</strong> <div id='rating'></div></p>
                        <p><strong>Стоимость 1 занятия : $rep[cost] р.</strong></p>
                        <p class=\"spec\"><a href=\"#openModal\" class=\"rm\">Подать заявку</a></p>
                        <div id=\"openModal\" class=\"modalDialog\">
                            <div>
                                <a href=\"#close\" title=\"Закрыть\" class=\"close\">X</a>
                                <h2>Форма подачи заявки</h2>
                                <form action='handler.php' method='post'>
                                  <div class=\"form-group\">
                                    <label for=\"exampleInputEmail1\">Email</label>
                                    <input type=\"email\" class=\"form-control\" name='email' id=\"email\" placeholder=\"Email\">
                                  </div>
                                  <div class=\"form-group\">
                                    <label for=\"exampleInputPassword1\">Имя</label>
                                    <input type=\"text\" class=\"form-control\" name='name' id=\"name\" placeholder=\"Ваше имя\">
                                    <input type=\"hidden\" class=\"form-control\" name='rep_id' id=\"rep_id\" value='$rep[id]'>
                                    <input type=\"hidden\" name=\"request_type\" value=\"ticket\"/>

                                  </div>
                                  <button type=\"submit\" class=\"btn btn-default\">Оставить заявку</button>
                                </form>
                            </div>
                        </div>
                      </div>
                      <div class=\"clr\"></div>
                    </div>";
              }
              elseif ($intentSubject == $rep["subject"])
              {
                  echo "<div class=\"article\">
                      <h2>$rep[name]</h2>
                      <div class=\"clr\"></div>
                      <div class=\"img\"><img src=\"images/$rep[photo]\" width=\"156\" height=\"207\" alt=\"\" class=\"fl\" /></div>
                      <div class=\"post_content\">
                        <p>$rep[description]</p>
                        <p><strong>Адрес : $rep[address].</strong></p>
                        <p><strong>Кол-во обучающихся : $rep[student_count].</strong></p>
                        <p><strong>Рейтинг : $rep[ration].</strong></p>
                        <p><strong>Стоимость 1 занятия : $rep[cost] р.</strong></p>
                        <p class=\"spec\"><a href=\"#\" class=\"rm\">Подать заявку</a></p>
                      </div>
                      <div class=\"clr\"></div>
                    </div>";
              }

          }
          ?>
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
