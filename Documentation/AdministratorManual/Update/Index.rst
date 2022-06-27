.. include:: ../../Includes.txt

Updating
========

If you update EXT:masterplan to a newer version, please read this section carefully!

Update to Version 4.0.0
-----------------------

We have removed TYPO3 9 compatibility.

As f:widget.paginate is deprecated and POST requests are not allowed anymore in this widget, we have rewritten
the widget to new TYPO3 Pagination API.

Please remove the f:widget.paginate from Templates and insert this code:

.. code-block:: html

   <f:render partial="Component/Pagination"
             arguments="{pagination: pagination, paginator: paginator, actionName: actionName}" />


Update to Version 3.0.4
-----------------------

We have changed some method arguments, please flush cache in InstallTool


Update to Version 3.0.0
-----------------------

We have removed TYPO3 8 and added TYPO3 10 compatibility. With this change we have removed all ViewHelpers.

mp:getTarget(): You will find targets in {project.areaOfActivity} in sub-property `targets`.
mp:getAreaOfActivities(): Please use {project.areaOfActivity} or new {areaOfActivities}
mp:sorting(): Was not used since over 5 years.
