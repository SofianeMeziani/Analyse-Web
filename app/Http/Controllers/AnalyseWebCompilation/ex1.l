 /* Declaration section*/
%{ 
  #include <limits.h>
  #include "ex1.tab.h"
  #include "pile.h"


%} 
%option noyywrap
%%


"<!--"(.|\n)*?--> {}

"<"(area|base|basefont|br|embed|frame|hr|img|input|link|map|meta|param|source|track)[^>|<]*">"|"<!"[^>|<]*> {} 
"<!"(.*?)> {}

"</abbr>" { return FERMANTE_abbr;} 
"<abbr"[^>|<]*> { return OUVRANTE_abbr;} 

"</acronym>" { return FERMANTE_acronym;} 
"<acronym"[^>|<]*> { return OUVRANTE_acronym;} 

"</address>" { return FERMANTE_address;} 
"<address"[^>|<]*> { return OUVRANTE_address;} 

"</applet>" { return FERMANTE_applet;} 
"<applet"[^>|<]*> { return OUVRANTE_applet;} 

"</article>" { return FERMANTE_article;} 
"<article"[^>|<]*> { return OUVRANTE_article;} 

"</aside>" { return FERMANTE_aside;} 
"<aside"[^>|<]*> { return OUVRANTE_aside;} 

"</audio>" { return FERMANTE_audio;} 
"<audio"[^>|<]*> { return OUVRANTE_audio;} 

"</a>" { return FERMANTE_a;} 
"<a"[^>|<]*> { return OUVRANTE_a;} 

"</bdi>" { return FERMANTE_bdi;} 
"<bdi"[^>|<]*> { return OUVRANTE_bdi;} 

"</bdo>" { return FERMANTE_bdo;} 
"<bdo"[^>|<]*> { return OUVRANTE_bdo;} 

"</big>" { return FERMANTE_big;} 
"<big"[^>|<]*> { return OUVRANTE_big;} 

"</blockquote>" { return FERMANTE_blockquote;} 
"<blockquote"[^>|<]*> { return OUVRANTE_blockquote;} 

"</body>" { return FERMANTE_body;} 
"<body"[^>|<]*> { return OUVRANTE_body;} 

"</button>" { return FERMANTE_button;} 
"<button"[^>|<]*> { return OUVRANTE_button;}

"</b>" { return FERMANTE_b;} 
"<b"[^>|<]*> { return OUVRANTE_b;}  

"</canvas>" { return FERMANTE_canvas;}
"<canvas"[^>|<]*> { return OUVRANTE_canvas;}

"</caption>" { return FERMANTE_caption;} 
"<caption"[^>|<]*> { return OUVRANTE_caption;} 

"</center>" { return FERMANTE_center;} 
"<center"[^>|<]*> { return OUVRANTE_center;} 

"</cite>" { return FERMANTE_cite;}
"<cite"[^>|<]*> { return OUVRANTE_cite;} 

"</code>" { return FERMANTE_code;}
"<code"[^>|<]*> { return OUVRANTE_code;} 

"</colgroup>" { return FERMANTE_colgroup;}
"<colgroup"[^>|<]*> { return OUVRANTE_colgroup;} 

"</datalist>" { return FERMANTE_datalist;}
"<datalist"[^>|<]*> { return OUVRANTE_datalist;} 

"</data>" { return FERMANTE_data;}
"<data"[^>|<]*> { return OUVRANTE_data;} 

"</dd>" { return FERMANTE_dd;}
"<dd"[^>|<]*> { return OUVRANTE_dd;} 

"</del>" { return FERMANTE_del;}
"<del"[^>|<]*> { return OUVRANTE_del;} 

"</details>" { return FERMANTE_details;}
"<details"[^>|<]*> { return OUVRANTE_details;} 

"</dfn>" { return FERMANTE_dfn;}
"<dfn"[^>|<]*> { return OUVRANTE_dfn;} 

"</dialog>" { return FERMANTE_dialog;}
"<dialog"[^>|<]*> { return OUVRANTE_dialog;} 

"</dir>" { return FERMANTE_dir;}
"<dir"[^>|<]*> { return OUVRANTE_dir;} 

"</div>" { return FERMANTE_div;}
"<div"[^>|<]*> { return OUVRANTE_div;} 

"</dl>" { return FERMANTE_dl;}
"<dl"[^>|<]*> { return OUVRANTE_dl;} 

"</dt>" { return FERMANTE_dt;}
"<dt"[^>|<]*> { return OUVRANTE_dt;} 

"</em>" { return FERMANTE_em;}
"<em"[^>|<]*> { return OUVRANTE_em;} 

"</fieldset>" { return FERMANTE_fieldset;}
"<fieldset"[^>|<]*> { return OUVRANTE_fieldset;} 

"</figcaption>" { return FERMANTE_figcaption;}
"<figcaption"[^>|<]*> { return OUVRANTE_figcaption;} 

"</figure>" { return FERMANTE_figure;}
"<figure"[^>|<]*> { return OUVRANTE_figure;} 

"</font>" { return FERMANTE_font;}
"<font"[^>|<]*> { return OUVRANTE_font;} 

"</footer>" { return FERMANTE_footer;}
"<footer"[^>|<]*> { return OUVRANTE_footer;} 

"</form>" { return FERMANTE_form;}
"<form"[^>|<]*> { return OUVRANTE_form;} 

"</h1>" { return FERMANTE_h1;}
"<h1"[^>|<]*> { return OUVRANTE_h1;} 

"</h2>" { return FERMANTE_h2;}
"<h2"[^>|<]*> { return OUVRANTE_h2;} 

"</h3>" { return FERMANTE_h3;}
"<h3"[^>|<]*> { return OUVRANTE_h3;} 

"</h4>" { return FERMANTE_h4;}
"<h4"[^>|<]*> { return OUVRANTE_h4;} 

"</h5>" { return FERMANTE_h5;}
"<h5"[^>|<]*> { return OUVRANTE_h5;} 

"</h6>" { return FERMANTE_h6;}
"<h6"[^>|<]*> { return OUVRANTE_h6;} 

"</header>" { return FERMANTE_header;}
"<header"[^>|<]*> { return OUVRANTE_header;} 

"</head>" { return FERMANTE_head;}
"<head"[^>|<]*> { return OUVRANTE_head;} 

"</html>" { return FERMANTE_html;}
"<html"[^>|<]*> { return OUVRANTE_html;} 

"</iframe>" { return FERMANTE_iframe;}
"<iframe"[^>|<]*> { return OUVRANTE_iframe;} 

"</ins>" { return FERMANTE_ins;}
"<ins"[^>|<]*> { return OUVRANTE_ins;}

"</i>" { return FERMANTE_i;}
"<i"[^>|<]*> { return OUVRANTE_i;}  

"</kbd>" { return FERMANTE_kbd;}
"<kbd"[^>|<]*> { return OUVRANTE_kbd;} 

"</label>" { return FERMANTE_label;}
"<label"[^>|<]*> { return OUVRANTE_label;} 

"</legend>" { return FERMANTE_legend;}
"<legend"[^>|<]*> { return OUVRANTE_legend;} 

"</li>" {return FERMANTE_li;}
"<li"[^>|<]*> { return OUVRANTE_li;} 

"</main>" { return FERMANTE_main;}
"<main"[^>|<]*> { return OUVRANTE_main;} 

"</mark>" { return FERMANTE_mark;}
"<mark"[^>|<]*> { return OUVRANTE_mark;} 

"</meter>" { return FERMANTE_meter;}
"<meter"[^>|<]*> { return OUVRANTE_meter;} 

"</nav>" { return FERMANTE_nav;}
"<nav"[^>|<]*> { return OUVRANTE_nav;} 

"</noframes>" { return FERMANTE_noframes;}
"<noframes"[^>|<]*> { return OUVRANTE_noframes;} 

"</noscript>" { return FERMANTE_noscript;}
"<noscript"[^>|<]*> { return OUVRANTE_noscript;} 

"</object>" { return FERMANTE_object;}
"<object"[^>|<]*> { return OUVRANTE_object;} 

"</ol>" { return FERMANTE_ol;}
"<ol"[^>|<]*> { return OUVRANTE_ol;} 

"</optgroup>" { return FERMANTE_optgroup;}
"<optgroup"[^>|<]*> { return OUVRANTE_optgroup;} 

"</option>" { return FERMANTE_option;}
"<option"[^>|<]*> { return OUVRANTE_option;} 

"</output>" { return FERMANTE_output;}
"<output"[^>|<]*> { return OUVRANTE_output;} 

"</picture>" { return FERMANTE_picture;}
"<picture"[^>|<]*> { return OUVRANTE_picture;} 

"</pre>" { return FERMANTE_pre;}
"<pre"[^>|<]*> { return OUVRANTE_pre;} 

"</progress>" { return FERMANTE_progress;}
"<progress"[^>|<]*> { return OUVRANTE_progress;} 

"</p>" { return FERMANTE_p;}
"<p"[^>|<]*> { return OUVRANTE_p;} 

"</q>" { return FERMANTE_q;}
"<q"[^>|<]*> { return OUVRANTE_q;} 

"</rp>" { return FERMANTE_rp;}
"<rp"[^>|<]*> { return OUVRANTE_rp;} 

"</rt>" { return FERMANTE_rt;}
"<rt"[^>|<]*> { return OUVRANTE_rt;} 

"</ruby>" { return FERMANTE_ruby;}
"<ruby"[^>|<]*> { return OUVRANTE_ruby;} 

"</samp>" { return FERMANTE_samp;}
"<samp"[^>|<]*> { return OUVRANTE_samp;} 

"</script>" { return FERMANTE_script;}
"<script"[^>|<]*> { return OUVRANTE_script;} 

"</section>" { return FERMANTE_section;}
"<section"[^>|<]*> { return OUVRANTE_section;} 

"</select>" { return FERMANTE_select;}
"<select"[^>|<]*> { return OUVRANTE_select;} 

"</small>" { return FERMANTE_small;}
"<small"[^>|<]*> { return OUVRANTE_small;} 

"</span>" { return FERMANTE_span;}
"<span"[^>|<]*> { return OUVRANTE_span;} 

"</strike>" { return FERMANTE_strike;}
"<strike"[^>|<]*> { return OUVRANTE_strike;} 

"</strong>" { return FERMANTE_strong;}
"<strong"[^>|<]*> { return OUVRANTE_strong;} 

"</style>" { return FERMANTE_style;}
"<style"[^>|<]*> { return OUVRANTE_style;} 

"</sub>" { return FERMANTE_sub;}
"<sub"[^>|<]*> { return OUVRANTE_sub;} 

"</summary>" { return FERMANTE_summary;}
"<summary"[^>|<]*> { return OUVRANTE_summary;} 

"</sup>" { return FERMANTE_sup;}
"<sup"[^>|<]*> { return OUVRANTE_sup;} 

"</svg>" { return FERMANTE_svg;}
"<svg"[^>|<]*> { return OUVRANTE_svg;}

"</s>" { return FERMANTE_s;}
"<s"[^>|<]*> { return OUVRANTE_s;}  

"</table>" { return FERMANTE_table;}
"<table"[^>|<]*> { return OUVRANTE_table;} 

"</tbody>" { return FERMANTE_tbody;}
"<tbody"[^>|<]*> { return OUVRANTE_tbody;} 

"</td>" { return FERMANTE_td;}
"<td"[^>|<]*> { return OUVRANTE_td;} 

"</template>" { return FERMANTE_template;}
"<template"[^>|<]*> { return OUVRANTE_template;} 

"</textarea>" { return FERMANTE_textarea;}
"<textarea"[^>|<]*> { return OUVRANTE_textarea;} 

"</tfoot>" { return FERMANTE_tfoot;}
"<tfoot"[^>|<]*> { return OUVRANTE_tfoot;} 

"</thead>" { return FERMANTE_thead;}
"<thead"[^>|<]*> { return OUVRANTE_thead;}

"</th>" { return FERMANTE_th;}
"<th"[^>|<]*> { return OUVRANTE_th;}  

"</time>" { return FERMANTE_time;}
"<time"[^>|<]*> { return OUVRANTE_time;} 

"</title>" { return FERMANTE_title;}
"<title"[^>|<]*> { return OUVRANTE_title;} 

"</tr>" { return FERMANTE_tr;}
"<tr"[^>|<]*> { return OUVRANTE_tr;} 

"</tt>" { return FERMANTE_tt;}
"<tt"[^>|<]*> { return OUVRANTE_tt;} 

"</ul>" { return FERMANTE_ul;}
"<ul"[^>|<]*> { return OUVRANTE_ul;} 

"</u>" { return FERMANTE_u;}
"<u"[^>|<]*> { return OUVRANTE_u;} 

"</var>" { return FERMANTE_var;}
"<var"[^>|<]*> { return OUVRANTE_var;} 

"</video>" { return FERMANTE_video;}
"<video"[^>|<]*> { return OUVRANTE_video;} 

"</wbr>" { return FERMANTE_wbr;}
"<wbr"[^>|<]*> { return OUVRANTE_wbr;} 

"<col"[^>|<]*">"|"<!"[^>|<]*> {} 

\n {yylineno++;}

. ;
%%   
 
  
