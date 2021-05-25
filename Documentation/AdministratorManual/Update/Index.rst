.. include:: ../../Includes.txt

Updating
========

If you update EXT:masterplan to a newer version, please read this section carefully!

Update to Version 3.0.4
-----------------------

We have changed some method arguments, please flush cache in InstallTool

Update to Version 3.0.0
-----------------------

We have removed TYPO3 8 and added TYPO3 10 compatibility. With this change we have removed all ViewHelpers.

mp:getTarget(): You will find targets in {project.areaOfActivity} in sub-property `targets`.
mp:getAreaOfActivities(): Please use {project.areaOfActivity} or new {areaOfActivities}
mp:sorting(): Was not used since over 5 years.
