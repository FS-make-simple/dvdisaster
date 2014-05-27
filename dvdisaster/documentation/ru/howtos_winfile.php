<?php
# dvdisaster: English homepage translation
# Copyright (C) 2004-2014 Carsten Gnörlich
#
# UTF-8 trigger: äöüß 
#
# Include our PHP sub routines, then call begin_page()
# to start the HTML page, insert the header, 
# navigation and news if appropriate.
?>

<a name="filechooser"></a>
<b>Замечания к использованию диалога выбора файлов в среде Windows и Mac OS X</b><p>

dvdisaster использует набор средств для создания пользовательского интерфейса <a href="http://www.gtk.org">GTK+</a>, который работает на множестве различных операционных систем. Поскольку
диалог выбора файлов в GTK+ работает не так, как его аналоги в Windows и Mac OS X (которые мы не можем использовать), дальше на этой странице дается краткое знакомство с ним.
Имейте в виду, что для создания версии под Windows или Mac OS X без GTK+ потребовались бы колоссальные усилия - мы, скорее всего, попросту бы сконцентрировались на 
версии для GNU/Linux ;-)<p>

<?php begin_screen_shot("Выбор файлов в версии для Windows","filebrowser.png"); ?>

<b>Выбор существующих файлов.</b>
Области, отмеченные <span class="green">зеленым,</span> используются для выбора существующих файлов.
Перемещение по каталогам и их выбор делается в левой части диалога; содержащиеся здесь
файлы показываются и выбираются в правой половине.<p>

<b>Выбор имени и местоположения новых файлов.</b> 
Сначала выберите каталог для нового файла, используя 
<span class="green">зеленую</span> область в левой половине диалогового окна.
Затем введите имя нового файла в  
текстовом поле, отмеченном <span class="blue">голубым</span>. 
Чтобы еще раз убедиться, что вы создаете файл в правильном месте, посмотрите
на надпись после "Выбор:" над <span class="blue">голубым</span> полем; в ней содержится
буква диска и полный каталог, в котором будет создаваться новый файл.<p>

<b>Переключение между разделами ("буквами дисков").</b>

Имеющиеся разделы перечисляются в  
области, помеченной <span class="yellow">желтым</span>. Если текущий диск
содержит множество подкаталогов, то вам придется, наверное, прокрутить вниз, чтобы увидеть буквы дисков.<p>

<b>Возврат в вышестоящий каталог.</b>
Нажмите мышкой на две точки (..), отмеченные <span class="red">красным,</span>
для возврата на один уровень каталогов. Все каталоги, ведущие к текущему,
содержатся в выпадающем меню, расположенном в центре верхней части диалогового окна
(тоже отмечено <span class="red">красным</span>). 
Имейте в виду, что это выпадающее меню <i>не</i> используется для переключения букв дисков;
используйте для этого <span class="yellow">желтую</span> часть списка выбора.

<?php end_screen_shot(); ?>
