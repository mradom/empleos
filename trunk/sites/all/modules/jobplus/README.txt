Job Plus

REQUIREMENTS

Version 5.x
This module provides additional functionality to the job module at project/jobsearch
It requires job, cck_address, activeselect and country_select (created to provide state/province select function for cck_address using activeselect).  This is available at http://drupal.org/project/cck_address)
For full functioning also download adv_taxonomy menu which is available as part of http://drupal.org/project/taxonomy_menu.  This provides the extra menu functions available on the demo sites, whereby you can filter down through several levels of categories.

Example live sites can be found at http://www.dermpedia.org/jobs and http://jobs.gutpedia.org

Version 6.x
This module is similar to version 5.x but uses the addresses module (http://drupal.org/project/jobsearch) and doesn't need country select but it does use activeselect.  The version 6.x module is not released yet but there is some working code here: http://drupal.org/node/298230.  If this does not work then the version I used may be downloaded here: http://webdev.passingphase.co.nz/?q=project/activeselect
Adv_taxonomy menu 6.x is available as a separate module here: http://drupal.org/project/adv_taxonomy_menu

An example live site can be found at http://www.crewcentral.com

Other Requirements:
Currently this module only works for one job content type which is called 'job'

**********************************************************************************************************************************************************************

INSTALLATION

- Install required modules as normal but make sure that the content copy module is installed BEFORE you install jobplus otherwise the job content type will not be created.
- If job content type fails to create on install then import the contents of the file includes/job-cck-type.txt into admin/content/types/import or just create a content type and call it job
- Create a CCK address field in the job content type and call it job_address.
- Create categories for jobs and configure adv_taxonomy_menu
- Configure jobplus settings
- Make sure that job type is selected 

-----------------------------------
Settings for 5.x 
- configure country_select for default country
- add a cck_address field to your job content type and configure it as follows
  'Free text Entry
  Allow other countries  (Since this system overrides the default cck_address functions we do not need to select any countries here (only Canada and US available anyway)
  Select at least state and country fields to use
  Ignore select from DB
------------------------------------
Settings for 6.x 
- Configure addresses module and select countries to include
- Add an addresses field to your job content type
------------------------------------

- Create a home page to use for jobs, and enter the url in 'admin/settings/job/jobplus_settings'
- Enable blocks for countries, province/states and for adv_taxonomy_menu menu
- Create jobs and have lots of fun!


**********************************************************************************************************************************************************************

FEATURES

- Built in Views for jobs by country and jobs by province/state
- Descriptive breadcrumb
- Any jobs with no country selected are reported here: 'admin/settings/job/countries'
- Filter jobs by many levels of categorization using adv_taxonomy menu
