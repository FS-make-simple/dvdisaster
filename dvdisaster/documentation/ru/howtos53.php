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
require("../include/screenshot.php");

begin_page();
?>

<!-- Insert actual page content below -->

<h3 class="top">Результаты для образов, дополненных данными для исправления ошибок</h3>

<?php begin_howto_shot("Образ с данными для исправления ошибок.","compat-okay-rs02.png", ""); ?>
При проверке образа по встроенным в него данным для исправления ошибок информация 
выводится относительно: 
<ul>
<li>всего (дополненного) образа</li>
<li>части, относящейся к данным для исправления ошибок:</li>
</ul>
<?php end_howto_shot(); ?>

<table>
<tr><td colspan="2">Выходное поле <b>"Отчет по файлу образа":</b><br><hr></td><td></td></tr>
<tr>
<td class="valignt">Секторов на носителе:</td>
<td>Число секторов в дополненном образе (включае сектора, добавленные 
dvdisaster'ом; один сектор = 2КБ).</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">Контрольная сумма данных:</td>
<td>Контрольная сумма MD5 для первоначального образа (до добавления к нему 
данных для исправления ошибок).</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td>
Ecc-заголовки:<br>
Раздел данных:<br>
Раздел crc:<br>
Раздел ecc:
</td>
<td class="valignt">Дополненный образ состоит из трех разделов плюс 
секторы ecc-заголовков, встроенных в них. Эти значения описывают, сколько секторов не читаются в соответствующих разделах.
</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr><td colspan="2">
Если все значения в этих выходных полях в порядке, то появится сообщение
"<span class="green">Хороший образ.</span>".
В противном случае здесь будет объяснена наиболее важная ошибка.
</td>
</tr>

<tr><td>&nbsp;</td><td></td></tr>
<tr><td colspan="2">Выходное поле <b>"Данные для исправления ошибок":</b><br><hr></td><td></td></tr>
<tr>
<td class="valignt">Создано:</td>
<td>Выводится версия dvdisaster'а, которая использовалась для создания
данных для исправления ошибок. Красным выделяются альфа-версии и версии для разработчиков.</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">Метод:</td>
<td>Метод и избыточность, использовавшиеся для создания данных для исправления ошибок.</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">Требуется:</td>
<td>Для обработки данных для исправления ошибок требуется версия dvdisaster'а не ниже указанной.</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">Секторов на носителе:</td>
<td>Первое значение - это число секторов в дополненном образе;
второе описывает число секторов, которое было в образе до его обработки
dvdisaster'ом. Поскольку данные для исправления ошибок помещаются 
за пользовательскими данными, контрольная сумма первоначального образа может быть получена
следующим образом (используя командную строку GNU/Linux):<br>
<tt>head -c $((2048*121353)) medium.iso | md5sum</tt><br>
Первый параметр для <i>head</i> - это размер сектора (2048),
умноженный на длину первоначального образа (121353). Это свойство
дополненных образов может быть также использовано для отсечения данных для исправления ошибок:<br>
<tt>head -c $((2048*121353)) medium.iso >stripped_image.iso</tt>
</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">Контрольная сумма данных:</td>
<td>Контрольная сумма MD5 первоначального образа (смотрите предыдущее объяснение).</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr>
<td class="valignt">
Контрольная сумма CRC:<br>
Контрольная сумма ECC:</td>
<td>Контрольные суммы MD5 разделов CRC и ECC дополненного образа.
Эти два значения непросто воспроизвести вне dvdisaster.</td>
</tr>
<tr><td>&nbsp;</td><td></td></tr>

<tr><td colspan="2">
Если все значения в этом выходном поле в порядке, то появится сообщение
"<span class="green">Хорошие данные для исправления ошибок.</span>".
В противном случае здесь будет объяснена наиболее важная ошибка.
</td>
</tr>

</table>

<!-- do not change below -->

<?php
# end_page() adds the footer line and closes the HTML properly.

end_page();
?>
