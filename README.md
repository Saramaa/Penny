Penny
=====

Penny is a MVC (Model view controller) and is made by Anna Dahlgren. You are free to use it!

Information
-----------
At first, you have do clone all the codes from Penny. Then you need to put them on your server and go to the index page.
It could look like this: <code>http://www.student.bth.se/~ankw11/phpmvc/Projekt/</code>.
Penny needs to be installed and that's actually a piece of cake! You just have to read the text, click "Continue" and do some small changes.

If you want to, you can modify Penny's look. Add a new icon, change the title and so on... Personalize it!

You can add a content, a page and a blog. You will automaticully be the Administrator of Penny, so you can delete users that misbehave.
At this moment, all you can do as Administrator is to create new users and delete users.
But... you cannot delete yourself. You cannot delete the anonomous or the doe user either.
You acces the Admin Control Panel when you log in as root. 
Other users are not able to see the link to the Admin Control Panel.

Important about the Administator
--------------------------------
When Penny is installed, the Administrator logs in as root and password root.
It is important to change the password so only you know about it. 

Installation
============
First, you need to clone all the codes to your local machine.
Open git bash or someting similar and type the following code when you are ready to clone:
<code>git clone https://github.com/annaapelsin/Penny.git</code>

You also need to do the site/data directory writable, but if you want to wait a little bit, it's all OK!
You can do this step later on when you install Penny. 
<code>cd Penny</code> 
<code>chmod 777 site/data</code>

When you are ready to install you will see the start page saying:
"<h3>Overview</h3>

<h5>Welcome to Penny. This is the installation phase of Penny.
You will go through the following steps:

*Verify the server environment.
*Verify that the directory site/data is writable.
*Verify that the default database is available.
*Install all Penny modules.
*Review settings in the configuration file, config.php.
Does it make sense?</h5>"

Just click continue and you are in!
Penny will go through this steps and when it's done you will see:
"<h2>Welcome</h2>
<h5>This is Penny, ready to be used.</h5>"

If you didn't make the site/data writable in the beginning, you will see this:
<code>Failed. The data directory exists but it is NOT writable.</code>

Correct this by changing the permissions on the directory.
<code>cd penny; chmod 777 site/data</code>
Just do what it says and continue. 

Personalize Penny
==================
Yes, I'll tell you how to find the places in the code where you can do your own changes.


