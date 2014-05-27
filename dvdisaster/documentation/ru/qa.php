<?php
# dvdisaster: Russian homepage translation
# Copyright (C) 2007-2014 Igor Gorbounov
#
# UTF-8 trigger: äöüß 
#
# Include our PHP sub routines, then call begin_page()
# to start the HTML page, insert the header, 
# navigation and news if appropriate.

require("../include/dvdisaster.php");
begin_page();
?>

<!-- Insert actual page content below -->

<h3 class="top"><a name="top">Вопросы и ответы общего характера</a></h3>

<a href="#pronounce">1.1 Как правильно произносить "dvdisaster"?</a><p>
<a href="#pipo">1.2 Что такое проверка качества и почему бы вам не поддерживать больше возможностей?</a><p>
<a href="#compat">1.3 dvdisaster совместим с будущими версиями?</a><p>

<hr><p>

<b><a name="pronounce">1.1 Как правильно произносить "dvdisaster"?</a></b><p>
Поскольку это слово берет начало из английского языка, просто произносите "dv" перед
"disaster". Возможно, "ди-ви-дизастер" является подходящим
фонетическим представлением слова.
<div class="talignr"><a href="#top">&uarr;</a></div>

<b><a name="pipo">1.2 Что такое проверка качества и почему бы вам не поддерживать больше возможностей?</a></b><p>
Оптические носители имеют встроенный механизм коррекции ошибок, похожий на 
метод, используемый в dvdisaster. 
Некоторые приводы могут сообщать число ошибок, исправленных
при чтении носителя. Это дает приблизительную оценку качества 
записи и носителя.<p>

Так как dvdisaster - свободное программное обеспечение, в него могут входить только исходные тексты и информация,
которые могут свободно распространяться. В настоящий момент это справедливо 
для C2-<a href="howtos10.php">проверки</a> CD-носителей, 
которая официально стандартизирована, и у нее есть свободная документация.<p>

С другой стороны, проверки качества DVD ("PI/PO-проверки") не стандартизированы. 
Те поставщики приводов, которые поддерживают ее, используют патентованные прикладные
интерфейсы. Соответствующие спецификации, похоже, недоступны 
для использования в свободном ПО. Поэтому мы должны терпеливо ждать, пока изготовители 
не поймут, что если для привода будет больше ПО (и свободного), 
то это приведет к продаже еще большего количества приводов. <p>

<div class="talignr"><a href="#top">&uarr;</a></div>

<b><a name="compat">1.3 dvdisaster совместим с будущими версиями?</a></b><p>
Да, файлы dvdisaster предназначены для архивирования на многие годы.
При обновлении dvdisaster до новой версии вы можете по-прежнему использовать
существующий образ и файлы коррекции ошибок от предыдущих версий.
<i>Нет</i> необходимости вновь пересоздавать их.
<div class="talignr"><a href="#top">&uarr;</a></div><p>

<!-- do not change below -->

<?php
# end_page() adds the footer line and closes the HTML properly.

end_page();
?>
