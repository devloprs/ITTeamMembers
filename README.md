# ITTeamMembers
Development Repo for ITTeamMembers

Installation: Just upload and activate the plugin and use the shortcode ct_team anywhere you wish to display members of the IT Team.

The plugin defines one custom post type called "team_members" and one taxonomy called "departments". In the custom post type you have the ability to add, remove, or set a department for a team member. The departments show up for filtering in the content and members are filtered in and out of the isotope presentation depending on which filter is selected. 

Stying is achieved with bootstrap gulp and gulp-sass. Open a terminal while in the itteammmembers plugin directory and run "npm install" to install packages. Type gulp to compile. All scss files are labeled and stored in the scss folder and output to css/app.css to be enqueued. 
