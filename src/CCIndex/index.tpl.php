<h1>Index Controller</h1>
<p>Welcome to FunnyBunny index controller.</p>

<h2>Download</h2>
<p>You can download FunnyBunny from github.</p>
<blockquote>
<code>git clone git://github.com/annaapelsin/FunnyBunny.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/annaapelsin/FunnyBunny'>https://github.com/annaapelsin/FunnyBunny</a></p>

<h2>Installation</h2>
<p>First you have to make the data-directory writable. This is the place where FunnyBunny needs
to be able to write and create files.</p>
<blockquote>
<code>cd FunnyBunny; chmod 777 site/data</code>
</blockquote>
If you want to use it on the bth server, you also need to change in the .htaccess-file. 
<p>Second, Lydia has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>

