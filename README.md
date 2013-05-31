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

Important about the Administrator
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
"<h5>Welcome to Penny. This is the installation phase of Penny.
You will go through the following steps:

* Verify the server environment.
* Verify that the directory site/data is writable.
* Verify that the default database is available.
* Install all Penny modules.
* Review settings in the configuration file, config.php.
Does it make sense?</h5>"

Just click continue and you are in!
Penny will go through this steps and when it's done you will see:
"<h5>This is Penny, ready to be used.</h5>"

If you didn't make the site/data writable in the beginning, you will see this:
<code>Failed. The data directory exists but it is NOT writable.</code>

Correct this by changing the permissions on the directory.
<code>cd penny; chmod 777 site/data</code>
Just do what it says and continue. 

Personalize Penny
==================
Yes, I'll tell you how to find the places in the code where you can do your own changes.
Open <code>site/config.php</code>. 
<h4>Header</h4>
Scroll down to the bottom and you will see <code>'header' => 'Penny',</code>.
There you can change the header.
<h4>Slogan</h4>
<code>'slogan' => 'Knock knock knock, Penny',</code> is the place to change the slogan. 
<h4>Favicon and logo</h4>
If you want to change the favicon and the logo, here's the place for that:
<code>'favicon' => '../../../img/Penny.png',</code>
<code>'logo' => '../../../img/Penny.png',</code>
At first, you need to put another image in the <code>img</code> folder ang then type the name of the image in the code/codes above.
<h4>Footer</h4>
If you want to change the footer, here's the code for that: 
<code>'footer' => 'Penny &copy; by Anna Dahlgren',</code>.
<h4>Navigation</h4>
If you want to change in the navigation menu, you have to scroll up a bit.
When you find <code>$pen->config['menus']</code> you are close!
Find this code: <code>'my-navbar' => array(</code> and change for example from <code>'home'      => array('label'=>'About Me', 'url'=>'my'),</code>
to <code> 'home'      => array('label'=>'This is a page about meeeeeeee', 'url'=>'my'),</code>.
(I changed the About me text). 

Change the theme
----------------
Open <code>site/themes/mytheme/style.css</code>. <br/>
Feel free to change the theme! 
The background color for the html, body and outer-wrap-footer is now the same. 
Maybe that´s the best. Of course, you decide! But remember my reminder. 
I do not recommend you to change more in the theme, but if you really, really want to, I´ll tell you where to start.
In <code>themes/grid/style.css</code> and <code>themes/grid/style.php</code> is the rest of the CSS code.
Feel free to check it out, but only if you really know what you are doing!

Use the site
============
You can create a content and view as a blog or page.
Just type "blog" or "page" in the column Type. 
You can fill it in like this:
* Title: <code>Page with BBCode</code>
* Key: <code>bbcode</code>
* Content: <code>[b]Text in bold[/b]</code> (Or whatever you want to write)
* Type: <code>page</code>
* Filter: <code>bbcode</code>

There is a guestbook you or anybody can use to write something.
If you want to, you can enable the options of deleting all the messages by delete some code in <code>src/CCGuestbook/index.tpl.php</code>
On line 11, delete <code><!--</code> and <code>--></code>.

Good luck
============
Good luck with Penny! 
