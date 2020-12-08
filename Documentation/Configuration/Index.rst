.. include:: ../Includes.txt


.. _configuration:

=============
Configuration
=============

Target group: **Developers, Integrators**

How to configure the extension. Try to make it easy to configure the extension.
Give a minimal example or a typical example.


Minimal Example
===============

- It is necessary to include static template `Masterplan (masterplan)`

We prefer to set a Storage PID with help of TypoScript Constants:

.. code-block:: none

   plugin.tx_masterplan.persistence {
      # Define Storage PID where project records are located
      storagePid = 4
   }

.. _configuration-typoscript:

TypoScript Setup Reference
==========================


.. _pidOfDetailPage:

pidOfDetailPage
---------------

Example: plugin.tx_masterplan.settings.pidOfDetailPage = 4

If you want, you can change the links in project listing to link to another page UID.
By default the detail view uses current page.


.. _pidOfListPage:

pidOfListPage
-------------

Example: plugin.tx_masterplan.settings.pidOfListPage = 2

If you have defined a detail page you may link back to the list page.
By default the link back to list view used the current page.


.. _pidOfLocationPage:

pidOfLocationPage
-----------------

Example: plugin.tx_masterplan.settings.pidOfLocationPage = 3

You can assign a PoiCollection of EXT:maps2 to a project. Choose a page UID
where the maps2 plugin is located.


.. _list:

list
----

Default: 50c for width and height

Example: plugin.tx_masterplan.settings.list.image.width = 150c

Currently not implemented in Template, but if you want, you can use this
setting to show one or more images with a defined width and height.


.. _show:

show
----

Default: 240c for width and 180c for height

Example: plugin.tx_masterplan.settings.show.image.width = 120c

If you want, you can use this setting to show one or more images
with a defined width and height.


.. _pageBrowser:

pageBrowser
-----------

You can fine tuning the page browser

Example: plugin.tx_masterplan.settings.pageBrowser.itemsPerPage = 15
Example: plugin.tx_masterplan.settings.pageBrowser.insertAbove = 1
Example: plugin.tx_masterplan.settings.pageBrowser.insertBelow = 0
Example: plugin.tx_masterplan.settings.pageBrowser.maximumNumberOfLinks = 5

**itemsPerPage**

Reduce result of project records to this value for a page

**insertAbove**

Insert page browser above list of project records

**insertBelow**

Insert page browser below list of project records. I remember a bug in TYPO3 CMS. So I can not guarantee
that this option will work.

**maximumNumberOfLinks**

If you have many project records it makes sense to reduce the amount of pages in page browser to a fixed maximum
value. Instead of 1, 2, 3, 4, 5, 6, 7, 8 you will get 1, 2, 3...8, 9 if you have configured this option to 5.
