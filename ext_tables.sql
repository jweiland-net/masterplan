#
# Table structure for table 'tx_masterplan_domain_model_project'
#
CREATE TABLE tx_masterplan_domain_model_project (
	title varchar(255) DEFAULT '' NOT NULL,
	path_segment varchar(2048) DEFAULT '' NOT NULL,
	number varchar(255) DEFAULT '' NOT NULL,
	contact_person varchar(255) DEFAULT '' NOT NULL,
	organisationseinheiten int(11) unsigned NOT NULL default '0',
	start_date varchar(50) DEFAULT '' NOT NULL,
	end_date varchar(50) DEFAULT '' NOT NULL,
	costs varchar(255) DEFAULT '' NOT NULL,
	citizen_participation tinyint(1) unsigned DEFAULT '0' NOT NULL,
	images int(11) unsigned NOT NULL default '0',
	description text NOT NULL,
	further_informations text NOT NULL,
	files int(11) unsigned NOT NULL default '0',
	links int(11) unsigned NOT NULL default '0'
);

#
# Table structure for table 'tx_masterplan_domain_model_link'
#
CREATE TABLE tx_masterplan_domain_model_link (
	title varchar(255) DEFAULT '' NOT NULL,
	link varchar(255) DEFAULT '' NOT NULL,
	project int(11) DEFAULT '0' NOT NULL
);
