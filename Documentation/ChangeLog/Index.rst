..  include:: /Includes.rst.txt

..  _changelog:

=========
ChangeLog
=========

Version 7.0.0
=============

*   [TASK] Improve formatting and consistency in documentation
*   [TASK] Standardize include directive paths in documentation
*   [TASK] Remove dependency on EXT:service_bw2
*   [TASK] Remove Organisationseinheiten from project configuration
*   [TASK] Update allowed file type in TCA configuration
*   [TASK] Update plugin icon and remove unused TSconfig
*   [TASK] Add missing newline at EOF in ext_conf_template.txt
*   [TASK] Update .editorconfig for consistent formatting
*   [TASK] Fix Fluid template indentation
*   [TASK] Remove redundant blank lines in language files
*   [TASK] Fix formatting in ProjectController annotations
*   [TASK] Remove redundant class PHPDoc block
*   [TASK] Remove redundant PHPDoc annotations
*   [TASK] Fix formatting in settings.definitions.yaml
*   [DOCS] Fix line break in README.md
*   [TASK] Remove redundant call_user_func wrapper
*   [TASK] Format Icons.php for improved readability
*   [TASK] Update extension descriptions in metadata files
*   [TASK] Refactor runTests script for improved functionality
*   [TASK] Refactor PHP-CS-Fixer configuration structure
*   [TASK] Remove PHP-CS-Fixer configuration file
*   [TASK] Add area_of_activity field to project TCA
*   [TASK] Remove unused fields from database schema
*   [TASK] Remove unused localization and system fields

Version 6.0.5
=============

*   [TASK] Updated wizard title with [extension] name format

Version 6.0.4
=============

*   [BUGFIX] Remove deprecated usage of SoftRef parser: images

Version 6.0.3
=============

*   [BUGFIX] Removed Lazy Load for Category property

Version 6.0.2
=============

*   [BUGFIX] Fixed Property Type issues

Version 6.0.1
=============

*   [TASK] SiteSets Configuration fixes
*   [BUGFIX] Fixed invalid Controller action combination

Version 6.0.0
=============

*   TYPO3 13 LTS Compatibility Fixes
*   Remove old version compatibilities

Version 4.0.0
=============

*   Remove TYPO3 9 compatibility
*   Add Events to all Controller Actions
*   Add Event Listener to add Pagination

Version 3.0.4
=============

*   Move SlugHelper from constructor argument into getSlugHelper()

Version 3.0.2
=============

*   Add addQueryStringMethod to f:widget.paginate

Version 3.0.1
=============

*   Set title as required, as it is required for path_segment generation

Version 3.0.0
=============

*   Removed TYPO3 8 compatibility
*   Add TYPO3 10 compatibility
*   Removed all masterplan ViewHelpers
*   Wrapped all templates in HTML namespace
*   New SVG icons for extension and tables
*   Implement new structure of areaOfActivities
*   Better structure of TCA for backend
*   Repair filtering projects in ProjectRepository
*   Add path_segment for Slugs incl. UpgradeWizard
*   Add new documentation
