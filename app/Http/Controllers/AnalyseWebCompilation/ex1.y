  %{
  #include <ctype.h>
  #include <stdlib.h>
  #include <stdio.h>
  #include <string.h>
  int yylex(void);
  void yyerror(char const *);
  extern FILE * yyin;
  extern yylineno;

  #define STACK_CAPACITY 1000
  static char* stack[STACK_CAPACITY];
  static int stack_line[STACK_CAPACITY];
  static size_t stack_size = 0;

  void afficher(char** stack){
    for(int i = 0; i < stack_size; i++){
      printf("%s  ", stack[i]);
    }
  }

  void inserer(char** stack, char* value){
    stack[stack_size] = value;
    stack_line[stack_size] = yylineno; 
    stack_size++;
  }

  void retirer(char** stack, char* value){
    if (strcmp(stack[stack_size - 1], value) == 0)
       stack_size--;
  }





%}

%token OUVRANTE_abbr FERMANTE_abbr OUVRANTE_div FERMANTE_div OUVRANTE_script FERMANTE_script OUVRANTE_a FERMANTE_a OUVRANTE_acronym FERMANTE_acronym OUVRANTE_address FERMANTE_address OUVRANTE_applet FERMANTE_applet OUVRANTE_article FERMANTE_article OUVRANTE_aside FERMANTE_aside OUVRANTE_audio FERMANTE_audio OUVRANTE_b FERMANTE_b OUVRANTE_bdi FERMANTE_bdi OUVRANTE_bdo FERMANTE_bdo OUVRANTE_big FERMANTE_big OUVRANTE_blockquote FERMANTE_blockquote OUVRANTE_body FERMANTE_body OUVRANTE_button FERMANTE_button OUVRANTE_canvas FERMANTE_canvas OUVRANTE_caption FERMANTE_caption OUVRANTE_center FERMANTE_center OUVRANTE_cite FERMANTE_cite OUVRANTE_code FERMANTE_code OUVRANTE_colgroup FERMANTE_colgroup OUVRANTE_data FERMANTE_data OUVRANTE_datalist FERMANTE_datalist OUVRANTE_dd FERMANTE_dd OUVRANTE_del FERMANTE_del OUVRANTE_details FERMANTE_details OUVRANTE_dfn FERMANTE_dfn OUVRANTE_dialog FERMANTE_dialog OUVRANTE_dir FERMANTE_dir OUVRANTE_dl FERMANTE_dl OUVRANTE_dt FERMANTE_dt OUVRANTE_em FERMANTE_em OUVRANTE_fieldset FERMANTE_fieldset OUVRANTE_figcaption FERMANTE_figcaption OUVRANTE_figure FERMANTE_figure OUVRANTE_font FERMANTE_font OUVRANTE_footer FERMANTE_footer OUVRANTE_form FERMANTE_form OUVRANTE_h1 FERMANTE_h1 OUVRANTE_h2 FERMANTE_h2 OUVRANTE_h3 FERMANTE_h3 OUVRANTE_h4 FERMANTE_h4 OUVRANTE_h5 FERMANTE_h5 OUVRANTE_h6 FERMANTE_h6 OUVRANTE_head FERMANTE_head OUVRANTE_header FERMANTE_header OUVRANTE_html FERMANTE_html OUVRANTE_i FERMANTE_i OUVRANTE_iframe FERMANTE_iframe OUVRANTE_ins FERMANTE_ins OUVRANTE_kbd FERMANTE_kbd OUVRANTE_label FERMANTE_label OUVRANTE_legend FERMANTE_legend OUVRANTE_li FERMANTE_li OUVRANTE_main FERMANTE_main OUVRANTE_mark FERMANTE_mark OUVRANTE_meter FERMANTE_meter OUVRANTE_nav FERMANTE_nav OUVRANTE_noframes FERMANTE_noframes OUVRANTE_noscript FERMANTE_noscript OUVRANTE_object FERMANTE_object OUVRANTE_ol FERMANTE_ol OUVRANTE_optgroup FERMANTE_optgroup OUVRANTE_option FERMANTE_option OUVRANTE_output FERMANTE_output OUVRANTE_p FERMANTE_p OUVRANTE_picture FERMANTE_picture OUVRANTE_pre FERMANTE_pre OUVRANTE_progress FERMANTE_progress OUVRANTE_q FERMANTE_q OUVRANTE_rp FERMANTE_rp OUVRANTE_rt FERMANTE_rt OUVRANTE_ruby FERMANTE_ruby OUVRANTE_s FERMANTE_s OUVRANTE_samp FERMANTE_samp OUVRANTE_section FERMANTE_section OUVRANTE_select FERMANTE_select OUVRANTE_small FERMANTE_small OUVRANTE_span FERMANTE_span OUVRANTE_strike FERMANTE_strike OUVRANTE_strong FERMANTE_strong OUVRANTE_style FERMANTE_style OUVRANTE_sub FERMANTE_sub OUVRANTE_summary FERMANTE_summary OUVRANTE_sup FERMANTE_sup OUVRANTE_svg FERMANTE_svg OUVRANTE_table FERMANTE_table OUVRANTE_tbody FERMANTE_tbody OUVRANTE_td FERMANTE_td OUVRANTE_template FERMANTE_template OUVRANTE_textarea FERMANTE_textarea OUVRANTE_tfoot FERMANTE_tfoot OUVRANTE_th FERMANTE_th OUVRANTE_thead FERMANTE_thead OUVRANTE_time FERMANTE_time OUVRANTE_title FERMANTE_title OUVRANTE_tr FERMANTE_tr OUVRANTE_tt FERMANTE_tt OUVRANTE_u FERMANTE_u OUVRANTE_ul FERMANTE_ul OUVRANTE_var FERMANTE_var OUVRANTE_video FERMANTE_video OUVRANTE_wbr FERMANTE_wbr;
%%

AXIOME: OUVRANTE_html { inserer(&stack, "html");  } BALISES FERMANTE_html { retirer(&stack, "html"); printf("cor");}

/*lignes:
lignes BALISES error '\n'
| lignes error '\n'
| BALISES error '\n'     
| error '\n'
| lignes BALISES '\n'    
| lignes '\n'				
| BALISES '\n'           
| '\n'		
;
*/
BALISES : 
 OUVRANTE_abbr { inserer(&stack, "abbr"); } BALISES FERMANTE_abbr { retirer(&stack, "abbr"); } BALISES
| OUVRANTE_a { inserer(&stack, "a"); } BALISES FERMANTE_a { retirer(&stack, "a"); } BALISES
| OUVRANTE_acronym { inserer(&stack, "acronym"); } BALISES FERMANTE_acronym { retirer(&stack, "acronym"); } BALISES
| OUVRANTE_address { inserer(&stack, "address"); } BALISES FERMANTE_address { retirer(&stack, "address"); } BALISES
| OUVRANTE_applet { inserer(&stack, "applet"); } BALISES FERMANTE_applet { retirer(&stack, "applet"); } BALISES
| OUVRANTE_article { inserer(&stack, "article"); } BALISES FERMANTE_article { retirer(&stack, "article"); } BALISES
| OUVRANTE_aside { inserer(&stack, "aside"); } BALISES FERMANTE_aside { retirer(&stack, "aside"); } BALISES
| OUVRANTE_audio { inserer(&stack, "audio"); } BALISES FERMANTE_audio { retirer(&stack, "audio"); } BALISES
| OUVRANTE_b { inserer(&stack, "b"); } BALISES FERMANTE_b { retirer(&stack, "b"); } BALISES
| OUVRANTE_bdi { inserer(&stack, "bdi"); } BALISES FERMANTE_bdi { retirer(&stack, "bdi"); } BALISES
| OUVRANTE_div { inserer(&stack, "div"); } BALISES FERMANTE_div { retirer(&stack, "div"); } BALISES
| OUVRANTE_bdo { inserer(&stack, "bdo"); } BALISES FERMANTE_bdo { retirer(&stack, "bdo"); } BALISES
| OUVRANTE_big { inserer(&stack, "big"); } BALISES FERMANTE_big { retirer(&stack, "big"); } BALISES
| OUVRANTE_blockquote { inserer(&stack, "blockquote"); } BALISES FERMANTE_blockquote { retirer(&stack, "blockquote"); } BALISES
| OUVRANTE_body { inserer(&stack, "body"); } BALISES FERMANTE_body { retirer(&stack, "body"); } BALISES
| OUVRANTE_button { inserer(&stack, "button"); } BALISES FERMANTE_button { retirer(&stack, "button"); } BALISES
| OUVRANTE_canvas { inserer(&stack, "canvas"); } BALISES FERMANTE_canvas { retirer(&stack, "canvas"); } BALISES
| OUVRANTE_caption { inserer(&stack, "caption"); } BALISES FERMANTE_caption { retirer(&stack, "caption"); } BALISES
| OUVRANTE_center { inserer(&stack, "center"); } BALISES FERMANTE_center { retirer(&stack, "center"); } BALISES
| OUVRANTE_cite { inserer(&stack, "cite"); } BALISES FERMANTE_cite { retirer(&stack, "cite"); } BALISES
| OUVRANTE_code { inserer(&stack, "code"); } BALISES FERMANTE_code { retirer(&stack, "code"); } BALISES
| OUVRANTE_colgroup { inserer(&stack, "colgroup"); } BALISES FERMANTE_colgroup { retirer(&stack, "colgroup"); } BALISES
| OUVRANTE_data { inserer(&stack, "data"); } BALISES FERMANTE_data { retirer(&stack, "data"); } BALISES
| OUVRANTE_datalist { inserer(&stack, "datalist"); } BALISES FERMANTE_datalist { retirer(&stack, "datalist"); } BALISES
| OUVRANTE_dd { inserer(&stack, "dd"); } BALISES FERMANTE_dd { retirer(&stack, "dd"); } BALISES
| OUVRANTE_del { inserer(&stack, "del"); } BALISES FERMANTE_del { retirer(&stack, "del"); } BALISES
| OUVRANTE_details { inserer(&stack, "details"); } BALISES FERMANTE_details { retirer(&stack, "details"); } BALISES
| OUVRANTE_dfn { inserer(&stack, "dfn"); } BALISES FERMANTE_dfn { retirer(&stack, "dfn"); } BALISES
| OUVRANTE_dialog { inserer(&stack, "dialog"); } BALISES FERMANTE_dialog { retirer(&stack, "dialog"); } BALISES
| OUVRANTE_dir { inserer(&stack, "dir"); } BALISES FERMANTE_dir { retirer(&stack, "dir"); } BALISES
| OUVRANTE_dl { inserer(&stack, "dl"); } BALISES FERMANTE_dl { retirer(&stack, "dl"); } BALISES
| OUVRANTE_dt { inserer(&stack, "dt"); } BALISES FERMANTE_dt { retirer(&stack, "dt"); } BALISES
| OUVRANTE_em { inserer(&stack, "em"); } BALISES FERMANTE_em { retirer(&stack, "em"); } BALISES
| OUVRANTE_fieldset { inserer(&stack, "fieldset"); } BALISES FERMANTE_fieldset { retirer(&stack, "fieldset"); } BALISES
| OUVRANTE_figcaption { inserer(&stack, "figcaption"); } BALISES FERMANTE_figcaption { retirer(&stack, "figcaption"); } BALISES
| OUVRANTE_figure { inserer(&stack, "figure"); } BALISES FERMANTE_figure { retirer(&stack, "figure"); } BALISES
| OUVRANTE_font { inserer(&stack, "font"); } BALISES FERMANTE_font { retirer(&stack, "font"); } BALISES
| OUVRANTE_footer { inserer(&stack, "footer"); } BALISES FERMANTE_footer { retirer(&stack, "footer"); } BALISES
| OUVRANTE_form { inserer(&stack, "form"); } BALISES FERMANTE_form { retirer(&stack, "form"); } BALISES
| OUVRANTE_h1 { inserer(&stack, "h1"); } BALISES FERMANTE_h1 { retirer(&stack, "h1"); } BALISES
| OUVRANTE_h2 { inserer(&stack, "h2"); } BALISES FERMANTE_h2 { retirer(&stack, "h2"); } BALISES
| OUVRANTE_h3 { inserer(&stack, "h3"); } BALISES FERMANTE_h3 { retirer(&stack, "h3"); } BALISES
| OUVRANTE_h4 { inserer(&stack, "h4"); } BALISES FERMANTE_h4 { retirer(&stack, "h4"); } BALISES
| OUVRANTE_h5 { inserer(&stack, "h5"); } BALISES FERMANTE_h5 { retirer(&stack, "h5"); } BALISES
| OUVRANTE_h6 { inserer(&stack, "h6"); } BALISES FERMANTE_h6 { retirer(&stack, "h6"); } BALISES
| OUVRANTE_head { inserer(&stack, "head"); } BALISES FERMANTE_head { retirer(&stack, "head"); } BALISES
| OUVRANTE_header { inserer(&stack, "header"); } BALISES FERMANTE_header { retirer(&stack, "header"); } BALISES
| OUVRANTE_i { inserer(&stack, "i"); } BALISES FERMANTE_i { retirer(&stack, "i"); } BALISES
| OUVRANTE_iframe { inserer(&stack, "iframe"); } BALISES FERMANTE_iframe { retirer(&stack, "iframe"); } BALISES
| OUVRANTE_ins { inserer(&stack, "ins"); } BALISES FERMANTE_ins { retirer(&stack, "ins"); } BALISES
| OUVRANTE_kbd { inserer(&stack, "kbd"); } BALISES FERMANTE_kbd { retirer(&stack, "kbd"); } BALISES
| OUVRANTE_label { inserer(&stack, "label"); } BALISES FERMANTE_label { retirer(&stack, "label"); } BALISES
| OUVRANTE_legend { inserer(&stack, "legend"); } BALISES FERMANTE_legend { retirer(&stack, "legend"); } BALISES
| OUVRANTE_li { inserer(&stack, "li"); } BALISES FERMANTE_li { retirer(&stack, "li"); } BALISES
| OUVRANTE_main { inserer(&stack, "main"); } BALISES FERMANTE_main { retirer(&stack, "main"); } BALISES
| OUVRANTE_mark { inserer(&stack, "mark"); } BALISES FERMANTE_mark { retirer(&stack, "mark"); } BALISES
| OUVRANTE_meter { inserer(&stack, "meter"); } BALISES FERMANTE_meter { retirer(&stack, "meter"); } BALISES
| OUVRANTE_nav { inserer(&stack, "nav"); } BALISES FERMANTE_nav { retirer(&stack, "nav"); } BALISES
| OUVRANTE_noframes { inserer(&stack, "noframes"); } BALISES FERMANTE_noframes { retirer(&stack, "noframes"); } BALISES
| OUVRANTE_noscript { inserer(&stack, "noscript"); } BALISES FERMANTE_noscript { retirer(&stack, "noscript"); } BALISES
| OUVRANTE_object { inserer(&stack, "object"); } BALISES FERMANTE_object { retirer(&stack, "object"); } BALISES
| OUVRANTE_ol { inserer(&stack, "ol"); } BALISES FERMANTE_ol { retirer(&stack, "ol"); } BALISES
| OUVRANTE_optgroup { inserer(&stack, "optgroup"); } BALISES FERMANTE_optgroup { retirer(&stack, "optgroup"); } BALISES
| OUVRANTE_option { inserer(&stack, "option"); } BALISES FERMANTE_option { retirer(&stack, "option"); } BALISES
| OUVRANTE_output { inserer(&stack, "output"); } BALISES FERMANTE_output { retirer(&stack, "output"); } BALISES
| OUVRANTE_p { inserer(&stack, "p"); } BALISES FERMANTE_p { retirer(&stack, "p"); } BALISES
| OUVRANTE_picture { inserer(&stack, "picture"); } BALISES FERMANTE_picture { retirer(&stack, "picture"); } BALISES
| OUVRANTE_pre { inserer(&stack, "pre"); } BALISES FERMANTE_pre { retirer(&stack, "pre"); } BALISES
| OUVRANTE_progress { inserer(&stack, "progress"); } BALISES FERMANTE_progress { retirer(&stack, "progress"); } BALISES
| OUVRANTE_q { inserer(&stack, "q"); } BALISES FERMANTE_q { retirer(&stack, "q"); } BALISES
| OUVRANTE_rp { inserer(&stack, "rp"); } BALISES FERMANTE_rp { retirer(&stack, "rp"); } BALISES
| OUVRANTE_rt { inserer(&stack, "rt"); } BALISES FERMANTE_rt { retirer(&stack, "rt"); } BALISES
| OUVRANTE_ruby { inserer(&stack, "ruby"); } BALISES FERMANTE_ruby { retirer(&stack, "ruby"); } BALISES
| OUVRANTE_s { inserer(&stack, "s"); } BALISES FERMANTE_s { retirer(&stack, "s"); } BALISES
| OUVRANTE_samp { inserer(&stack, "samp"); } BALISES FERMANTE_samp { retirer(&stack, "samp"); } BALISES
| OUVRANTE_section { inserer(&stack, "section"); } BALISES FERMANTE_section { retirer(&stack, "section"); } BALISES
| OUVRANTE_select { inserer(&stack, "select"); } BALISES FERMANTE_select { retirer(&stack, "select"); } BALISES
| OUVRANTE_small { inserer(&stack, "small"); } BALISES FERMANTE_small { retirer(&stack, "small"); } BALISES
| OUVRANTE_span { inserer(&stack, "span"); } BALISES FERMANTE_span { retirer(&stack, "span"); } BALISES
| OUVRANTE_strike { inserer(&stack, "strike"); } BALISES FERMANTE_strike { retirer(&stack, "strike"); } BALISES
| OUVRANTE_strong { inserer(&stack, "strong"); } BALISES FERMANTE_strong { retirer(&stack, "strong"); } BALISES
| OUVRANTE_style { inserer(&stack, "style"); } BALISES FERMANTE_style { retirer(&stack, "style"); } BALISES
| OUVRANTE_sub { inserer(&stack, "sub"); } BALISES FERMANTE_sub { retirer(&stack, "sub"); } BALISES
| OUVRANTE_summary { inserer(&stack, "summary"); } BALISES FERMANTE_summary { retirer(&stack, "summary"); } BALISES
| OUVRANTE_sup { inserer(&stack, "sup"); } BALISES FERMANTE_sup { retirer(&stack, "sup"); } BALISES
| OUVRANTE_svg { inserer(&stack, "svg"); } BALISES FERMANTE_svg { retirer(&stack, "svg"); } BALISES
| OUVRANTE_table { inserer(&stack, "table"); } BALISES FERMANTE_table { retirer(&stack, "table"); } BALISES
| OUVRANTE_tbody { inserer(&stack, "tbody"); } BALISES FERMANTE_tbody { retirer(&stack, "tbody"); } BALISES
| OUVRANTE_td { inserer(&stack, "td"); } BALISES FERMANTE_td { retirer(&stack, "td"); } BALISES
| OUVRANTE_template { inserer(&stack, "template"); } BALISES FERMANTE_template { retirer(&stack, "template"); } BALISES
| OUVRANTE_textarea { inserer(&stack, "textarea"); } BALISES FERMANTE_textarea { retirer(&stack, "textarea"); } BALISES
| OUVRANTE_tfoot { inserer(&stack, "tfoot"); } BALISES FERMANTE_tfoot { retirer(&stack, "tfoot"); } BALISES
| OUVRANTE_th { inserer(&stack, "th"); } BALISES FERMANTE_th { retirer(&stack, "th"); } BALISES
| OUVRANTE_thead { inserer(&stack, "thead"); } BALISES FERMANTE_thead { retirer(&stack, "thead"); } BALISES
| OUVRANTE_time { inserer(&stack, "time"); } BALISES FERMANTE_time { retirer(&stack, "time"); } BALISES
| OUVRANTE_title { inserer(&stack, "title"); } BALISES FERMANTE_title { retirer(&stack, "title"); } BALISES
| OUVRANTE_tr { inserer(&stack, "tr"); } BALISES FERMANTE_tr { retirer(&stack, "tr"); } BALISES
| OUVRANTE_tt { inserer(&stack, "tt"); } BALISES FERMANTE_tt { retirer(&stack, "tt"); } BALISES
| OUVRANTE_u { inserer(&stack, "u"); } BALISES FERMANTE_u { retirer(&stack, "u"); } BALISES
| OUVRANTE_ul { inserer(&stack, "ul"); } BALISES FERMANTE_ul { retirer(&stack, "ul"); } BALISES
| OUVRANTE_var { inserer(&stack, "var"); } BALISES FERMANTE_var { retirer(&stack, "var"); } BALISES
| OUVRANTE_video { inserer(&stack, "video"); } BALISES FERMANTE_video { retirer(&stack, "video"); } BALISES
| OUVRANTE_wbr { inserer(&stack, "wbr"); } BALISES FERMANTE_wbr { retirer(&stack, "wbr"); } BALISES
| OUVRANTE_script { inserer(&stack, "script"); } BALISES FERMANTE_script { retirer(&stack, "script"); } BALISES
|
;



%%
 

void main()
	{  
		yyin=fopen("tags.txt", "r");
		//printf("\n");
		yyparse();
	}

void yyerror(char const *s) {
  if (stack_size == 0){
    fprintf(stderr, "html.0.0");
  } else
  fprintf(stderr, "%s.%d.%d", stack[stack_size - 1], stack_line[stack_size - 1],yylineno);
}
