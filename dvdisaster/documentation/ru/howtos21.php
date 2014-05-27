<?php
# dvdisaster: English homepage translation
# Copyright (C) 2004-2014 Carsten Gnörlich
#
# UTF-8 trigger: äöüß 
#
# Include our PHP sub routines, then call begin_page()
# to start the HTML page, insert the header, 
# navigation and news if appropriate.

require("../include/dvdisaster.php");
require("../include/footnote.php");
$script_path = current(get_included_files());
$script_name = basename($script_path, ".php");
begin_page();
$answer=$_GET["answer"];
howto_headline("Создание данных для исправления ошибок", "Помощь в принятии решения", "images/create-icon.png");
?>

<!-- Insert actual page content below -->

<h3 class="top">Помощь в принятии решения</h3>

Данные для исправления ошибок могут быть созданы либо в виде отдельного файла,
либо они могут быть помещены непосредственно на носитель.
Выбирайте ответы на следующие вопросы, чтобы узнать, какой
метод вам больше всего подходит.<p>

<i>Вам нужны данные для исправления ошибок для уже сущестующего носителя?</i>
<ul>
<?php
if($answer <= 1) $mode="active"; else $mode="passive";
  echo "<li><a href=\"howtos21.php?answer=1\" class=\"$mode\">Да, носитель уже записан.</a></li>\n";;
if($answer != 1 || $answer >= 2) $mode="active"; else $mode="passive";
  echo "<li><a href=\"howtos21.php?answer=2\" class=\"$mode\">Нет, но я планирую записать носитель сейчас.</a></li>\n";
echo "</ul>\n";

if($answer == 1) 
{  echo "Вам нужно создать <a href=\"howtos22.php\">файл для исправления ошибок</a>\n";
   echo ", потому что на уже существующий носитель нельзя добавить данные для исправления ошибок.\n";
}

if($answer >= 2)
{  echo "<i>Сколько свободного места осталось на носителе?</i>\n";
   echo "<ul>\n";
   if($answer >= 2 && $answer != 4) $mode="active"; else $mode="passive";
      echo "<li><a href=\"howtos21.php?answer=3\" class=\"$mode\">На носителе осталось больше 20% свободного места.</a></li>\n";
   if($answer >= 2 && $answer != 3) $mode="active"; else $mode="passive";
      echo "<li><a href=\"howtos21.php?answer=4\" class=\"$mode\">Носитель заполнен или почти заполнен (менее 20% свободно)</a></li>\n";
   echo "</ul>\n";

   if($answer == 3)
   {  echo "Вы можете поместить данные для исправления ошибок <a href=\"howtos33.php\">непосредственно на носитель</a>.\n";
      echo "Чтобы сделать это, вы должны сначала создать ISO-образ, а затем добавить к нему\n";
      echo "данные для исправления ошибок до того, как вы запишите его на носитель.\n";
   }
   if($answer == 4)
   {  echo "На носителе не осталось свободного места для хранения данных для исправления ошибок.\n";
      echo "Вы должны создать отдельный <a href=\"howtos22.php\">файл для исправления ошибок</a>.\n";
   }
}
?>

<h3>Дополнительная информация о хранении данных для исправления ошибок</h3>

dvdisaster помогает защищать ваши носители от потери данных за счет
заблаговременного<sup>*)</sup> создания данных для исправления ошибок.
С данными для исправления ошибок нужно обращаться, как с обычными резервными данными, например,
необходимо хранить их на протяжении всего срока службы
соответствующего носителя.<p>

Самым простым способом является хранение данных для исправления ошибок на носителе,
который нужно защитить. Но это возможно лишь в том случае, если носитель еще
не записан: чтобы реализовать этот метод, нужно сначала создать ISO-образ,
затем дополнить этот образ данными для исправления ошибок, и, наконец,
записать увеличенный образ на носитель.<p>

Если носитель уже записан, или недостаточно места для дополнения
образа, все еще можно создать данные для исправления ошибок в виде
отдельного файла.
Этот файл необходимо хранить в другом месте, например, нужно предусмотривать дополнительные
меры для <a href="howtos24.php">архивирования</a> файлов для исправления ошибок.<p>

Дополнительную информацию по этим методам
можно найти в <a href="http://dvdisaster.net/legacy/en/background30.html">старой документации</a>. 

<pre> </pre>


<!-- do not change below -->

<?php
# end_page() adds the footer line and closes the HTML properly.

end_page();
?>
