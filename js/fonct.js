function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_findObj(n, d) { //v4.01
var p,i,x; if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_nbGroup(event, grpName) { //v6.0
var i,img,nbArr,args=MM_nbGroup.arguments;
if (event == "init" && args.length > 2) {
if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
nbArr[nbArr.length] = img;
for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = args[i+1];
nbArr[nbArr.length] = img;
} }
} else if (event == "over") {
document.MM_nbOver = nbArr = new Array();
for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
nbArr[nbArr.length] = img;
}
} else if (event == "out" ) {
for (i=0; i < document.MM_nbOver.length; i++) {
img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
} else if (event == "down") {
nbArr = document[grpName];
if (nbArr)
for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
document[grpName] = nbArr = new Array();
for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
nbArr[nbArr.length] = img;
} }
}
function rtrim(s)//Right : RTrim
{ var l;
var ret;
l = s.length;
while(s.charAt(l - 1) == " ")
l--;
ret = s.substring(0, l);
return ret;
}
function ltrim(s)//Left : LTrim
{ var l;
var ret;
l = 0;
while(s.charAt(l) == " ")
l++;
ret = s.substring(l);
return ret;
}
function trim(s){ return ltrim(rtrim(s)); }
function verif_domaine(){
var F = document.getElementById("formURL");
var url = trim(F.url.value);
if (!url)
{
alert("Saisir un nom de domaine !");
F.url.value = "";
F.url.focus();
return false;
}
}
function verif_mail(adresse) {
var place = adresse.indexOf("@",1);
var point = adresse.indexOf(".",place+1);
if ((place > -1)&&(adresse.length >2)&&(point > 1))
return true;
else
return false;
}
function verif_contact(){
var F = document.getElementById("frmc");
var nom = trim(F.nom.value);
var msg = trim(F.msg.value);
var objet = trim(F.objet.value);
var email= trim(F.email.value);
if (!nom){ alert("Veuillez indiquer votre nom !"); return false; }
else if (!verif_mail(email) || !email){ alert("Il doit y avoir une erreur dans votre Email ! "); return false; }
else if (!objet){ alert("Veuillez saisir l'objet de votre message !"); return false; }
else if (!msg){ alert("Veuillez rediger votre message !"); return false; }
}




var pausebetweenmsg=10 //customize pause in miliseconds between each message showing up (3000=3 seconds)
var glidespeed=50 //customize glide speed in pixels per frame.

var curobjindex=0

function actualstyle(el, cssproperty){
if (el.currentStyle)
return el.currentStyle[cssproperty]
else if (window.getComputedStyle){
var elstyle=window.getComputedStyle(el, "")
return elstyle.getPropertyValue(cssproperty)
}
}

function collectElementbyClass(){
var classname="glidetext"
glidearray=new Array()
var inc=0
var alltags=document.all? document.all : document.getElementsByTagName("*")
for (i=0; i<alltags.length; i++){
if (alltags[i].className==classname)
glidearray[inc++]=alltags[i]
}
if (glidearray.length>0)
onebyoneglide()
}

function onebyoneglide(){
if (curobjindex<glidearray.length)
glidetimer=setInterval("glideroutine()",50)
}

function glideroutine(){
if (parseInt(actualstyle(glidearray[curobjindex], "left"))<0)
glidearray[curobjindex].style.left=parseInt(actualstyle(glidearray[curobjindex], "left"))+50+"px"
else{
glidearray[curobjindex].style.left=0
curobjindex++
clearInterval(glidetimer)
setTimeout("onebyoneglide()", pausebetweenmsg)
}
}

if (window.addEventListener)
window.addEventListener("load", collectElementbyClass, false)
else if (window.attachEvent)
window.attachEvent("onload", collectElementbyClass)
else if (document.getElementById)
window.onload=collectElementbyClass

