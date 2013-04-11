<?php
/**
 * My own me-page to start with.
 */
include("../site/config.php");

// Create the data array which is to be used in the template file.
$data['title'] = "Anna Dahlgren - Redovisning";
$data['meta_description'] = "Min egna me-sida, skapad f&ouml;r kursen phpmvc med HTML5Boilerplate.";
$data['main'] = <<<EOD
<h1>Kursmoment 1</h1>

<p>D&aring; var jag ig&aring;ng!<br/>
Jag tyckte det var en lite klurig b&ouml;rjan, d&aring; jag inte f&ouml;rstod riktigt hur jag skulle f&aring; ordning p&aring; min boilerplate.<br/>
Jag har suttit l&aring;ng tid med att g&aring; igenom koderna och kolla upp vad flera av dem g&ouml;r osv.<br/>
Jag har valt att ha mycket ganska likt mos, dock med egna &auml;ndringar. Jag har g&aring;tt igenom CSS;en f&ouml;r att vara s&auml;ker p&aring;<br/>
vad som g&ouml;r vad. Ville jag &auml;ndra n&aring;got d&auml;r, s&aring; gjorde jag det, annars var det bara f&ouml;r att l&auml;ra mig s&aring; jag vet vad jag g&ouml;r.
<br/>Jag har f&aring;tt &auml;ndra alla &aring;, &auml; och &ouml; f&ouml;r annars kom det bara fr&aring;getecken ist&auml;llet. <br/>
Jag kollade vad min webbl&auml;sare var inst&auml;lld p&aring;, och det var "uppt&auml;ck automatiskt". &Auml;ndrade jag till V&auml;steuropeiskt s&aring; blev det ju r&auml;tt,<br/>
men nu &auml;r det ju UTF-8, s&aring; jag fick leta upp funktionen d&auml;r jag kunde &auml;ndra alla bokst&auml;ver samtidigt, en sort &aring;t g&aring;ngen,<br/>
<br/>
Jag har googlat mig fram till det jag fastnat p&aring; (bland annat tecknen f&ouml;r &aring;, &auml; och &ouml;) och jag anser att jag l&ouml;st allt p&aring; ett bra s&auml;tt.<br/>
Jag k&ouml;rde ocks&aring; igenom GitHub och testade det enligt dokumentet, men det var efter jag fixat sidan.<br/>
Jag har allts&aring; inte anv&auml;nt det till detta moment, utan enbart till ett test f&ouml;r att se hur det fungerar.<br/><br/>
Det jag jobbat i i detta moment &auml;r:<br/></p>
<ul>
<li>Putty</li>
<li>WinScp</li>
<li>Git Bash</li>
<li>GitHub</li>
<li>JEdit</li>
</ul>
<br/>
<p>Att anv&auml;nda sig av en boilerplate tycker jag &auml;r ett v&auml;ldigt smart och tidssparande s&auml;tt.<br />
Jag tycker att HTML5Boilerplate verkar helt okej! Jag har ju inget annat att j&auml;mf&ouml;ra med dock, men jag tycker den k&auml;nns bra.<br/>
Vad jag fann extra intressant? Hmm... Jo, det skulle nog vara att det faktiskt finns v&auml;ldigt mycket bakom kulisserna,<br/>
som man inte kan se p&aring; ytan. Det &auml;r intressant, att en webbsida som kan verka v&auml;ldigt enkel, kan ha s&aring; mycket koder bakom sig!<br/>
Nu ska jag g&aring; vidare till n&auml;sta moment, och ser fram emot det :)
</p>

<hr> 

<h1> Kursmoment 2 </h1>
<h3>Lite inledande text</h3>
<p>Keep It Simple Stupid. Ja, det sprack direkt...<br/>
Jag tyckte jag hade r&auml;tt s&aring; gott om tid att prova lite p&aring; egen hand till att b&ouml;rja med.<br/>
Jag b&ouml;rjade greja lite h&auml;r, greja lite d&auml;r, och ja, testa mig fram helt enkelt.<br/>
Sen, som en blixt fr&aring;n klar himmel, drabbades hela familjen av sjukdom, en efter en. Helt pl&ouml;tsligt f&ouml;rsvann all min "gott om tid!".<br/>
B&ouml;rjade f&aring; lite panik d&aring; jag inte fick ordning p&aring; det som jag ville, s&aring; till slut best&auml;mde jag mig f&ouml;r att ta efter s&aring; mycket som m&ouml;jligt fr&aring;n lydia.<br/>
Jag la in mina egna sidor (me-sidan och redovisningssidan, samt source) i en egen mapp ocks&aring;, samt laddade upp p&aring; GitHub.<br/>
D&auml;r har jag nog laddat upp miljoner g&aring;nger under detta kursmoment, efter alla &auml;ndringar jag gjort...<br/><br/>
Tidigare erfarenheter av just detta &auml;r lika med noll, &aring;tminstone vad g&auml;ller kodning. Jag k&auml;nner igen t&auml;nket MVC sedan tidigare dock.<br/>
Jag har mer att titta p&aring;, och &auml;ndra, i mitt ramverk (som f&ouml;r&ouml;vrigt heter FunnyBunny). Det jag vill &auml;ndra &auml;r bl.a "$ ly" till mitt egna.<br/>
<i>Hur &auml;r det f&ouml;rresten man skriver f&ouml;r att inte beh&ouml;va ha ett mellanslag mellan "$" och "ly"?</i><br/>
Dessa &auml;ndringar kommer jag g&ouml;ra lite allt eftersom, d&aring; jag prioriterar att f&aring; in uppgiften/uppgifterna i tid ist&auml;llet.<br/></p>

<h3>Ramverkets namn</h3>
<p>Mitt ramverk heter som sagt FunnuBunny. <br/>
Jag satt och f&ouml;rs&ouml;kte komma p&aring; ett namn, men fick hj&auml;rnsl&auml;pp. Samtidigt g&aring;r sambon omkring och nynnar p&aring; den gamla melodin:<br/>
"Funny Bunny heter jag, och jag &auml;r s&aring; go och gla...", ja ni vet.<br/>
D&auml;r f&ouml;ddes den id&eacute;n.<br/></p>

<h3>Tutorials</h3>
<p>De tutorials jag kikade p&aring; var <a link href ='http://dbwebb.se/forum/viewtopic.php?f=14&t=46'>Mos Lydia</a> och
<a link href = 'http://www.phpro.org/tutorials/Model-View-Controller-MVC.html'>denna</a>.<br/>
Jag kikade runt p&aring; lite mer, men best&auml;mde mig f&ouml;r att s&auml;tta mig in i dessa tv&aring; lite b&auml;ttre.<br/>
Jag har f&ouml;ljt Lydia ganska s&aring; exakt, kollat igenom alla koder och tryckt fram och tillbaka hundratusentals g&aring;nger. La till min egna mapp "pages" och "img".</p>

<h3>Vad t&auml;nkte jag?</h3>
<p>Vad jag t&auml;nkte n&auml;r jag gjorde grundstrukturen beskrivs i f&ouml;rsta stycket.<br/>
Jag hade som sagt t&auml;nkt g&ouml;ra det lite p&aring; egen hand till att b&ouml;rja med, men fick &auml;ndra mina planer lite. (S&aring; l&auml;nge?)</p>

<h3>GitHub?</h3>
<p>Ja, det finns p&aring; GitHub. <a link href ='https://github.com/annaapelsin/FunnyBunny'>(H&auml;r)</a>
EOD;

// Hand over to the template engine.
include("../themes/core/template.php"); 
