# simple_cms

<h2>Very simple content management system</h2>

<p>sprint 3 task for PHP course at <a href="https://bit.lt/">Balti Institute of Technology</a></p>

<p>Simple project includes ussage of MVC (Model–view–controller) design pattern and ORM (Object-relational mapping) technique. Other functionality consists of authentication and simple CRUD.<p>

<p>Other services used:</p> 
<ul>
<li><a href="https://getbootstrap.com/">Bootstrap</li>
<li><a href="https://fontawesome.com/">Font Awesome</a></li>
</ul>

<h3>full install:</h2>
<ul>
<li>get AMPPS</li>
<li>install composer package manager <a href="https://getcomposer.org/download/">https://getcomposer.org/download/</a></li>
<li>clone simple_cms repository to your www folder</li>
<li>in repository folder initialise (considering composer it's installed localy in www folder) <pre>php ../composer.phar init</pre></li>
<li>install <a href="https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html
">doctrine</a> (required for ORM). Terminal command: <pre>..php composer.phar require doctrine/orm</pre>
<li>create database called simple_cms</li>
<li>to create database tables: <pre>vendor\bin\doctrine orm:schema-tool:update --force --dump-sql</pre></li> 
<li>open localhost/simple_cms/admin in your browser. Username and password is <i>admin, admin</i>.</li>
<li>add some pages with content</li>
</ul>
