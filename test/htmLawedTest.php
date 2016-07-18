

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="htmLawed 1.1.22 test page" />
<style type="text/css"><!--/*--><![CDATA[/*><!--*/
a, a.resizer{text-decoration:none;}
a:hover, a.resizer:hover{color:red;}
a.resizer{color:green; float:right;}
body{background-color:#efefef;}
body, button, div, html, input, p{font-size:13px; font-family:'Lucida grande', Verdana, Arial, Helvetica, sans-serif;}
button, input{font-size: 85%;}
div.help{border-top: 1px dotted gray; margin-top: 15px; padding-top: 15px; color:#999999;}
#inputC, #inputD, #inputF, #inputR, #outputD, #outputF, #outputH, #outputR, #settingF, #diff{display:block;}
#inputC, #settingF{background-color:white; border:1px gray solid; padding:3px;}
#inputC li{margin: 0; padding: 0;}
#inputC ul{margin: 0; padding: 0; margin-left: 14px;}
#inputC input{margin: 0; margin-left: 2px; margin-right: 2px; padding: 1px; vertical-align: middle;}
#inputD{overflow:auto; background-color:#ffff99; border:1px #cc9966 solid; padding:3px;}
#inputR{overflow:auto; background-color:#ffffcc; border:1px #ffcc99 solid; padding:3px;}
#inputC, #settingF, #inputD, #inputR, #outputD, #outputR, #diff, textarea{font-size:100%; font-family:'Bitstream vera sans mono', 'courier new', 'courier', monospace;}
#outputD{overflow:auto; background-color: #99ffcc; border:1px #66cc99 solid; padding:3px;}
#diff{overflow:auto; background-color: white; border:1px #dcdcdc solid; padding:3px;}
#outputH{overflow:auto; background-color:white; padding:3px; border:1px #dcdcdc solid;} 
#outputR{overflow:auto; background-color: #ccffcc; border:1px #99cc99 solid; padding:3px;} 
span.cmtcdata{color: orange;}
span.ctag{color:red;}
span.ent{border-bottom:1px dotted #999999;}
span.etag{color:purple;}
span.help{color:#999999;}
span.newline{color:#dcdcdc;}
span.notice{color:green;}
span.otag{color:blue;}
#topmost{margin:auto; width:98%;}
/*]]>*/--></style>
<script type="text/javascript"><!--//--><![CDATA[//><!-- 
window.name = 'hlmain';
function hl(i){
  var e = document.getElementById(i);
 if(!e){return;}
 run(e, '</[a-z1-6]+>', 'ctag');
 run(e, '<[a-z]+(?:[^>]*)/>', 'etag');
 run(e, '<[a-z1-6]+(?:[^>]*)>', 'otag');
 run(e, '&[#a-z0-9]+;', 'ent');
 run(e, '<!(?:(?:--(?:.|\n)*?--)|(?:\\[CDATA\\[(?:.|\n)*?\\]\\]))>', 'cmtcdata');
}
function sndProc(){
 var f = document.getElementById('testform');
 if(!f){return;}
 var e = document.createElement('input');
 e.type = 'hidden';
 e.name = 'sid';
 e.id = 'sid';
 e.value = readCookie('sid');
 f.appendChild(e);
 f.submit();
}
function readCookie(n){
 var ne = n + '=';
 var ca = document.cookie.split(';');
 for(var i=0;i < ca.length;i++){
  var c = ca[i];
  while(c.charAt(0)==' '){
   c = c.substring(1,c.length);
  }
  if(c.indexOf(ne) == 0){
   return c.substring(ne.length,c.length);
  }
 }
 return null;
}
function run(e, q, c){
 var q = new RegExp(q);
 if(e.firstChild == null){
  var m = q.exec(e.data);
  if(m){
   var v = m[0];
   var k2 = e.splitText(m.index);
   var k3 = k2.splitText(v.length);
   var s = e.ownerDocument.createElement('span');
   e.parentNode.replaceChild(s, k2);
   s.className = c; s.appendChild(k2);
  }
 }
 for(var k = e.firstChild; k != null; k = k.nextSibling){
  if(k.nodeType == 3){     
   var m = q.exec(k.data);
   if(m){
    var v = m[0];
    var k2 = k.splitText(m.index);
    var k3 = k2.splitText(v.length);
    var s = k.ownerDocument.createElement('span');
    k.parentNode.replaceChild(s, k2);
    s.className = c; s.appendChild(k2);
   }
  }
  else if(c == 'ent' && k.nodeType == 1){
   var d = k.firstChild;
   if(d){
    var m = q.exec(d.data);
    if(m){
     var v = m[0];
     var d2 = d.splitText(m.index);
     var d3 = d2.splitText(v.length);
     var s = d.ownerDocument.createElement('span');
     d.parentNode.replaceChild(s, d2);
     s.className = c; s.appendChild(d2);
    }
   }
  }
 }
}
function toggle(i){  
 var e = document.getElementById(i);  
 if(!e){return;}
 if(e.style){
  var a = e.style.display;   
  if(a == 'block'){e.style.display = 'none'; return;}
  if(a == 'none'){e.style.display = 'block';}
  else{e.style.display = 'none';}
  return;   
 }
 var a = e.visibility;
 if(a == 'hidden'){e.visibility = 'show'; return;}
 if(a == 'show'){e.visibility = 'hidden';}
}
function sndUnproc(){
 var i = document.getElementById('text');
 if(!i){return;}
 i = i.value;
 var w = window.open('htmLawedTest.php?pre=1', 'hlprehtm');
 var f = document.createElement('form');
 f.enctype = 'application/x-www-form-urlencoded';
 f.method = 'post';
 f.acceptCharset = 'utf-8';
 if(f.style){f.style.display = 'none';}
 else{f.visibility = 'hidden';}
 f.innerHTML = '<p style="display:none;"><input style="display:none;" type="hidden" name="token" id="token" value="6d43975c5ca62624ca347ebb0de228ef" /><input style="display:none;" type="hidden" name="sid" id="sid" value="' + readCookie('sid') + '" /></p>';
 f.action = 'htmLawedTest.php?pre=1';
 f.target = 'hlprehtm';
 f.method = 'post';
 var t = document.createElement('textarea');
 t.name = 'inputH';
 t.value = i;
 f.appendChild(t);
 var b = document.getElementsByTagName('body')[0];
 b.appendChild(f);
 f.submit();
 w.focus;
}
function sndValidn(id, type){
 var i = document.getElementById(id);
 if(!i){return;}
 i = i.value;
 var w = window.open('http://validator.w3.org/check', 'validate'+id+type);
 var f = document.createElement('form');
 f.enctype = 'application/x-www-form-urlencoded';
 f.method = 'post';
 f.acceptCharset = 'utf-8';
 if(f.style){f.style.display = 'none';}
 else{f.visibility = 'hidden';}
 f.innerHTML = '<p style="display:none;"><input style="display:none;" type="hidden" name="prefill" id="prefill" value="1" /><input style="display:none;" type="hidden" name="prefill_doctype" id="prefill_doctype" value="'+ type+ '" /><input style="display:none;" type="hidden" name="group" id="group" value="1" /><input type="hidden" name="ss" id="ss" value="1" /></p>';
 f.action = 'http://validator.w3.org/check';
 f.target = 'validate'+id+type;
 var t = document.createElement('textarea');
 t.name = 'fragment';
 t.value = i;
 f.appendChild(t);
 var b = document.getElementsByTagName('body')[0];
 b.appendChild(f);
 f.submit();
 w.focus;
}
tRs = {
 formEl: null,
 resizeClass: 'textarea',
 adEv: function(t,ev,fn){
  if(typeof document.addEventListener != 'undefined'){
   t.addEventListener(ev,fn,false);
  }else{
   t.attachEvent('on' + ev, fn);
  }
 },
 rmEv: function(t,ev,fn){
  if(typeof document.removeEventListener != 'undefined'){
   t.removeEventListener(ev,fn,false);
  }else
  {
   t.detachEvent('on' + ev, fn);
  }
 },
 adBtn: function(){
  var textareas = document.getElementsByTagName('textarea');
  for(var i = 0; i < textareas.length; i++){	
   var txtclass=textareas[i].className;
   if(txtclass.substring(0,tRs.resizeClass.length)==tRs.resizeClass ||
   txtclass.substring(txtclass.length -tRs.resizeClass.length)==tRs.resizeClass){
    var a = document.createElement('a');
    a.appendChild(document.createTextNode("\u2195"));
    a.style.cursor = 'n-resize';
    a.className= 'resizer';
    a.title = 'click-drag to resize textarea'
    tRs.adEv(a, 'mousedown', tRs.initResize);
    textareas[i].parentNode.appendChild(a);
   }	
  }
 },
 initResize: function(event){
  if(typeof event == 'undefined'){
   event = window.event;
  }
  if(event.srcElement){
   var target = event.srcElement.previousSibling;
  }else{
   var target = event.target.previousSibling;
  }
  if(target.nodeName.toLowerCase() == 'textarea' || (target.nodeName.toLowerCase() == 'input' && target.type == 'text')){
   tRs.formEl = target;
   tRs.formEl.startHeight = tRs.formEl.clientHeight;
   tRs.formEl.startY = event.clientY;
   tRs.adEv(document, 'mousemove', tRs.resize);
   tRs.adEv(document, 'mouseup', tRs.stopResize);
   tRs.formEl.parentNode.style.cursor = 'n-resize';
   tRs.formEl.style.cursor = 'n-resize';
   try{
    event.preventDefault();
   }catch(e){
   }
  }
 },
 resize: function(event){
  if(typeof event == 'undefined'){
   event = window.event;
  }
	if(tRs.formEl.nodeName.toLowerCase() == 'textarea'){
   tRs.formEl.style.height = event.clientY - tRs.formEl.startY + tRs.formEl.startHeight + 'px';
  }
 },
 stopResize: function(event){
  tRs.rmEv(document, 'mousedown', tRs.initResize);
  tRs.rmEv(document, 'mousemove', tRs.resize);
  tRs.formEl.style.cursor = 'text';
  tRs.formEl.parentNode.style.cursor = 'auto';
  return false;
 }
};
tRs.adEv(window, 'load', tRs.adBtn);
// Diff Match and Patch javascript code by Neil Fraser; Apache license 2.0; http://code.google.com/p/google-diff-match-patch/
(function(){function diff_match_patch(){this.Diff_Timeout=1;this.Diff_EditCost=4;this.Match_Threshold=0.5;this.Match_Distance=1E3;this.Patch_DeleteThreshold=0.5;this.Patch_Margin=4;this.Match_MaxBits=32}
diff_match_patch.prototype.diff_main=function(a,b,c,d){"undefined"==typeof d&&(d=0>=this.Diff_Timeout?Number.MAX_VALUE:(new Date).getTime()+1E3*this.Diff_Timeout);if(null==a||null==b)throw Error("Null input. (diff_main)");if(a==b)return a?[[0,a]]:[];"undefined"==typeof c&&(c=!0);var e=c,f=this.diff_commonPrefix(a,b),c=a.substring(0,f),a=a.substring(f),b=b.substring(f),f=this.diff_commonSuffix(a,b),g=a.substring(a.length-f),a=a.substring(0,a.length-f),b=b.substring(0,b.length-f),a=this.diff_compute_(a,
b,e,d);c&&a.unshift([0,c]);g&&a.push([0,g]);this.diff_cleanupMerge(a);return a};
diff_match_patch.prototype.diff_compute_=function(a,b,c,d){if(!a)return[[1,b]];if(!b)return[[-1,a]];var e=a.length>b.length?a:b,f=a.length>b.length?b:a,g=e.indexOf(f);if(-1!=g)return c=[[1,e.substring(0,g)],[0,f],[1,e.substring(g+f.length)]],a.length>b.length&&(c[0][0]=c[2][0]=-1),c;if(1==f.length)return[[-1,a],[1,b]];return(e=this.diff_halfMatch_(a,b))?(f=e[0],a=e[1],g=e[2],b=e[3],e=e[4],f=this.diff_main(f,g,c,d),c=this.diff_main(a,b,c,d),f.concat([[0,e]],c)):c&&100<a.length&&100<b.length?this.diff_lineMode_(a,
b,d):this.diff_bisect_(a,b,d)};
diff_match_patch.prototype.diff_lineMode_=function(a,b,c){var d=this.diff_linesToChars_(a,b),a=d.chars1,b=d.chars2,d=d.lineArray,a=this.diff_main(a,b,!1,c);this.diff_charsToLines_(a,d);this.diff_cleanupSemantic(a);a.push([0,""]);for(var e=d=b=0,f="",g="";b<a.length;){switch(a[b][0]){case 1:e++;g+=a[b][1];break;case -1:d++;f+=a[b][1];break;case 0:if(1<=d&&1<=e){a.splice(b-d-e,d+e);b=b-d-e;d=this.diff_main(f,g,!1,c);for(e=d.length-1;0<=e;e--)a.splice(b,0,d[e]);b+=d.length}d=e=0;g=f=""}b++}a.pop();return a};
diff_match_patch.prototype.diff_bisect_=function(a,b,c){for(var d=a.length,e=b.length,f=Math.ceil((d+e)/2),g=f,h=2*f,j=Array(h),i=Array(h),k=0;k<h;k++)j[k]=-1,i[k]=-1;j[g+1]=0;i[g+1]=0;for(var k=d-e,p=0!=k%2,q=0,s=0,o=0,v=0,u=0;u<f&&!((new Date).getTime()>c);u++){for(var n=-u+q;n<=u-s;n+=2){var l=g+n,m;m=n==-u||n!=u&&j[l-1]<j[l+1]?j[l+1]:j[l-1]+1;for(var r=m-n;m<d&&r<e&&a.charAt(m)==b.charAt(r);)m++,r++;j[l]=m;if(m>d)s+=2;else if(r>e)q+=2;else if(p&&(l=g+k-n,0<=l&&l<h&&-1!=i[l])){var t=d-i[l];if(m>=
t)return this.diff_bisectSplit_(a,b,m,r,c)}}for(n=-u+o;n<=u-v;n+=2){l=g+n;t=n==-u||n!=u&&i[l-1]<i[l+1]?i[l+1]:i[l-1]+1;for(m=t-n;t<d&&m<e&&a.charAt(d-t-1)==b.charAt(e-m-1);)t++,m++;i[l]=t;if(t>d)v+=2;else if(m>e)o+=2;else if(!p&&(l=g+k-n,0<=l&&l<h&&-1!=j[l]&&(m=j[l],r=g+m-l,t=d-t,m>=t)))return this.diff_bisectSplit_(a,b,m,r,c)}}return[[-1,a],[1,b]]};
diff_match_patch.prototype.diff_bisectSplit_=function(a,b,c,d,e){var f=a.substring(0,c),g=b.substring(0,d),a=a.substring(c),b=b.substring(d),f=this.diff_main(f,g,!1,e),e=this.diff_main(a,b,!1,e);return f.concat(e)};
diff_match_patch.prototype.diff_linesToChars_=function(a,b){function c(a){for(var b="",c=0,f=-1,g=d.length;f<a.length-1;){f=a.indexOf("\n",c);-1==f&&(f=a.length-1);var q=a.substring(c,f+1),c=f+1;(e.hasOwnProperty?e.hasOwnProperty(q):void 0!==e[q])?b+=String.fromCharCode(e[q]):(b+=String.fromCharCode(g),e[q]=g,d[g++]=q)}return b}var d=[],e={};d[0]="";var f=c(a),g=c(b);return{chars1:f,chars2:g,lineArray:d}};
diff_match_patch.prototype.diff_charsToLines_=function(a,b){for(var c=0;c<a.length;c++){for(var d=a[c][1],e=[],f=0;f<d.length;f++)e[f]=b[d.charCodeAt(f)];a[c][1]=e.join("")}};diff_match_patch.prototype.diff_commonPrefix=function(a,b){if(!a||!b||a.charAt(0)!=b.charAt(0))return 0;for(var c=0,d=Math.min(a.length,b.length),e=d,f=0;c<e;)a.substring(f,e)==b.substring(f,e)?f=c=e:d=e,e=Math.floor((d-c)/2+c);return e};
diff_match_patch.prototype.diff_commonSuffix=function(a,b){if(!a||!b||a.charAt(a.length-1)!=b.charAt(b.length-1))return 0;for(var c=0,d=Math.min(a.length,b.length),e=d,f=0;c<e;)a.substring(a.length-e,a.length-f)==b.substring(b.length-e,b.length-f)?f=c=e:d=e,e=Math.floor((d-c)/2+c);return e};
diff_match_patch.prototype.diff_commonOverlap_=function(a,b){var c=a.length,d=b.length;if(0==c||0==d)return 0;c>d?a=a.substring(c-d):c<d&&(b=b.substring(0,c));c=Math.min(c,d);if(a==b)return c;for(var d=0,e=1;;){var f=a.substring(c-e),f=b.indexOf(f);if(-1==f)return d;e+=f;if(0==f||a.substring(c-e)==b.substring(0,e))d=e,e++}};
diff_match_patch.prototype.diff_halfMatch_=function(a,b){function c(a,b,c){for(var d=a.substring(c,c+Math.floor(a.length/4)),e=-1,g="",h,j,n,l;-1!=(e=b.indexOf(d,e+1));){var m=f.diff_commonPrefix(a.substring(c),b.substring(e)),r=f.diff_commonSuffix(a.substring(0,c),b.substring(0,e));g.length<r+m&&(g=b.substring(e-r,e)+b.substring(e,e+m),h=a.substring(0,c-r),j=a.substring(c+m),n=b.substring(0,e-r),l=b.substring(e+m))}return 2*g.length>=a.length?[h,j,n,l,g]:null}if(0>=this.Diff_Timeout)return null;
var d=a.length>b.length?a:b,e=a.length>b.length?b:a;if(4>d.length||2*e.length<d.length)return null;var f=this,g=c(d,e,Math.ceil(d.length/4)),d=c(d,e,Math.ceil(d.length/2)),h;if(!g&&!d)return null;h=d?g?g[4].length>d[4].length?g:d:d:g;var j;a.length>b.length?(g=h[0],d=h[1],e=h[2],j=h[3]):(e=h[0],j=h[1],g=h[2],d=h[3]);h=h[4];return[g,d,e,j,h]};
diff_match_patch.prototype.diff_cleanupSemantic=function(a){for(var b=!1,c=[],d=0,e=null,f=0,g=0,h=0,j=0,i=0;f<a.length;)0==a[f][0]?(c[d++]=f,g=j,h=i,i=j=0,e=a[f][1]):(1==a[f][0]?j+=a[f][1].length:i+=a[f][1].length,e&&e.length<=Math.max(g,h)&&e.length<=Math.max(j,i)&&(a.splice(c[d-1],0,[-1,e]),a[c[d-1]+1][0]=1,d--,d--,f=0<d?c[d-1]:-1,i=j=h=g=0,e=null,b=!0)),f++;b&&this.diff_cleanupMerge(a);this.diff_cleanupSemanticLossless(a);for(f=1;f<a.length;){if(-1==a[f-1][0]&&1==a[f][0]){b=a[f-1][1];c=a[f][1];
d=this.diff_commonOverlap_(b,c);e=this.diff_commonOverlap_(c,b);if(d>=e){if(d>=b.length/2||d>=c.length/2)a.splice(f,0,[0,c.substring(0,d)]),a[f-1][1]=b.substring(0,b.length-d),a[f+1][1]=c.substring(d),f++}else if(e>=b.length/2||e>=c.length/2)a.splice(f,0,[0,b.substring(0,e)]),a[f-1][0]=1,a[f-1][1]=c.substring(0,c.length-e),a[f+1][0]=-1,a[f+1][1]=b.substring(e),f++;f++}f++}};
diff_match_patch.prototype.diff_cleanupSemanticLossless=function(a){function b(a,b){if(!a||!b)return 6;var c=a.charAt(a.length-1),d=b.charAt(0),e=c.match(diff_match_patch.nonAlphaNumericRegex_),f=d.match(diff_match_patch.nonAlphaNumericRegex_),g=e&&c.match(diff_match_patch.whitespaceRegex_),h=f&&d.match(diff_match_patch.whitespaceRegex_),c=g&&c.match(diff_match_patch.linebreakRegex_),d=h&&d.match(diff_match_patch.linebreakRegex_),i=c&&a.match(diff_match_patch.blanklineEndRegex_),j=d&&b.match(diff_match_patch.blanklineStartRegex_);
return i||j?5:c||d?4:e&&!g&&h?3:g||h?2:e||f?1:0}for(var c=1;c<a.length-1;){if(0==a[c-1][0]&&0==a[c+1][0]){var d=a[c-1][1],e=a[c][1],f=a[c+1][1],g=this.diff_commonSuffix(d,e);if(g)var h=e.substring(e.length-g),d=d.substring(0,d.length-g),e=h+e.substring(0,e.length-g),f=h+f;for(var g=d,h=e,j=f,i=b(d,e)+b(e,f);e.charAt(0)===f.charAt(0);){var d=d+e.charAt(0),e=e.substring(1)+f.charAt(0),f=f.substring(1),k=b(d,e)+b(e,f);k>=i&&(i=k,g=d,h=e,j=f)}a[c-1][1]!=g&&(g?a[c-1][1]=g:(a.splice(c-1,1),c--),a[c][1]=
h,j?a[c+1][1]=j:(a.splice(c+1,1),c--))}c++}};diff_match_patch.nonAlphaNumericRegex_=/[^a-zA-Z0-9]/;diff_match_patch.whitespaceRegex_=/\s/;diff_match_patch.linebreakRegex_=/[\r\n]/;diff_match_patch.blanklineEndRegex_=/\n\r?\n$/;diff_match_patch.blanklineStartRegex_=/^\r?\n\r?\n/;
diff_match_patch.prototype.diff_cleanupEfficiency=function(a){for(var b=!1,c=[],d=0,e=null,f=0,g=!1,h=!1,j=!1,i=!1;f<a.length;){if(0==a[f][0])a[f][1].length<this.Diff_EditCost&&(j||i)?(c[d++]=f,g=j,h=i,e=a[f][1]):(d=0,e=null),j=i=!1;else if(-1==a[f][0]?i=!0:j=!0,e&&(g&&h&&j&&i||e.length<this.Diff_EditCost/2&&3==g+h+j+i))a.splice(c[d-1],0,[-1,e]),a[c[d-1]+1][0]=1,d--,e=null,g&&h?(j=i=!0,d=0):(d--,f=0<d?c[d-1]:-1,j=i=!1),b=!0;f++}b&&this.diff_cleanupMerge(a)};
diff_match_patch.prototype.diff_cleanupMerge=function(a){a.push([0,""]);for(var b=0,c=0,d=0,e="",f="",g;b<a.length;)switch(a[b][0]){case 1:d++;f+=a[b][1];b++;break;case -1:c++;e+=a[b][1];b++;break;case 0:1<c+d?(0!==c&&0!==d&&(g=this.diff_commonPrefix(f,e),0!==g&&(0<b-c-d&&0==a[b-c-d-1][0]?a[b-c-d-1][1]+=f.substring(0,g):(a.splice(0,0,[0,f.substring(0,g)]),b++),f=f.substring(g),e=e.substring(g)),g=this.diff_commonSuffix(f,e),0!==g&&(a[b][1]=f.substring(f.length-g)+a[b][1],f=f.substring(0,f.length-
g),e=e.substring(0,e.length-g))),0===c?a.splice(b-d,c+d,[1,f]):0===d?a.splice(b-c,c+d,[-1,e]):a.splice(b-c-d,c+d,[-1,e],[1,f]),b=b-c-d+(c?1:0)+(d?1:0)+1):0!==b&&0==a[b-1][0]?(a[b-1][1]+=a[b][1],a.splice(b,1)):b++,c=d=0,f=e=""}""===a[a.length-1][1]&&a.pop();c=!1;for(b=1;b<a.length-1;)0==a[b-1][0]&&0==a[b+1][0]&&(a[b][1].substring(a[b][1].length-a[b-1][1].length)==a[b-1][1]?(a[b][1]=a[b-1][1]+a[b][1].substring(0,a[b][1].length-a[b-1][1].length),a[b+1][1]=a[b-1][1]+a[b+1][1],a.splice(b-1,1),c=!0):a[b][1].substring(0,
a[b+1][1].length)==a[b+1][1]&&(a[b-1][1]+=a[b+1][1],a[b][1]=a[b][1].substring(a[b+1][1].length)+a[b+1][1],a.splice(b+1,1),c=!0)),b++;c&&this.diff_cleanupMerge(a)};diff_match_patch.prototype.diff_xIndex=function(a,b){var c=0,d=0,e=0,f=0,g;for(g=0;g<a.length;g++){1!==a[g][0]&&(c+=a[g][1].length);-1!==a[g][0]&&(d+=a[g][1].length);if(c>b)break;e=c;f=d}return a.length!=g&&-1===a[g][0]?f:f+(b-e)};
diff_match_patch.prototype.diff_prettyHtml=function(a){for(var b=[],c=/&/g,d=/</g,e=/>/g,f=/\n/g,g=0;g<a.length;g++){var h=a[g][0],j=a[g][1],j=j.replace(c,"&amp;").replace(d,"&lt;").replace(e,"&gt;").replace(f,"<span style=\"color: #dcdcdc;\">&not;</span><br>");switch(h){case 1:b[g]='<ins style="background:#ccffcc; text-decoration: none;">'+j+"</ins>";break;case -1:b[g]='<del style="background:#ffffcc; text-decoration: line-through; color: orange;">'+j+"</del>";break;case 0:b[g]="<span>"+j+"</span>"}}return b.join("")};
diff_match_patch.prototype.diff_text1=function(a){for(var b=[],c=0;c<a.length;c++)1!==a[c][0]&&(b[c]=a[c][1]);return b.join("")};diff_match_patch.prototype.diff_text2=function(a){for(var b=[],c=0;c<a.length;c++)-1!==a[c][0]&&(b[c]=a[c][1]);return b.join("")};diff_match_patch.prototype.diff_levenshtein=function(a){for(var b=0,c=0,d=0,e=0;e<a.length;e++){var f=a[e][0],g=a[e][1];switch(f){case 1:c+=g.length;break;case -1:d+=g.length;break;case 0:b+=Math.max(c,d),d=c=0}}return b+=Math.max(c,d)};
diff_match_patch.prototype.diff_toDelta=function(a){for(var b=[],c=0;c<a.length;c++)switch(a[c][0]){case 1:b[c]="+"+encodeURI(a[c][1]);break;case -1:b[c]="-"+a[c][1].length;break;case 0:b[c]="="+a[c][1].length}return b.join("\t").replace(/%20/g," ")};
diff_match_patch.prototype.diff_fromDelta=function(a,b){for(var c=[],d=0,e=0,f=b.split(/\t/g),g=0;g<f.length;g++){var h=f[g].substring(1);switch(f[g].charAt(0)){case "+":try{c[d++]=[1,decodeURI(h)]}catch(j){throw Error("Illegal escape in diff_fromDelta: "+h);}break;case "-":case "=":var i=parseInt(h,10);if(isNaN(i)||0>i)throw Error("Invalid number in diff_fromDelta: "+h);h=a.substring(e,e+=i);"="==f[g].charAt(0)?c[d++]=[0,h]:c[d++]=[-1,h];break;default:if(f[g])throw Error("Invalid diff operation in diff_fromDelta: "+
f[g]);}}if(e!=a.length)throw Error("Delta length ("+e+") does not equal source text length ("+a.length+").");return c};diff_match_patch.prototype.match_main=function(a,b,c){if(null==a||null==b||null==c)throw Error("Null input. (match_main)");c=Math.max(0,Math.min(c,a.length));return a==b?0:a.length?a.substring(c,c+b.length)==b?c:this.match_bitap_(a,b,c):-1};
diff_match_patch.prototype.match_bitap_=function(a,b,c){function d(a,d){var e=a/b.length,g=Math.abs(c-d);return!f.Match_Distance?g?1:e:e+g/f.Match_Distance}if(b.length>this.Match_MaxBits)throw Error("Pattern too long for this browser.");var e=this.match_alphabet_(b),f=this,g=this.Match_Threshold,h=a.indexOf(b,c);-1!=h&&(g=Math.min(d(0,h),g),h=a.lastIndexOf(b,c+b.length),-1!=h&&(g=Math.min(d(0,h),g)));for(var j=1<<b.length-1,h=-1,i,k,p=b.length+a.length,q,s=0;s<b.length;s++){i=0;for(k=p;i<k;)d(s,c+
k)<=g?i=k:p=k,k=Math.floor((p-i)/2+i);p=k;i=Math.max(1,c-k+1);var o=Math.min(c+k,a.length)+b.length;k=Array(o+2);for(k[o+1]=(1<<s)-1;o>=i;o--){var v=e[a.charAt(o-1)];k[o]=0===s?(k[o+1]<<1|1)&v:(k[o+1]<<1|1)&v|(q[o+1]|q[o])<<1|1|q[o+1];if(k[o]&j&&(v=d(s,o-1),v<=g))if(g=v,h=o-1,h>c)i=Math.max(1,2*c-h);else break}if(d(s+1,c)>g)break;q=k}return h};
diff_match_patch.prototype.match_alphabet_=function(a){for(var b={},c=0;c<a.length;c++)b[a.charAt(c)]=0;for(c=0;c<a.length;c++)b[a.charAt(c)]|=1<<a.length-c-1;return b};
diff_match_patch.prototype.patch_addContext_=function(a,b){if(0!=b.length){for(var c=b.substring(a.start2,a.start2+a.length1),d=0;b.indexOf(c)!=b.lastIndexOf(c)&&c.length<this.Match_MaxBits-this.Patch_Margin-this.Patch_Margin;)d+=this.Patch_Margin,c=b.substring(a.start2-d,a.start2+a.length1+d);d+=this.Patch_Margin;(c=b.substring(a.start2-d,a.start2))&&a.diffs.unshift([0,c]);(d=b.substring(a.start2+a.length1,a.start2+a.length1+d))&&a.diffs.push([0,d]);a.start1-=c.length;a.start2-=c.length;a.length1+=
c.length+d.length;a.length2+=c.length+d.length}};
diff_match_patch.prototype.patch_make=function(a,b,c){var d;if("string"==typeof a&&"string"==typeof b&&"undefined"==typeof c)d=a,b=this.diff_main(d,b,!0),2<b.length&&(this.diff_cleanupSemantic(b),this.diff_cleanupEfficiency(b));else if(a&&"object"==typeof a&&"undefined"==typeof b&&"undefined"==typeof c)b=a,d=this.diff_text1(b);else if("string"==typeof a&&b&&"object"==typeof b&&"undefined"==typeof c)d=a;else if("string"==typeof a&&"string"==typeof b&&c&&"object"==typeof c)d=a,b=c;else throw Error("Unknown call format to patch_make.");
if(0===b.length)return[];for(var c=[],a=new diff_match_patch.patch_obj,e=0,f=0,g=0,h=d,j=0;j<b.length;j++){var i=b[j][0],k=b[j][1];if(!e&&0!==i)a.start1=f,a.start2=g;switch(i){case 1:a.diffs[e++]=b[j];a.length2+=k.length;d=d.substring(0,g)+k+d.substring(g);break;case -1:a.length1+=k.length;a.diffs[e++]=b[j];d=d.substring(0,g)+d.substring(g+k.length);break;case 0:k.length<=2*this.Patch_Margin&&e&&b.length!=j+1?(a.diffs[e++]=b[j],a.length1+=k.length,a.length2+=k.length):k.length>=2*this.Patch_Margin&&
e&&(this.patch_addContext_(a,h),c.push(a),a=new diff_match_patch.patch_obj,e=0,h=d,f=g)}1!==i&&(f+=k.length);-1!==i&&(g+=k.length)}e&&(this.patch_addContext_(a,h),c.push(a));return c};diff_match_patch.prototype.patch_deepCopy=function(a){for(var b=[],c=0;c<a.length;c++){var d=a[c],e=new diff_match_patch.patch_obj;e.diffs=[];for(var f=0;f<d.diffs.length;f++)e.diffs[f]=d.diffs[f].slice();e.start1=d.start1;e.start2=d.start2;e.length1=d.length1;e.length2=d.length2;b[c]=e}return b};
diff_match_patch.prototype.patch_apply=function(a,b){if(0==a.length)return[b,[]];var a=this.patch_deepCopy(a),c=this.patch_addPadding(a),b=c+b+c;this.patch_splitMax(a);for(var d=0,e=[],f=0;f<a.length;f++){var g=a[f].start2+d,h=this.diff_text1(a[f].diffs),j,i=-1;if(h.length>this.Match_MaxBits){if(j=this.match_main(b,h.substring(0,this.Match_MaxBits),g),-1!=j&&(i=this.match_main(b,h.substring(h.length-this.Match_MaxBits),g+h.length-this.Match_MaxBits),-1==i||j>=i))j=-1}else j=this.match_main(b,h,g);
if(-1==j)e[f]=!1,d-=a[f].length2-a[f].length1;else if(e[f]=!0,d=j-g,g=-1==i?b.substring(j,j+h.length):b.substring(j,i+this.Match_MaxBits),h==g)b=b.substring(0,j)+this.diff_text2(a[f].diffs)+b.substring(j+h.length);else if(g=this.diff_main(h,g,!1),h.length>this.Match_MaxBits&&this.diff_levenshtein(g)/h.length>this.Patch_DeleteThreshold)e[f]=!1;else{this.diff_cleanupSemanticLossless(g);for(var h=0,k,i=0;i<a[f].diffs.length;i++){var p=a[f].diffs[i];0!==p[0]&&(k=this.diff_xIndex(g,h));1===p[0]?b=b.substring(0,
j+k)+p[1]+b.substring(j+k):-1===p[0]&&(b=b.substring(0,j+k)+b.substring(j+this.diff_xIndex(g,h+p[1].length)));-1!==p[0]&&(h+=p[1].length)}}}b=b.substring(c.length,b.length-c.length);return[b,e]};
diff_match_patch.prototype.patch_addPadding=function(a){for(var b=this.Patch_Margin,c="",d=1;d<=b;d++)c+=String.fromCharCode(d);for(d=0;d<a.length;d++)a[d].start1+=b,a[d].start2+=b;var d=a[0],e=d.diffs;if(0==e.length||0!=e[0][0])e.unshift([0,c]),d.start1-=b,d.start2-=b,d.length1+=b,d.length2+=b;else if(b>e[0][1].length){var f=b-e[0][1].length;e[0][1]=c.substring(e[0][1].length)+e[0][1];d.start1-=f;d.start2-=f;d.length1+=f;d.length2+=f}d=a[a.length-1];e=d.diffs;0==e.length||0!=e[e.length-1][0]?(e.push([0,
c]),d.length1+=b,d.length2+=b):b>e[e.length-1][1].length&&(f=b-e[e.length-1][1].length,e[e.length-1][1]+=c.substring(0,f),d.length1+=f,d.length2+=f);return c};
diff_match_patch.prototype.patch_splitMax=function(a){for(var b=this.Match_MaxBits,c=0;c<a.length;c++)if(!(a[c].length1<=b)){var d=a[c];a.splice(c--,1);for(var e=d.start1,f=d.start2,g="";0!==d.diffs.length;){var h=new diff_match_patch.patch_obj,j=!0;h.start1=e-g.length;h.start2=f-g.length;if(""!==g)h.length1=h.length2=g.length,h.diffs.push([0,g]);for(;0!==d.diffs.length&&h.length1<b-this.Patch_Margin;){var g=d.diffs[0][0],i=d.diffs[0][1];1===g?(h.length2+=i.length,f+=i.length,h.diffs.push(d.diffs.shift()),
j=!1):-1===g&&1==h.diffs.length&&0==h.diffs[0][0]&&i.length>2*b?(h.length1+=i.length,e+=i.length,j=!1,h.diffs.push([g,i]),d.diffs.shift()):(i=i.substring(0,b-h.length1-this.Patch_Margin),h.length1+=i.length,e+=i.length,0===g?(h.length2+=i.length,f+=i.length):j=!1,h.diffs.push([g,i]),i==d.diffs[0][1]?d.diffs.shift():d.diffs[0][1]=d.diffs[0][1].substring(i.length))}g=this.diff_text2(h.diffs);g=g.substring(g.length-this.Patch_Margin);i=this.diff_text1(d.diffs).substring(0,this.Patch_Margin);""!==i&&
(h.length1+=i.length,h.length2+=i.length,0!==h.diffs.length&&0===h.diffs[h.diffs.length-1][0]?h.diffs[h.diffs.length-1][1]+=i:h.diffs.push([0,i]));j||a.splice(++c,0,h)}}};diff_match_patch.prototype.patch_toText=function(a){for(var b=[],c=0;c<a.length;c++)b[c]=a[c];return b.join("")};
diff_match_patch.prototype.patch_fromText=function(a){var b=[];if(!a)return b;for(var a=a.split("\n"),c=0,d=/^@@ -(\d+),?(\d*) \+(\d+),?(\d*) @@$/;c<a.length;){var e=a[c].match(d);if(!e)throw Error("Invalid patch string: "+a[c]);var f=new diff_match_patch.patch_obj;b.push(f);f.start1=parseInt(e[1],10);""===e[2]?(f.start1--,f.length1=1):"0"==e[2]?f.length1=0:(f.start1--,f.length1=parseInt(e[2],10));f.start2=parseInt(e[3],10);""===e[4]?(f.start2--,f.length2=1):"0"==e[4]?f.length2=0:(f.start2--,f.length2=
parseInt(e[4],10));for(c++;c<a.length;){e=a[c].charAt(0);try{var g=decodeURI(a[c].substring(1))}catch(h){throw Error("Illegal escape in patch_fromText: "+g);}if("-"==e)f.diffs.push([-1,g]);else if("+"==e)f.diffs.push([1,g]);else if(" "==e)f.diffs.push([0,g]);else if("@"==e)break;else if(""!==e)throw Error('Invalid patch mode "'+e+'" in: '+g);c++}}return b};diff_match_patch.patch_obj=function(){this.diffs=[];this.start2=this.start1=null;this.length2=this.length1=0};
diff_match_patch.patch_obj.prototype.toString=function(){var a,b;a=0===this.length1?this.start1+",0":1==this.length1?this.start1+1:this.start1+1+","+this.length1;b=0===this.length2?this.start2+",0":1==this.length2?this.start2+1:this.start2+1+","+this.length2;a=["@@ -"+a+" +"+b+" @@\n"];var c;for(b=0;b<this.diffs.length;b++){switch(this.diffs[b][0]){case 1:c="+";break;case -1:c="-";break;case 0:c=" "}a[b+1]=c+encodeURI(this.diffs[b][1])+"\n"}return a.join("").replace(/%20/g," ")};
this.diff_match_patch=diff_match_patch;this.DIFF_DELETE=-1;this.DIFF_INSERT=1;this.DIFF_EQUAL=0;})()
var dmp = new diff_match_patch(); function diffLaunch(){var text1 = document.getElementById('text').value; var text2 = document.getElementById('text2').value; dmp.Diff_Timeout = 0; dmp.Diff_EditCost = 4; var d = dmp.diff_main(text1, text2); var ds = dmp.diff_prettyHtml(d); document.getElementById('diff').innerHTML = ds;
}
//--><!]]></script>
<title>htmLawed (1.1.22) test</title>
</head>
<body>
<div id="topmost">

<h5 style="float: left; display: inline; margin-top: 0; margin-bottom: 5px;"><a href="http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/index.php" title="htmLawed home">HTM<big><big>L</big></big>AWED</a> 1.1.22 <a href="htmLawedTest.php" title="test home">TEST</a></h5>
<span style="float: right;" class="help"><a href="htmLawed_README.htm"><span class="notice">htm</span></a> / <a href="htmLawed_README.txt"><span class="notice">txt</span></a> documentation</span><br style="clear:both;" />

<a href="htmLawedTest.php" title="[toggle visibility] type or copy-paste" onclick="javascript:toggle('inputF'); return false;"><span class="notice">Input &raquo;</span> <span class="help" title="limit lower with multibyte characters; limit is 1000 for viewing binaries"><small>(max. 8000 chars)</small></span></a>

<form id="testform" name="testform" action="htmLawedTest.php" method="post" accept-charset="utf-8" style="padding:0; margin: 0; display:inline;">

<div id="inputF" style="display: block;">

<input type="hidden" name="token" id="token" value="6d43975c5ca62624ca347ebb0de228ef" />
<div><textarea id="text" class="textarea" name="text" rows="5" cols="100" style="width: 100%;">text to process; &lt; 8000 characters (for binary hexdump view, &lt; 1000)</textarea></div>
<input type="submit" id="submitF" name="submitF" value="Process" style="float:left;" title="filter using htmLawed" onclick="javascript: sndProc(); return false;" onkeypress="javascript: sndProc(); return false;" />

 
<button type="button" title="rendered as web-page without a doctype or charset declaration" style="float: right;" onclick="javascript: sndUnproc(); return false;" onkeypress="javascript: sndUnproc(); return false;">View unprocessed</button>
<button type="button" onclick="javascript:document.getElementById('text').focus();document.getElementById('text').select()" title="select all to copy" style="float:right;">Select all</button>


<span style="float:right;" class="help" title="IANA-recognized name of the input character-set; can be multiple ;- or space-separated values; may not work in some browsers"><span style="font-size: 85%;">Encoding: </span><input type="text" size="8" id="enc" name="enc" style="vertical-align: middle;" value="utf-8" /></span>

</div>
<br style="clear:both;" />


<br />

<a href="htmLawedTest.php" title="[toggle visibility] htmLawed configuration" onclick="javascript:toggle('inputC'); return false;"><span class="notice">Settings &raquo;</span></a>

<div id="inputC" style="display: none;">
<table summary="none">
<tr>
<td><span class="help" title="$config argument">Config:</span></td>
<td><ul>
 
<li>abs_url: <input type="radio" name="habs_url" value="-1" />-1 <input type="radio" name="habs_url" value="0" checked="checked" />0 <input type="radio" name="habs_url" value="1" />1  <span class="help">absolute/relative URL conversion</span></li><li>and_mark: <input type="radio" name="hand_mark" value="0" checked="checked" disabled="disabled" />0 <input type="radio" name="hand_mark" value="1" disabled="disabled" />1  <span class="help">mark original <em>&amp;</em> chars</span></li><li>anti_link_spam: <input type="radio" name="hanti_link_spam" value="0" checked="checked" />0 <input type="radio" name="hanti_link_spam" value="1" /> regex for extra <em>rel</em>: <input type="text" size="30" name="hanti_link_spam11" value="" /> regex for no <em>href</em>: <input type="text" size="30" name="hanti_link_spam12" value="" /> <span class="help">modify <em>href</em> values as an anti-link spam measure</span></li><li>anti_mail_spam: <input type="radio" name="hanti_mail_spam" value="0" checked="checked" />0 <input type="radio" name="hanti_mail_spam" value="1" />replacement: <input type="text" size="8" name="hanti_mail_spam1" value="NO@SPAM" /> <span class="help">replace <em>@</em> in <em>mailto:</em> URLs</span></li><li>balance: <input type="radio" name="hbalance" value="0" />0 <input type="radio" name="hbalance" value="1" checked="checked" />1  <span class="help">fix nestings and balance tags</span></li><li>base_url: <input type="text" size="25" name="hbase_url" value="" /> <span class="help">base URL</span></li><li>cdata: <input type="radio" name="hcdata" value="0" checked="checked" />0 <input type="radio" name="hcdata" value="1" />1 <input type="radio" name="hcdata" value="2" />2 <input type="radio" name="hcdata" value="3" />3 <input type="radio" name="hcdata" value="nil" checked="checked" />not set  <span class="help">allow <em>CDATA</em> sections</span></li><li>clean_ms_char: <input type="radio" name="hclean_ms_char" value="0" checked="checked" />0 <input type="radio" name="hclean_ms_char" value="1" />1 <input type="radio" name="hclean_ms_char" value="2" />2  <span class="help">replace bad characters introduced by Microsoft apps. like <em>Word</em></span></li><li>comment: <input type="radio" name="hcomment" value="0" checked="checked" />0 <input type="radio" name="hcomment" value="1" />1 <input type="radio" name="hcomment" value="2" />2 <input type="radio" name="hcomment" value="3" />3 <input type="radio" name="hcomment" value="nil" checked="checked" />not set  <span class="help">allow HTML comments</span></li><li>css_expression: <input type="radio" name="hcss_expression" value="0" checked="checked" />0 <input type="radio" name="hcss_expression" value="1" />1 <input type="radio" name="hcss_expression" value="nil" checked="checked" />not set  <span class="help">allow dynamic expressions in CSS style properties</span></li><li>deny_attribute: <input type="radio" name="hdeny_attribute" value="0" checked="checked" />0 <input type="radio" name="hdeny_attribute" value="1" />these: <input type="text" size="50" name="hdeny_attribute1" value="" /> <span class="help">denied attributes</span></li><li>direct_list_nest: <input type="radio" name="hdirect_list_nest" value="0" checked="checked" />0 <input type="radio" name="hdirect_list_nest" value="1" />1 <input type="radio" name="hdirect_list_nest" value="nil" checked="checked" />not set  <span class="help">allow direct nesting of a list within another without requiring it to be a list item</span></li><li>elements: <input type="text" size="50" name="helements" value="" /> <span class="help">allowed elements</span></li><li>hexdec_entity: <input type="radio" name="hhexdec_entity" value="0" />0 <input type="radio" name="hhexdec_entity" value="1" checked="checked" />1 <input type="radio" name="hhexdec_entity" value="2" />2  <span class="help">convert hexadecimal numeric entities to decimal ones, or vice versa</span></li><li>hook: <input type="text" size="25" name="hhook" value="" /> <span class="help">name of hook function</span></li><li>hook_tag: <input type="text" size="25" name="hhook_tag" value="" /> <span class="help">name of custom function to further check attribute values</span></li><li>keep_bad: <input type="radio" name="hkeep_bad" value="0" />0 <input type="radio" name="hkeep_bad" value="1" />1 <input type="radio" name="hkeep_bad" value="2" />2 <input type="radio" name="hkeep_bad" value="3" />3 <input type="radio" name="hkeep_bad" value="4" />4 <input type="radio" name="hkeep_bad" value="5" />5 <input type="radio" name="hkeep_bad" value="6" checked="checked" />6  <span class="help">keep, or remove <em>bad</em> tag content</span></li><li>lc_std_val: <input type="radio" name="hlc_std_val" value="0" />0 <input type="radio" name="hlc_std_val" value="1" checked="checked" />1  <span class="help">lower-case std. attribute values like <em>radio</em></span></li><li>make_tag_strict: <input type="radio" name="hmake_tag_strict" value="0" checked="checked" />0 <input type="radio" name="hmake_tag_strict" value="1" />1 <input type="radio" name="hmake_tag_strict" value="2" />2 <input type="radio" name="hmake_tag_strict" value="nil" checked="checked" />not set  <span class="help">transform deprecated elements</span></li><li>named_entity: <input type="radio" name="hnamed_entity" value="0" />0 <input type="radio" name="hnamed_entity" value="1" checked="checked" />1  <span class="help">allow named entities, or convert numeric ones</span></li><li>no_deprecated_attr: <input type="radio" name="hno_deprecated_attr" value="0" />0 <input type="radio" name="hno_deprecated_attr" value="1" checked="checked" />1 <input type="radio" name="hno_deprecated_attr" value="2" />2  <span class="help">allow deprecated attributes, or transform them</span></li><li>parent: <input type="text" size="25" name="hparent" value="div" /> <span class="help">name of parent element</span></li><li>safe: <input type="radio" name="hsafe" value="0" checked="checked" />0 <input type="radio" name="hsafe" value="1" />1  <span class="help">for most <em>safe</em> HTML</span></li><li>schemes: <input type="text" size="50" name="hschemes" value="href: aim, feed, file, ftp, gopher, http, https, irc, mailto, news, nntp, sftp, ssh, telnet; *:file, http, https" /> <span class="help">allowed URL protocols</span></li><li>show_setting: <input type="text" size="25" name="hshow_setting" value="htmLawed_setting" disabled="disabled" /> <span class="help">variable name to record <em>finalized</em> htmLawed settings</span></li><li>style_pass: <input type="radio" name="hstyle_pass" value="0" checked="checked" />0 <input type="radio" name="hstyle_pass" value="1" />1 <input type="radio" name="hstyle_pass" value="nil" checked="checked" />not set  <span class="help">do not look at <em>style</em> attribute values</span></li><li>tidy: <input type="radio" name="htidy" value="-1" />-1 <input type="radio" name="htidy" value="0" checked="checked" />0 <input type="radio" name="htidy" value="1" />1 <input type="radio" name="htidy" value="2" />format: <input type="text" size="8" name="htidy2" value="1t1" /> <span class="help">beautify/compact</span></li><li>unique_ids: <input type="radio" name="hunique_ids" value="0" />0 <input type="radio" name="hunique_ids" value="1" checked="checked" />1 <input type="radio" name="hunique_ids" value="2" />prefix: <input type="text" size="8" name="hunique_ids2" value="my_" /> <span class="help">unique <em>id</em> values</span></li><li>valid_xhtml: <input type="radio" name="hvalid_xhtml" value="0" checked="checked" />0 <input type="radio" name="hvalid_xhtml" value="1" />1 <input type="radio" name="hvalid_xhtml" value="nil" checked="checked" />not set  <span class="help">auto-set various parameters for most valid XHTML</span></li><li>xml:lang: <input type="radio" name="hxml:lang" value="0" checked="checked" />0 <input type="radio" name="hxml:lang" value="1" />1 <input type="radio" name="hxml:lang" value="2" />2 <input type="radio" name="hxml:lang" value="nil" checked="checked" />not set  <span class="help">auto-add <em>xml:lang</em> attribute</span></li></ul></td></tr><tr><td><span style="vertical-align: top;" class="help" title="$spec argument: element-specific attribute rules">Spec:</span></td><td><textarea name="spec" id="spec" cols="70" rows="3" style="width:80%;"></textarea></td></tr></table>
</div>
</form>

<br /><a href="htmLawedTest.php" title="[toggle visibility] syntax-highlighted" onclick="javascript:toggle('inputR'); return false;"><span class="notice">Input code &raquo;</span></a> <span class="help" title="tags estimated as half of total &gt; and &lt; chars; values may be inaccurate for non-ASCII text"><small><big>68</big> chars, ~<big>1</big> tag</small>&nbsp;</span><div id="inputR" style="display: none;">
text to process; &lt; 8000 characters (for binary hexdump view, &lt; 1000)</div><script type="text/javascript">hl('inputR');</script> <a href="htmLawedTest.php" title="[toggle visibility] hexdump; non-viewable characters like line-returns are shown as dots" onclick="javascript:toggle('inputD'); return false;"><span class="notice">Input binary &raquo;&nbsp;</span></a><div id="inputD" style="display: none;"><pre>0000   74 65 78 74 20 74 6F 20  70 72 6F 63 65 73 73 3B    text to   process;
0010   20 3C 20 38 30 30 30 20  63 68 61 72 61 63 74 65     &lt; 8000   characte
0020   72 73 20 28 66 6F 72 20  62 69 6E 61 72 79 20 68    rs (for   binary h
0030   65 78 64 75 6D 70 20 76  69 65 77 2C 20 3C 20 31    exdump v  iew, &lt; 1
0040   30 30 30 29                                         000)</pre></div> <a href="htmLawedTest.php" title="[toggle visibility] finalized internal settings as interpreted by htmLawed; for developers" onclick="javascript:toggle('settingF'); return false;"><span class="notice">Finalized internal settings &raquo;&nbsp;</span></a> <div id="settingF" style="display: none;">$config: Array<br />
(<br />
&nbsp; [abs_url] =&gt; 0<br />
&nbsp; [anti_link_spam] =&gt; 0<br />
&nbsp; [anti_mail_spam] =&gt; 0<br />
&nbsp; [anti_mail_spam1] =&gt; NO@SPAM<br />
&nbsp; [balance] =&gt; 1<br />
&nbsp; [base_url] =&gt; 0<br />
&nbsp; [clean_ms_char] =&gt; 0<br />
&nbsp; [deny_attribute] =&gt; Array<br />
&nbsp; &nbsp; (<br />
&nbsp; &nbsp; &nbsp; [] =&gt; 0<br />
&nbsp; &nbsp; )<br />
<br />
&nbsp; [elements] =&gt; Array<br />
&nbsp; &nbsp; (<br />
&nbsp; &nbsp; &nbsp; [a] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [abbr] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [acronym] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [address] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [applet] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [area] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [b] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [bdo] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [big] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [blockquote] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [br] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [button] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [caption] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [center] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [cite] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [code] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [col] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [colgroup] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [dd] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [del] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [dfn] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [dir] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [div] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [dl] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [dt] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [em] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [embed] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [fieldset] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [font] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [form] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h1] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h2] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h3] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h4] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h5] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [h6] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [hr] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [i] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [iframe] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [img] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [input] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [ins] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [isindex] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [kbd] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [label] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [legend] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [li] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [map] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [menu] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [noscript] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [object] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [ol] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [optgroup] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [option] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [p] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [param] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [pre] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [q] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [rb] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [rbc] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [rp] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [rt] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [rtc] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [ruby] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [s] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [samp] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [script] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [select] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [small] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [span] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [strike] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [strong] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [sub] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [sup] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [table] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [tbody] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [td] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [textarea] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [tfoot] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [th] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [thead] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [tr] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [tt] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [u] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [ul] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; [var] =&gt; 1<br />
&nbsp; &nbsp; )<br />
<br />
&nbsp; [hexdec_entity] =&gt; 1<br />
&nbsp; [hook] =&gt; 0<br />
&nbsp; [hook_tag] =&gt; 0<br />
&nbsp; [keep_bad] =&gt; 6<br />
&nbsp; [lc_std_val] =&gt; 1<br />
&nbsp; [named_entity] =&gt; 1<br />
&nbsp; [no_deprecated_attr] =&gt; 1<br />
&nbsp; [parent] =&gt; div<br />
&nbsp; [safe] =&gt; 0<br />
&nbsp; [schemes] =&gt; Array<br />
&nbsp; &nbsp; (<br />
&nbsp; &nbsp; &nbsp; [href] =&gt; Array<br />
&nbsp; &nbsp; &nbsp; &nbsp; (<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [aim] =&gt; 0<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [feed] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [file] =&gt; 2<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [ftp] =&gt; 3<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [gopher] =&gt; 4<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [http] =&gt; 5<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [https] =&gt; 6<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [irc] =&gt; 7<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [mailto] =&gt; 8<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [news] =&gt; 9<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [nntp] =&gt; 10<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [sftp] =&gt; 11<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [ssh] =&gt; 12<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [telnet] =&gt; 13<br />
&nbsp; &nbsp; &nbsp; &nbsp; )<br />
<br />
&nbsp; &nbsp; &nbsp; [*] =&gt; Array<br />
&nbsp; &nbsp; &nbsp; &nbsp; (<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [file] =&gt; 0<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [http] =&gt; 1<br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [https] =&gt; 2<br />
&nbsp; &nbsp; &nbsp; &nbsp; )<br />
<br />
&nbsp; &nbsp; )<br />
<br />
&nbsp; [tidy] =&gt; 0<br />
&nbsp; [unique_ids] =&gt; 1<br />
&nbsp; [show_setting] =&gt; hlcfg<br />
&nbsp; [and_mark] =&gt; 0<br />
&nbsp; [cdata] =&gt; 3<br />
&nbsp; [comment] =&gt; 3<br />
&nbsp; [css_expression] =&gt; 0<br />
&nbsp; [direct_list_nest] =&gt; 0<br />
&nbsp; [make_tag_strict] =&gt; 1<br />
&nbsp; [style_pass] =&gt; 0<br />
&nbsp; [xml:lang] =&gt; 0<br />
)<br />
<br />$spec: Array<br />
(<br />
)<br />
</div><script type="text/javascript">hl('settingF');</script><br /><a href="htmLawedTest.php" title="[toggle visibility] suitable for copy-paste" onclick="javascript:toggle('outputF'); return false;"><span class="notice">Output &raquo;</span></a> <span class="help" title="approx., server-specific value excluding the 'include()' call"><small>htmLawed processing time <big>0.0003</big> s</small></span><span class="help"><small>, peak memory usage <big>0.91</big> <small>MB</small></small></span><div id="outputF"  style="display: block;"><div><textarea id="text2" class="textarea" name="text2" rows="5" cols="100" style="width: 100%;">text to process; &amp;lt; 8000 characters (for binary hexdump view, &amp;lt; 1000)</textarea></div><button type="button" onclick="javascript:document.getElementById('text2').focus();document.getElementById('text2').select()" title="select all to copy" style="float:right;">Select all</button></div><br /><a href="htmLawedTest.php" title="[toggle visibility] syntax-highlighted" onclick="javascript:toggle('outputR'); return false;"><span class="notice">Output code &raquo;</span></a><div id="outputR" style="display: block;">
text to process; &amp;lt; 8000 characters (for binary hexdump view, &amp;lt; 1000)</div><script type="text/javascript">hl('outputR');</script> <a href="htmLawedTest.php" title="[toggle visibility] hexdump; non-viewable characters like line-returns are shown as dots" onclick="javascript:toggle('outputD'); return false;"><span class="notice">Output binary &raquo;</span></a><div id="outputD" style="display: none;"><pre>0000   74 65 78 74 20 74 6F 20  70 72 6F 63 65 73 73 3B    text to   process;
0010   20 26 6C 74 3B 20 38 30  30 30 20 63 68 61 72 61     &amp;lt; 80  00 chara
0020   63 74 65 72 73 20 28 66  6F 72 20 62 69 6E 61 72    cters (f  or binar
0030   79 20 68 65 78 64 75 6D  70 20 76 69 65 77 2C 20    y hexdum  p view, 
0040   26 6C 74 3B 20 31 30 30  30 29                      &amp;lt; 100  0)</pre></div> <a href="htmLawedTest.php" title="[toggle visibility] inline output-input diff; might not be perfectly accurate, semantically or otherwise " onclick="javascript:toggle('diff'); diffLaunch(); return false;"><span class="notice">Diff &raquo;</span></a> <div id="diff" style="display: none;"></div><br /><a href="htmLawedTest.php" title="[toggle visibility] XHTML 1 Transitional doctype" onclick="javascript:toggle('outputH'); return false;"><span class="notice">Output rendered &raquo;</span></a><div id="outputH" style="display: block;">text to process; &lt; 8000 characters (for binary hexdump view, &lt; 1000)</div>
</div>
</body>
</html>
