.. include:: ../../Includes.txt

Routes
======

With TYPO3 9 you have the possibility to configure RouteEnhancers

Example Configuration
---------------------

.. code-block:: none

   routeEnhancers:
     MasterplanPlugin:
       type: Extbase
       extension: Masterplan
       plugin: Masterplan
       routes:
         -
           routePath: '/first-masterplan-page'
           _controller: 'Project::list'
         -
           routePath: '/show/{project_title}'
           _controller: 'Project::show'
           _arguments:
             project_title: project
       requirements:
         project_title: '^[a-zA-Z0-9\-]+$'
       defaultController: 'Project::list'
       aspects:
         project_title:
           type: PersistedAliasMapper
           tableName: tx_masterplan_domain_model_project
           routeFieldName: path_segment
