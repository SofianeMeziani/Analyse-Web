/* A Bison parser, made by GNU Bison 3.0.4.  */

/* Bison interface for Yacc-like parsers in C

   Copyright (C) 1984, 1989-1990, 2000-2015 Free Software Foundation, Inc.

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see <http://www.gnu.org/licenses/>.  */

/* As a special exception, you may create a larger work that contains
   part or all of the Bison parser skeleton and distribute that work
   under terms of your choice, so long as that work isn't itself a
   parser generator using the skeleton or a modified version thereof
   as a parser skeleton.  Alternatively, if you modify or redistribute
   the parser skeleton itself, you may (at your option) remove this
   special exception, which will cause the skeleton and the resulting
   Bison output files to be licensed under the GNU General Public
   License without this special exception.

   This special exception was added by the Free Software Foundation in
   version 2.2 of Bison.  */

#ifndef YY_YY_EX1_TAB_H_INCLUDED
# define YY_YY_EX1_TAB_H_INCLUDED
/* Debug traces.  */
#ifndef YYDEBUG
# define YYDEBUG 0
#endif
#if YYDEBUG
extern int yydebug;
#endif

/* Token type.  */
#ifndef YYTOKENTYPE
# define YYTOKENTYPE
  enum yytokentype
  {
    OUVRANTE_abbr = 258,
    FERMANTE_abbr = 259,
    OUVRANTE_div = 260,
    FERMANTE_div = 261,
    OUVRANTE_script = 262,
    FERMANTE_script = 263,
    OUVRANTE_a = 264,
    FERMANTE_a = 265,
    OUVRANTE_acronym = 266,
    FERMANTE_acronym = 267,
    OUVRANTE_address = 268,
    FERMANTE_address = 269,
    OUVRANTE_applet = 270,
    FERMANTE_applet = 271,
    OUVRANTE_article = 272,
    FERMANTE_article = 273,
    OUVRANTE_aside = 274,
    FERMANTE_aside = 275,
    OUVRANTE_audio = 276,
    FERMANTE_audio = 277,
    OUVRANTE_b = 278,
    FERMANTE_b = 279,
    OUVRANTE_bdi = 280,
    FERMANTE_bdi = 281,
    OUVRANTE_bdo = 282,
    FERMANTE_bdo = 283,
    OUVRANTE_big = 284,
    FERMANTE_big = 285,
    OUVRANTE_blockquote = 286,
    FERMANTE_blockquote = 287,
    OUVRANTE_body = 288,
    FERMANTE_body = 289,
    OUVRANTE_button = 290,
    FERMANTE_button = 291,
    OUVRANTE_canvas = 292,
    FERMANTE_canvas = 293,
    OUVRANTE_caption = 294,
    FERMANTE_caption = 295,
    OUVRANTE_center = 296,
    FERMANTE_center = 297,
    OUVRANTE_cite = 298,
    FERMANTE_cite = 299,
    OUVRANTE_code = 300,
    FERMANTE_code = 301,
    OUVRANTE_colgroup = 302,
    FERMANTE_colgroup = 303,
    OUVRANTE_data = 304,
    FERMANTE_data = 305,
    OUVRANTE_datalist = 306,
    FERMANTE_datalist = 307,
    OUVRANTE_dd = 308,
    FERMANTE_dd = 309,
    OUVRANTE_del = 310,
    FERMANTE_del = 311,
    OUVRANTE_details = 312,
    FERMANTE_details = 313,
    OUVRANTE_dfn = 314,
    FERMANTE_dfn = 315,
    OUVRANTE_dialog = 316,
    FERMANTE_dialog = 317,
    OUVRANTE_dir = 318,
    FERMANTE_dir = 319,
    OUVRANTE_dl = 320,
    FERMANTE_dl = 321,
    OUVRANTE_dt = 322,
    FERMANTE_dt = 323,
    OUVRANTE_em = 324,
    FERMANTE_em = 325,
    OUVRANTE_fieldset = 326,
    FERMANTE_fieldset = 327,
    OUVRANTE_figcaption = 328,
    FERMANTE_figcaption = 329,
    OUVRANTE_figure = 330,
    FERMANTE_figure = 331,
    OUVRANTE_font = 332,
    FERMANTE_font = 333,
    OUVRANTE_footer = 334,
    FERMANTE_footer = 335,
    OUVRANTE_form = 336,
    FERMANTE_form = 337,
    OUVRANTE_h1 = 338,
    FERMANTE_h1 = 339,
    OUVRANTE_h2 = 340,
    FERMANTE_h2 = 341,
    OUVRANTE_h3 = 342,
    FERMANTE_h3 = 343,
    OUVRANTE_h4 = 344,
    FERMANTE_h4 = 345,
    OUVRANTE_h5 = 346,
    FERMANTE_h5 = 347,
    OUVRANTE_h6 = 348,
    FERMANTE_h6 = 349,
    OUVRANTE_head = 350,
    FERMANTE_head = 351,
    OUVRANTE_header = 352,
    FERMANTE_header = 353,
    OUVRANTE_html = 354,
    FERMANTE_html = 355,
    OUVRANTE_i = 356,
    FERMANTE_i = 357,
    OUVRANTE_iframe = 358,
    FERMANTE_iframe = 359,
    OUVRANTE_ins = 360,
    FERMANTE_ins = 361,
    OUVRANTE_kbd = 362,
    FERMANTE_kbd = 363,
    OUVRANTE_label = 364,
    FERMANTE_label = 365,
    OUVRANTE_legend = 366,
    FERMANTE_legend = 367,
    OUVRANTE_li = 368,
    FERMANTE_li = 369,
    OUVRANTE_main = 370,
    FERMANTE_main = 371,
    OUVRANTE_mark = 372,
    FERMANTE_mark = 373,
    OUVRANTE_meter = 374,
    FERMANTE_meter = 375,
    OUVRANTE_nav = 376,
    FERMANTE_nav = 377,
    OUVRANTE_noframes = 378,
    FERMANTE_noframes = 379,
    OUVRANTE_noscript = 380,
    FERMANTE_noscript = 381,
    OUVRANTE_object = 382,
    FERMANTE_object = 383,
    OUVRANTE_ol = 384,
    FERMANTE_ol = 385,
    OUVRANTE_optgroup = 386,
    FERMANTE_optgroup = 387,
    OUVRANTE_option = 388,
    FERMANTE_option = 389,
    OUVRANTE_output = 390,
    FERMANTE_output = 391,
    OUVRANTE_p = 392,
    FERMANTE_p = 393,
    OUVRANTE_picture = 394,
    FERMANTE_picture = 395,
    OUVRANTE_pre = 396,
    FERMANTE_pre = 397,
    OUVRANTE_progress = 398,
    FERMANTE_progress = 399,
    OUVRANTE_q = 400,
    FERMANTE_q = 401,
    OUVRANTE_rp = 402,
    FERMANTE_rp = 403,
    OUVRANTE_rt = 404,
    FERMANTE_rt = 405,
    OUVRANTE_ruby = 406,
    FERMANTE_ruby = 407,
    OUVRANTE_s = 408,
    FERMANTE_s = 409,
    OUVRANTE_samp = 410,
    FERMANTE_samp = 411,
    OUVRANTE_section = 412,
    FERMANTE_section = 413,
    OUVRANTE_select = 414,
    FERMANTE_select = 415,
    OUVRANTE_small = 416,
    FERMANTE_small = 417,
    OUVRANTE_span = 418,
    FERMANTE_span = 419,
    OUVRANTE_strike = 420,
    FERMANTE_strike = 421,
    OUVRANTE_strong = 422,
    FERMANTE_strong = 423,
    OUVRANTE_style = 424,
    FERMANTE_style = 425,
    OUVRANTE_sub = 426,
    FERMANTE_sub = 427,
    OUVRANTE_summary = 428,
    FERMANTE_summary = 429,
    OUVRANTE_sup = 430,
    FERMANTE_sup = 431,
    OUVRANTE_svg = 432,
    FERMANTE_svg = 433,
    OUVRANTE_table = 434,
    FERMANTE_table = 435,
    OUVRANTE_tbody = 436,
    FERMANTE_tbody = 437,
    OUVRANTE_td = 438,
    FERMANTE_td = 439,
    OUVRANTE_template = 440,
    FERMANTE_template = 441,
    OUVRANTE_textarea = 442,
    FERMANTE_textarea = 443,
    OUVRANTE_tfoot = 444,
    FERMANTE_tfoot = 445,
    OUVRANTE_th = 446,
    FERMANTE_th = 447,
    OUVRANTE_thead = 448,
    FERMANTE_thead = 449,
    OUVRANTE_time = 450,
    FERMANTE_time = 451,
    OUVRANTE_title = 452,
    FERMANTE_title = 453,
    OUVRANTE_tr = 454,
    FERMANTE_tr = 455,
    OUVRANTE_tt = 456,
    FERMANTE_tt = 457,
    OUVRANTE_u = 458,
    FERMANTE_u = 459,
    OUVRANTE_ul = 460,
    FERMANTE_ul = 461,
    OUVRANTE_var = 462,
    FERMANTE_var = 463,
    OUVRANTE_video = 464,
    FERMANTE_video = 465,
    OUVRANTE_wbr = 466,
    FERMANTE_wbr = 467
  };
#endif

/* Value type.  */
#if ! defined YYSTYPE && ! defined YYSTYPE_IS_DECLARED
typedef int YYSTYPE;
# define YYSTYPE_IS_TRIVIAL 1
# define YYSTYPE_IS_DECLARED 1
#endif


extern YYSTYPE yylval;

int yyparse (void);

#endif /* !YY_YY_EX1_TAB_H_INCLUDED  */
