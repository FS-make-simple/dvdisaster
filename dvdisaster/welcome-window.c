/*  dvdisaster: Additional error correction for optical media.
 *  Copyright (C) 2004-2010 Carsten Gnoerlich.
 *  Project home page: http://www.dvdisaster.com
 *  Email: carsten@dvdisaster.com  -or-  cgnoerlich@fsfe.org
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA,
 *  or direct your browser at http://www.gnu.org.
 */

#include "dvdisaster.h"

/***
 *** Creates the welcome window shown after startup.
 ***/

/*
 * The welcome window is shown first,
 * so it is convenient to initialize our GC when it is exposed.
 */

static void toggle_cb(GtkWidget *widget, gpointer data)
{  int state  = gtk_toggle_button_get_active(GTK_TOGGLE_BUTTON(widget));

   Closure->welcomeMessage = state;
}

static gboolean expose_cb(GtkWidget *widget, GdkEventExpose *event, gpointer data)
{  GtkWidget *box = (GtkWidget*)data;

   if(!Closure->drawGC)
   {  GdkColor *bg = &widget->style->bg[0];

      GdkColormap *cmap = gdk_colormap_get_system();
      Closure->drawGC = gdk_gc_new(widget->window);

      memcpy(Closure->background, bg, sizeof(GdkColor));

      gdk_colormap_alloc_color(cmap, Closure->foreground, FALSE, TRUE);

      Closure->grid->red = bg->red-bg->red/8;
      Closure->grid->green = bg->green-bg->green/8;
      Closure->grid->blue = bg->blue-bg->blue/8;
      gdk_colormap_alloc_color(cmap, Closure->grid, FALSE, TRUE);

      /* This can't be done at closure.c */

      gdk_colormap_alloc_color(cmap, Closure->redText, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->greenText, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->barColor, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->logColor, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->curveColor, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->redSector, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->yellowSector, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->greenSector, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->blueSector, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->whiteSector, FALSE, TRUE);
      gdk_colormap_alloc_color(cmap, Closure->darkSector, FALSE, TRUE);

      /* Dirty trick for indenting the list:
	 draw an invisible dash before each indented line */

      if(Closure->welcomeMessage || Closure->version != Closure->dotFileVersion)
      {  GtkWidget *button;

	 Closure->invisibleDash = g_strdup_printf("<span color=\"#%02x%02x%02x\">-</span>",
						  bg->red>>8, bg->green>>8, bg->blue>>8);
	 AboutText(box, _("- Development frameworks for Windows and OS X updated.\n"
			  "- Experimental multithreaded codec (RS03).\n\n"
			  "<b>Warning:</b>\n"
			  "This version is experimental and for testing only.\n"
			  "It may contain bugs even in functions which worked\n"
			  "in previous versions."));

	 gtk_box_pack_start(GTK_BOX(box), gtk_hseparator_new(), FALSE, FALSE, 10);

	 button = gtk_check_button_new_with_label(_utf("Show this message again"));
	 gtk_toggle_button_set_active(GTK_TOGGLE_BUTTON(button), Closure->welcomeMessage);
	 g_signal_connect(G_OBJECT(button), "toggled", G_CALLBACK(toggle_cb), NULL);
	 gtk_box_pack_start(GTK_BOX(box), button, FALSE, FALSE, 0);

	 gtk_widget_show_all(box);
      }
   }

   Closure->dotFileVersion = Closure->version;

   return FALSE;
}

/*
 * Create the window
 */

void CreateWelcomePage(GtkNotebook *notebook)
{  GtkWidget *box,*align,*ignore;
   int show_msg;

   show_msg = Closure->welcomeMessage || Closure->version != Closure->dotFileVersion;

   align = gtk_alignment_new(0.5, 0.5, 0.0, 0.0);
   ignore = gtk_label_new("welcome_tab");
   box = show_msg ? gtk_vbox_new(FALSE, 0) : gtk_hbox_new(FALSE, 10);
   g_signal_connect(G_OBJECT(align), "expose_event", G_CALLBACK(expose_cb), box);
   gtk_notebook_append_page(notebook, align, ignore);

   gtk_container_add(GTK_CONTAINER(align), box);

   if(!show_msg)
   {  GtkWidget *widget;  
     return;
      widget  = gtk_image_new_from_stock("dvdisaster-create", GTK_ICON_SIZE_LARGE_TOOLBAR);
      gtk_box_pack_start(GTK_BOX(box), widget, FALSE, FALSE, 0);

      AboutText(box, "<span weight=\"bold\" size=\"xx-large\">dvdisaster</span>");
      return;
   }

   AboutText(box, _("<span weight=\"bold\" size=\"xx-large\">Welcome to dvdisaster!</span>"));

   AboutText(box, _("\ndvdisaster creates error correction data to protect\n"
		    "CD and DVD media against data loss.\n"));

   AboutTextWithLink(box, _("Please see the manual for [typical uses] of dvdisaster.\n\n"), 
		     "howtos.html");

   AboutText(box, _("<i>New in this Version:</i>"));

   /* actual list is generated in the expose event handler */

}

