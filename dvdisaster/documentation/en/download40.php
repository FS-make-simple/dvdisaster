<?php
# dvdisaster: English homepage translation
# Copyright (C) 2004-2010 Carsten Gnörlich
#
# UTF-8 trigger: äöüß 
#
# Include our PHP sub routines, then call begin_page()
# to start the HTML page, insert the header, 
# navigation and news if appropriate.

require("../include/dvdisaster.php");
begin_page();
$show_all=$_GET["showall"];
?>

<!--- Insert actual page content below --->

<h3>Alpha (developer) versions</h3>

<b>Help us testing!</b> This page contains experimental dvdisaster versions
which are created on the way to the next stable release.<p>

<b>A word of caution:</b> This version is still evolving and some parts
are not yet implemented. It may contain severe bugs and fail in non-obvious
ways, even in functions which worked in previous versions. Do not use it
for productive work; that's what the <a href="download.php">stable version 0.72</a>
is for.

<hr>

<h3>Planned changes in the new version</h3>

All platforms:

<ul>
<li> Implement some small additions which have been put on hold
during the 0.72 development cycle. <i>[not yet started]</i></li>
<li> Remove obsolete functionality. <i>[completed]</i></li>
<li> Clean up source code and prepare for multithreading and multi core 
processors. <i>[in progress]</i></li>
<li> Implement the multithreaded RS03 codec. <i>[in progress]</i></li>
<li> Document RS03 usage. <i>[not yet started]</i></li>
</ul>

Windows:

<ul>
<li> Update the GTK+ toolkit and development system. <i>[completed]</i></li>
<li> Raise system requirements to Windows 2000 or newer (older
Windows releases are no longer supported by the development tools).
This makes support for ASPI drivers and splitting files into 2G
segments obsolete. <i>[completed]</i></li>
</ul>

MacOS:

<ul>
<li> Update the GTK+ toolkit and provide more workarounds
for the graphical user interface. <i>[not yet started]</i></li>
</ul>

<hr>

<h3>Downloads</h3>
<a name="download">

The alpha versions use the same package format as the regular releases.<p>

<table class="download" cellpadding="0" cellspacing="5">
<tr><td><b>dvdisaster-0.79</b></td><td align="right">XX-Jan-2010</td></tr>
<tr bgcolor="#000000"><td colspan="2"><img width=1 height=1 alt=""></td></tr>
<tr><td colspan="2">
  <table>
    <tr><td align="right">&nbsp;&nbsp;Source code for all operating systems:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1.tar.bz2">dvdisaster-0.79.1.tar.bz2</a></td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1.tar.bz2.gpg">dvdisaster-0.79.1.tar.bz2.gpg</a></td></tr>
    <tr><td align="right">Binary for Mac OS X 10.5 / x86:&nbsp;</td>
        <td>not provided with this release<!---<a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1.app.zip">dvdisaster-0.79.1.app.zip</a>&nbsp;--&nbsp;please read these <a href="download30.php#mac">hints</a> first---></td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><!---<a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1.app.zip.gpg">dvdisaster-0.79.1.app.zip.gpg</a>---></td></tr>
    <tr><td align="right">Binary for Windows:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1-setup.exe">dvdisaster-0.79.1-setup.exe</a></td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.1-setup.exe.gpg">dvdisaster-0.79.1-setup.exe.gpg</a></td></tr>
    <tr><td colspan="2"> </td></tr>

<?php
  if($show_all == 0) {
?>
<!---
    <tr><td colspan="2"><a href="download40.php?showall=1#download">Show older releases in the 0.79 version branch</a></td></tr>
--->
<?php
  }
  else {
?> 
<!---
   <tr><td colspan="2"><a href="download40.php?showall=0#download">Hide older releases in the 0.79 version branch</a></td></tr>
--->

<!---
    <tr><td align="right">&nbsp;&nbsp;Source code for all operating systems:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0.tar.bz2">dvdisaster-0.79.0.tar.bz2</a></td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0.tar.bz2.gpg">dvdisaster-0.79.0.tar.bz2.gpg</a></td></tr>
    <tr><td align="right">Binary for Mac OS X 10.5 / x86:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0.app.zip">dvdisaster-0.79.0.app.zip</a>&nbsp;--&nbsp;please read these <a href="download30.php#mac">hints</a> first</td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0.app.zip.gpg">dvdisaster-0.79.0.app.zip.gpg</a></td></tr>
    <tr><td align="right">Binary for Windows:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0-setup.exe">dvdisaster-0.79.0-setup.exe</a></td></tr>
    <tr><td align="right">Digital signature:&nbsp;</td>
        <td><a href="http://dvdisaster.net/downloads/dvdisaster-0.79.0-setup.exe.gpg">dvdisaster-0.79.0-setup.exe.gpg</a></td></tr>
--->
<?php
  }
?>
  </table>
</td></tr>
<tr bgcolor="#000000"><td colspan="2"><img width=1 height=1 alt=""></td></tr>
<tr><td colspan="2">

<b>0.79.1</b>(XX-Jan-2010)<br>
<b>All platforms:</b> This release contains major internal changes compared
to 0.72.x. Please use it carefully. A reference implementation
of the RS03 codec is
included. This version is only supplied so that interested people can
compare it against its <a href="download50.php">specification</a>.
Take care and do not use it for productive work. The final version will
be released with version 0.80.
<br>
<b>Windows:</b> All components of the development environment and the
supplied libraries have been updated. Please test whether the graphical
user interface and localization still work as expected.
</td></tr></table><p>

<!--- do not change below --->

<?php
# end_page() adds the footer line and closes the HTML properly.

end_page();
?>
