# RSS Texting Readme

### Installation

For local server I am using MAMP but anything that can run PHP should be fine.

1. Pull the code down from github
2. Set up a mysql database named "rsstextingborn" and import the .sql file that is in the directory "_Backup_Database"
3. Open app->config->config.php and change the following to your server's settings or change $mode to whatever is appropriate (local, production, etc)
	```
	$config['base_url']	= "http://localhost:8888/";
	//DB
	$config['hostname'] = "localhost:3306";
	$config['db_username'] = "root";
	$config['db_password'] = "root"; 
	$config['db'] = "rsstextingborn";
	```
4. Change the 'BASE_URL' in the 'settings' table in the database to your server
5. Site is not located at the root but at http://localhost/siteadmin/login/ (if on localhost for example)
6. Set up a cronjob with the instructions in the directory "_Backup_CronJobs"
7. 


### Color Scheme
Primary Color:
00B3B3
228686
007474
36D9D9
62D9D9

Complementary Color:
FF7400
BF7130
A64B00
FF9640
FFB273

Secondary Color A:
FFAA00
BF8F30
A66F00
FFBF40
FFD073