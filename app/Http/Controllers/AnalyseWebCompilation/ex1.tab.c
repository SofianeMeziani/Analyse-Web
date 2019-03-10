/* A Bison parser, made by GNU Bison 3.0.4.  */

/* Bison implementation for Yacc-like parsers in C

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

/* C LALR(1) parser skeleton written by Richard Stallman, by
   simplifying the original so-called "semantic" parser.  */

/* All symbols defined below should begin with yy or YY, to avoid
   infringing on user name space.  This should be done even for local
   variables, as they might otherwise be expanded by user macros.
   There are some unavoidable exceptions within include files to
   define necessary library symbols; they are noted "INFRINGES ON
   USER NAME SPACE" below.  */

/* Identify Bison output.  */
#define YYBISON 1

/* Bison version.  */
#define YYBISON_VERSION "3.0.4"

/* Skeleton name.  */
#define YYSKELETON_NAME "yacc.c"

/* Pure parsers.  */
#define YYPURE 0

/* Push parsers.  */
#define YYPUSH 0

/* Pull parsers.  */
#define YYPULL 1




/* Copy the first part of user declarations.  */
#line 1 "ex1.y" /* yacc.c:339  */

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






#line 104 "ex1.tab.c" /* yacc.c:339  */

# ifndef YY_NULLPTR
#  if defined __cplusplus && 201103L <= __cplusplus
#   define YY_NULLPTR nullptr
#  else
#   define YY_NULLPTR 0
#  endif
# endif

/* Enabling verbose error messages.  */
#ifdef YYERROR_VERBOSE
# undef YYERROR_VERBOSE
# define YYERROR_VERBOSE 1
#else
# define YYERROR_VERBOSE 0
#endif

/* In a future release of Bison, this section will be replaced
   by #include "ex1.tab.h".  */
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

/* Copy the second part of user declarations.  */

#line 368 "ex1.tab.c" /* yacc.c:358  */

#ifdef short
# undef short
#endif

#ifdef YYTYPE_UINT8
typedef YYTYPE_UINT8 yytype_uint8;
#else
typedef unsigned char yytype_uint8;
#endif

#ifdef YYTYPE_INT8
typedef YYTYPE_INT8 yytype_int8;
#else
typedef signed char yytype_int8;
#endif

#ifdef YYTYPE_UINT16
typedef YYTYPE_UINT16 yytype_uint16;
#else
typedef unsigned short int yytype_uint16;
#endif

#ifdef YYTYPE_INT16
typedef YYTYPE_INT16 yytype_int16;
#else
typedef short int yytype_int16;
#endif

#ifndef YYSIZE_T
# ifdef __SIZE_TYPE__
#  define YYSIZE_T __SIZE_TYPE__
# elif defined size_t
#  define YYSIZE_T size_t
# elif ! defined YYSIZE_T
#  include <stddef.h> /* INFRINGES ON USER NAME SPACE */
#  define YYSIZE_T size_t
# else
#  define YYSIZE_T unsigned int
# endif
#endif

#define YYSIZE_MAXIMUM ((YYSIZE_T) -1)

#ifndef YY_
# if defined YYENABLE_NLS && YYENABLE_NLS
#  if ENABLE_NLS
#   include <libintl.h> /* INFRINGES ON USER NAME SPACE */
#   define YY_(Msgid) dgettext ("bison-runtime", Msgid)
#  endif
# endif
# ifndef YY_
#  define YY_(Msgid) Msgid
# endif
#endif

#ifndef YY_ATTRIBUTE
# if (defined __GNUC__                                               \
      && (2 < __GNUC__ || (__GNUC__ == 2 && 96 <= __GNUC_MINOR__)))  \
     || defined __SUNPRO_C && 0x5110 <= __SUNPRO_C
#  define YY_ATTRIBUTE(Spec) __attribute__(Spec)
# else
#  define YY_ATTRIBUTE(Spec) /* empty */
# endif
#endif

#ifndef YY_ATTRIBUTE_PURE
# define YY_ATTRIBUTE_PURE   YY_ATTRIBUTE ((__pure__))
#endif

#ifndef YY_ATTRIBUTE_UNUSED
# define YY_ATTRIBUTE_UNUSED YY_ATTRIBUTE ((__unused__))
#endif

#if !defined _Noreturn \
     && (!defined __STDC_VERSION__ || __STDC_VERSION__ < 201112)
# if defined _MSC_VER && 1200 <= _MSC_VER
#  define _Noreturn __declspec (noreturn)
# else
#  define _Noreturn YY_ATTRIBUTE ((__noreturn__))
# endif
#endif

/* Suppress unused-variable warnings by "using" E.  */
#if ! defined lint || defined __GNUC__
# define YYUSE(E) ((void) (E))
#else
# define YYUSE(E) /* empty */
#endif

#if defined __GNUC__ && 407 <= __GNUC__ * 100 + __GNUC_MINOR__
/* Suppress an incorrect diagnostic about yylval being uninitialized.  */
# define YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN \
    _Pragma ("GCC diagnostic push") \
    _Pragma ("GCC diagnostic ignored \"-Wuninitialized\"")\
    _Pragma ("GCC diagnostic ignored \"-Wmaybe-uninitialized\"")
# define YY_IGNORE_MAYBE_UNINITIALIZED_END \
    _Pragma ("GCC diagnostic pop")
#else
# define YY_INITIAL_VALUE(Value) Value
#endif
#ifndef YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN
# define YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN
# define YY_IGNORE_MAYBE_UNINITIALIZED_END
#endif
#ifndef YY_INITIAL_VALUE
# define YY_INITIAL_VALUE(Value) /* Nothing. */
#endif


#if ! defined yyoverflow || YYERROR_VERBOSE

/* The parser invokes alloca or malloc; define the necessary symbols.  */

# ifdef YYSTACK_USE_ALLOCA
#  if YYSTACK_USE_ALLOCA
#   ifdef __GNUC__
#    define YYSTACK_ALLOC __builtin_alloca
#   elif defined __BUILTIN_VA_ARG_INCR
#    include <alloca.h> /* INFRINGES ON USER NAME SPACE */
#   elif defined _AIX
#    define YYSTACK_ALLOC __alloca
#   elif defined _MSC_VER
#    include <malloc.h> /* INFRINGES ON USER NAME SPACE */
#    define alloca _alloca
#   else
#    define YYSTACK_ALLOC alloca
#    if ! defined _ALLOCA_H && ! defined EXIT_SUCCESS
#     include <stdlib.h> /* INFRINGES ON USER NAME SPACE */
      /* Use EXIT_SUCCESS as a witness for stdlib.h.  */
#     ifndef EXIT_SUCCESS
#      define EXIT_SUCCESS 0
#     endif
#    endif
#   endif
#  endif
# endif

# ifdef YYSTACK_ALLOC
   /* Pacify GCC's 'empty if-body' warning.  */
#  define YYSTACK_FREE(Ptr) do { /* empty */; } while (0)
#  ifndef YYSTACK_ALLOC_MAXIMUM
    /* The OS might guarantee only one guard page at the bottom of the stack,
       and a page size can be as small as 4096 bytes.  So we cannot safely
       invoke alloca (N) if N exceeds 4096.  Use a slightly smaller number
       to allow for a few compiler-allocated temporary stack slots.  */
#   define YYSTACK_ALLOC_MAXIMUM 4032 /* reasonable circa 2006 */
#  endif
# else
#  define YYSTACK_ALLOC YYMALLOC
#  define YYSTACK_FREE YYFREE
#  ifndef YYSTACK_ALLOC_MAXIMUM
#   define YYSTACK_ALLOC_MAXIMUM YYSIZE_MAXIMUM
#  endif
#  if (defined __cplusplus && ! defined EXIT_SUCCESS \
       && ! ((defined YYMALLOC || defined malloc) \
             && (defined YYFREE || defined free)))
#   include <stdlib.h> /* INFRINGES ON USER NAME SPACE */
#   ifndef EXIT_SUCCESS
#    define EXIT_SUCCESS 0
#   endif
#  endif
#  ifndef YYMALLOC
#   define YYMALLOC malloc
#   if ! defined malloc && ! defined EXIT_SUCCESS
void *malloc (YYSIZE_T); /* INFRINGES ON USER NAME SPACE */
#   endif
#  endif
#  ifndef YYFREE
#   define YYFREE free
#   if ! defined free && ! defined EXIT_SUCCESS
void free (void *); /* INFRINGES ON USER NAME SPACE */
#   endif
#  endif
# endif
#endif /* ! defined yyoverflow || YYERROR_VERBOSE */


#if (! defined yyoverflow \
     && (! defined __cplusplus \
         || (defined YYSTYPE_IS_TRIVIAL && YYSTYPE_IS_TRIVIAL)))

/* A type that is properly aligned for any stack member.  */
union yyalloc
{
  yytype_int16 yyss_alloc;
  YYSTYPE yyvs_alloc;
};

/* The size of the maximum gap between one aligned stack and the next.  */
# define YYSTACK_GAP_MAXIMUM (sizeof (union yyalloc) - 1)

/* The size of an array large to enough to hold all stacks, each with
   N elements.  */
# define YYSTACK_BYTES(N) \
     ((N) * (sizeof (yytype_int16) + sizeof (YYSTYPE)) \
      + YYSTACK_GAP_MAXIMUM)

# define YYCOPY_NEEDED 1

/* Relocate STACK from its old location to the new one.  The
   local variables YYSIZE and YYSTACKSIZE give the old and new number of
   elements in the stack, and YYPTR gives the new location of the
   stack.  Advance YYPTR to a properly aligned location for the next
   stack.  */
# define YYSTACK_RELOCATE(Stack_alloc, Stack)                           \
    do                                                                  \
      {                                                                 \
        YYSIZE_T yynewbytes;                                            \
        YYCOPY (&yyptr->Stack_alloc, Stack, yysize);                    \
        Stack = &yyptr->Stack_alloc;                                    \
        yynewbytes = yystacksize * sizeof (*Stack) + YYSTACK_GAP_MAXIMUM; \
        yyptr += yynewbytes / sizeof (*yyptr);                          \
      }                                                                 \
    while (0)

#endif

#if defined YYCOPY_NEEDED && YYCOPY_NEEDED
/* Copy COUNT objects from SRC to DST.  The source and destination do
   not overlap.  */
# ifndef YYCOPY
#  if defined __GNUC__ && 1 < __GNUC__
#   define YYCOPY(Dst, Src, Count) \
      __builtin_memcpy (Dst, Src, (Count) * sizeof (*(Src)))
#  else
#   define YYCOPY(Dst, Src, Count)              \
      do                                        \
        {                                       \
          YYSIZE_T yyi;                         \
          for (yyi = 0; yyi < (Count); yyi++)   \
            (Dst)[yyi] = (Src)[yyi];            \
        }                                       \
      while (0)
#  endif
# endif
#endif /* !YYCOPY_NEEDED */

/* YYFINAL -- State number of the termination state.  */
#define YYFINAL  4
/* YYLAST -- Last index in YYTABLE.  */
#define YYLAST   441

/* YYNTOKENS -- Number of terminals.  */
#define YYNTOKENS  213
/* YYNNTS -- Number of nonterminals.  */
#define YYNNTS  212
/* YYNRULES -- Number of rules.  */
#define YYNRULES  316
/* YYNSTATES -- Number of states.  */
#define YYNSTATES  631

/* YYTRANSLATE[YYX] -- Symbol number corresponding to YYX as returned
   by yylex, with out-of-bounds checking.  */
#define YYUNDEFTOK  2
#define YYMAXUTOK   467

#define YYTRANSLATE(YYX)                                                \
  ((unsigned int) (YYX) <= YYMAXUTOK ? yytranslate[YYX] : YYUNDEFTOK)

/* YYTRANSLATE[TOKEN-NUM] -- Symbol number corresponding to TOKEN-NUM
   as returned by yylex, without out-of-bounds checking.  */
static const yytype_uint8 yytranslate[] =
{
       0,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     2,     2,     2,     2,
       2,     2,     2,     2,     2,     2,     1,     2,     3,     4,
       5,     6,     7,     8,     9,    10,    11,    12,    13,    14,
      15,    16,    17,    18,    19,    20,    21,    22,    23,    24,
      25,    26,    27,    28,    29,    30,    31,    32,    33,    34,
      35,    36,    37,    38,    39,    40,    41,    42,    43,    44,
      45,    46,    47,    48,    49,    50,    51,    52,    53,    54,
      55,    56,    57,    58,    59,    60,    61,    62,    63,    64,
      65,    66,    67,    68,    69,    70,    71,    72,    73,    74,
      75,    76,    77,    78,    79,    80,    81,    82,    83,    84,
      85,    86,    87,    88,    89,    90,    91,    92,    93,    94,
      95,    96,    97,    98,    99,   100,   101,   102,   103,   104,
     105,   106,   107,   108,   109,   110,   111,   112,   113,   114,
     115,   116,   117,   118,   119,   120,   121,   122,   123,   124,
     125,   126,   127,   128,   129,   130,   131,   132,   133,   134,
     135,   136,   137,   138,   139,   140,   141,   142,   143,   144,
     145,   146,   147,   148,   149,   150,   151,   152,   153,   154,
     155,   156,   157,   158,   159,   160,   161,   162,   163,   164,
     165,   166,   167,   168,   169,   170,   171,   172,   173,   174,
     175,   176,   177,   178,   179,   180,   181,   182,   183,   184,
     185,   186,   187,   188,   189,   190,   191,   192,   193,   194,
     195,   196,   197,   198,   199,   200,   201,   202,   203,   204,
     205,   206,   207,   208,   209,   210,   211,   212
};

#if YYDEBUG
  /* YYRLINE[YYN] -- Source line where rule number YYN was defined.  */
static const yytype_uint8 yyrline[] =
{
       0,    42,    42,    42,    56,    56,    56,    57,    57,    57,
      58,    58,    58,    59,    59,    59,    60,    60,    60,    61,
      61,    61,    62,    62,    62,    63,    63,    63,    64,    64,
      64,    65,    65,    65,    66,    66,    66,    67,    67,    67,
      68,    68,    68,    69,    69,    69,    70,    70,    70,    71,
      71,    71,    72,    72,    72,    73,    73,    73,    74,    74,
      74,    75,    75,    75,    76,    76,    76,    77,    77,    77,
      78,    78,    78,    79,    79,    79,    80,    80,    80,    81,
      81,    81,    82,    82,    82,    83,    83,    83,    84,    84,
      84,    85,    85,    85,    86,    86,    86,    87,    87,    87,
      88,    88,    88,    89,    89,    89,    90,    90,    90,    91,
      91,    91,    92,    92,    92,    93,    93,    93,    94,    94,
      94,    95,    95,    95,    96,    96,    96,    97,    97,    97,
      98,    98,    98,    99,    99,    99,   100,   100,   100,   101,
     101,   101,   102,   102,   102,   103,   103,   103,   104,   104,
     104,   105,   105,   105,   106,   106,   106,   107,   107,   107,
     108,   108,   108,   109,   109,   109,   110,   110,   110,   111,
     111,   111,   112,   112,   112,   113,   113,   113,   114,   114,
     114,   115,   115,   115,   116,   116,   116,   117,   117,   117,
     118,   118,   118,   119,   119,   119,   120,   120,   120,   121,
     121,   121,   122,   122,   122,   123,   123,   123,   124,   124,
     124,   125,   125,   125,   126,   126,   126,   127,   127,   127,
     128,   128,   128,   129,   129,   129,   130,   130,   130,   131,
     131,   131,   132,   132,   132,   133,   133,   133,   134,   134,
     134,   135,   135,   135,   136,   136,   136,   137,   137,   137,
     138,   138,   138,   139,   139,   139,   140,   140,   140,   141,
     141,   141,   142,   142,   142,   143,   143,   143,   144,   144,
     144,   145,   145,   145,   146,   146,   146,   147,   147,   147,
     148,   148,   148,   149,   149,   149,   150,   150,   150,   151,
     151,   151,   152,   152,   152,   153,   153,   153,   154,   154,
     154,   155,   155,   155,   156,   156,   156,   157,   157,   157,
     158,   158,   158,   159,   159,   159,   160
};
#endif

#if YYDEBUG || YYERROR_VERBOSE || 0
/* YYTNAME[SYMBOL-NUM] -- String name of the symbol SYMBOL-NUM.
   First, the terminals, then, starting at YYNTOKENS, nonterminals.  */
static const char *const yytname[] =
{
  "$end", "error", "$undefined", "OUVRANTE_abbr", "FERMANTE_abbr",
  "OUVRANTE_div", "FERMANTE_div", "OUVRANTE_script", "FERMANTE_script",
  "OUVRANTE_a", "FERMANTE_a", "OUVRANTE_acronym", "FERMANTE_acronym",
  "OUVRANTE_address", "FERMANTE_address", "OUVRANTE_applet",
  "FERMANTE_applet", "OUVRANTE_article", "FERMANTE_article",
  "OUVRANTE_aside", "FERMANTE_aside", "OUVRANTE_audio", "FERMANTE_audio",
  "OUVRANTE_b", "FERMANTE_b", "OUVRANTE_bdi", "FERMANTE_bdi",
  "OUVRANTE_bdo", "FERMANTE_bdo", "OUVRANTE_big", "FERMANTE_big",
  "OUVRANTE_blockquote", "FERMANTE_blockquote", "OUVRANTE_body",
  "FERMANTE_body", "OUVRANTE_button", "FERMANTE_button", "OUVRANTE_canvas",
  "FERMANTE_canvas", "OUVRANTE_caption", "FERMANTE_caption",
  "OUVRANTE_center", "FERMANTE_center", "OUVRANTE_cite", "FERMANTE_cite",
  "OUVRANTE_code", "FERMANTE_code", "OUVRANTE_colgroup",
  "FERMANTE_colgroup", "OUVRANTE_data", "FERMANTE_data",
  "OUVRANTE_datalist", "FERMANTE_datalist", "OUVRANTE_dd", "FERMANTE_dd",
  "OUVRANTE_del", "FERMANTE_del", "OUVRANTE_details", "FERMANTE_details",
  "OUVRANTE_dfn", "FERMANTE_dfn", "OUVRANTE_dialog", "FERMANTE_dialog",
  "OUVRANTE_dir", "FERMANTE_dir", "OUVRANTE_dl", "FERMANTE_dl",
  "OUVRANTE_dt", "FERMANTE_dt", "OUVRANTE_em", "FERMANTE_em",
  "OUVRANTE_fieldset", "FERMANTE_fieldset", "OUVRANTE_figcaption",
  "FERMANTE_figcaption", "OUVRANTE_figure", "FERMANTE_figure",
  "OUVRANTE_font", "FERMANTE_font", "OUVRANTE_footer", "FERMANTE_footer",
  "OUVRANTE_form", "FERMANTE_form", "OUVRANTE_h1", "FERMANTE_h1",
  "OUVRANTE_h2", "FERMANTE_h2", "OUVRANTE_h3", "FERMANTE_h3",
  "OUVRANTE_h4", "FERMANTE_h4", "OUVRANTE_h5", "FERMANTE_h5",
  "OUVRANTE_h6", "FERMANTE_h6", "OUVRANTE_head", "FERMANTE_head",
  "OUVRANTE_header", "FERMANTE_header", "OUVRANTE_html", "FERMANTE_html",
  "OUVRANTE_i", "FERMANTE_i", "OUVRANTE_iframe", "FERMANTE_iframe",
  "OUVRANTE_ins", "FERMANTE_ins", "OUVRANTE_kbd", "FERMANTE_kbd",
  "OUVRANTE_label", "FERMANTE_label", "OUVRANTE_legend", "FERMANTE_legend",
  "OUVRANTE_li", "FERMANTE_li", "OUVRANTE_main", "FERMANTE_main",
  "OUVRANTE_mark", "FERMANTE_mark", "OUVRANTE_meter", "FERMANTE_meter",
  "OUVRANTE_nav", "FERMANTE_nav", "OUVRANTE_noframes", "FERMANTE_noframes",
  "OUVRANTE_noscript", "FERMANTE_noscript", "OUVRANTE_object",
  "FERMANTE_object", "OUVRANTE_ol", "FERMANTE_ol", "OUVRANTE_optgroup",
  "FERMANTE_optgroup", "OUVRANTE_option", "FERMANTE_option",
  "OUVRANTE_output", "FERMANTE_output", "OUVRANTE_p", "FERMANTE_p",
  "OUVRANTE_picture", "FERMANTE_picture", "OUVRANTE_pre", "FERMANTE_pre",
  "OUVRANTE_progress", "FERMANTE_progress", "OUVRANTE_q", "FERMANTE_q",
  "OUVRANTE_rp", "FERMANTE_rp", "OUVRANTE_rt", "FERMANTE_rt",
  "OUVRANTE_ruby", "FERMANTE_ruby", "OUVRANTE_s", "FERMANTE_s",
  "OUVRANTE_samp", "FERMANTE_samp", "OUVRANTE_section", "FERMANTE_section",
  "OUVRANTE_select", "FERMANTE_select", "OUVRANTE_small", "FERMANTE_small",
  "OUVRANTE_span", "FERMANTE_span", "OUVRANTE_strike", "FERMANTE_strike",
  "OUVRANTE_strong", "FERMANTE_strong", "OUVRANTE_style", "FERMANTE_style",
  "OUVRANTE_sub", "FERMANTE_sub", "OUVRANTE_summary", "FERMANTE_summary",
  "OUVRANTE_sup", "FERMANTE_sup", "OUVRANTE_svg", "FERMANTE_svg",
  "OUVRANTE_table", "FERMANTE_table", "OUVRANTE_tbody", "FERMANTE_tbody",
  "OUVRANTE_td", "FERMANTE_td", "OUVRANTE_template", "FERMANTE_template",
  "OUVRANTE_textarea", "FERMANTE_textarea", "OUVRANTE_tfoot",
  "FERMANTE_tfoot", "OUVRANTE_th", "FERMANTE_th", "OUVRANTE_thead",
  "FERMANTE_thead", "OUVRANTE_time", "FERMANTE_time", "OUVRANTE_title",
  "FERMANTE_title", "OUVRANTE_tr", "FERMANTE_tr", "OUVRANTE_tt",
  "FERMANTE_tt", "OUVRANTE_u", "FERMANTE_u", "OUVRANTE_ul", "FERMANTE_ul",
  "OUVRANTE_var", "FERMANTE_var", "OUVRANTE_video", "FERMANTE_video",
  "OUVRANTE_wbr", "FERMANTE_wbr", "$accept", "AXIOME", "$@1", "BALISES",
  "$@2", "$@3", "$@4", "$@5", "$@6", "$@7", "$@8", "$@9", "$@10", "$@11",
  "$@12", "$@13", "$@14", "$@15", "$@16", "$@17", "$@18", "$@19", "$@20",
  "$@21", "$@22", "$@23", "$@24", "$@25", "$@26", "$@27", "$@28", "$@29",
  "$@30", "$@31", "$@32", "$@33", "$@34", "$@35", "$@36", "$@37", "$@38",
  "$@39", "$@40", "$@41", "$@42", "$@43", "$@44", "$@45", "$@46", "$@47",
  "$@48", "$@49", "$@50", "$@51", "$@52", "$@53", "$@54", "$@55", "$@56",
  "$@57", "$@58", "$@59", "$@60", "$@61", "$@62", "$@63", "$@64", "$@65",
  "$@66", "$@67", "$@68", "$@69", "$@70", "$@71", "$@72", "$@73", "$@74",
  "$@75", "$@76", "$@77", "$@78", "$@79", "$@80", "$@81", "$@82", "$@83",
  "$@84", "$@85", "$@86", "$@87", "$@88", "$@89", "$@90", "$@91", "$@92",
  "$@93", "$@94", "$@95", "$@96", "$@97", "$@98", "$@99", "$@100", "$@101",
  "$@102", "$@103", "$@104", "$@105", "$@106", "$@107", "$@108", "$@109",
  "$@110", "$@111", "$@112", "$@113", "$@114", "$@115", "$@116", "$@117",
  "$@118", "$@119", "$@120", "$@121", "$@122", "$@123", "$@124", "$@125",
  "$@126", "$@127", "$@128", "$@129", "$@130", "$@131", "$@132", "$@133",
  "$@134", "$@135", "$@136", "$@137", "$@138", "$@139", "$@140", "$@141",
  "$@142", "$@143", "$@144", "$@145", "$@146", "$@147", "$@148", "$@149",
  "$@150", "$@151", "$@152", "$@153", "$@154", "$@155", "$@156", "$@157",
  "$@158", "$@159", "$@160", "$@161", "$@162", "$@163", "$@164", "$@165",
  "$@166", "$@167", "$@168", "$@169", "$@170", "$@171", "$@172", "$@173",
  "$@174", "$@175", "$@176", "$@177", "$@178", "$@179", "$@180", "$@181",
  "$@182", "$@183", "$@184", "$@185", "$@186", "$@187", "$@188", "$@189",
  "$@190", "$@191", "$@192", "$@193", "$@194", "$@195", "$@196", "$@197",
  "$@198", "$@199", "$@200", "$@201", "$@202", "$@203", "$@204", "$@205",
  "$@206", "$@207", "$@208", "$@209", YY_NULLPTR
};
#endif

# ifdef YYPRINT
/* YYTOKNUM[NUM] -- (External) token number corresponding to the
   (internal) symbol number NUM (which must be that of a token).  */
static const yytype_uint16 yytoknum[] =
{
       0,   256,   257,   258,   259,   260,   261,   262,   263,   264,
     265,   266,   267,   268,   269,   270,   271,   272,   273,   274,
     275,   276,   277,   278,   279,   280,   281,   282,   283,   284,
     285,   286,   287,   288,   289,   290,   291,   292,   293,   294,
     295,   296,   297,   298,   299,   300,   301,   302,   303,   304,
     305,   306,   307,   308,   309,   310,   311,   312,   313,   314,
     315,   316,   317,   318,   319,   320,   321,   322,   323,   324,
     325,   326,   327,   328,   329,   330,   331,   332,   333,   334,
     335,   336,   337,   338,   339,   340,   341,   342,   343,   344,
     345,   346,   347,   348,   349,   350,   351,   352,   353,   354,
     355,   356,   357,   358,   359,   360,   361,   362,   363,   364,
     365,   366,   367,   368,   369,   370,   371,   372,   373,   374,
     375,   376,   377,   378,   379,   380,   381,   382,   383,   384,
     385,   386,   387,   388,   389,   390,   391,   392,   393,   394,
     395,   396,   397,   398,   399,   400,   401,   402,   403,   404,
     405,   406,   407,   408,   409,   410,   411,   412,   413,   414,
     415,   416,   417,   418,   419,   420,   421,   422,   423,   424,
     425,   426,   427,   428,   429,   430,   431,   432,   433,   434,
     435,   436,   437,   438,   439,   440,   441,   442,   443,   444,
     445,   446,   447,   448,   449,   450,   451,   452,   453,   454,
     455,   456,   457,   458,   459,   460,   461,   462,   463,   464,
     465,   466,   467
};
# endif

#define YYPACT_NINF -111

#define yypact_value_is_default(Yystate) \
  (!!((Yystate) == (-111)))

#define YYTABLE_NINF -1

#define yytable_value_is_error(Yytable_value) \
  0

  /* YYPACT[STATE-NUM] -- Index in YYTABLE of the portion describing
     STATE-NUM.  */
static const yytype_int16 yypact[] =
{
       6,  -111,   107,   101,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,     9,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,  -111,   109,   105,   111,   113,   103,
     115,   117,    99,   119,   121,    97,   123,   125,    95,   127,
      93,   129,   131,    91,   133,   135,    89,   137,    87,   139,
     141,    85,   142,   143,    83,   145,    81,   147,   149,    79,
     151,   153,    77,   155,    75,   157,   159,    73,   161,    71,
     163,   165,    69,   167,    67,   169,    65,   171,   173,    63,
     175,   177,    61,   179,    59,   181,   183,    57,   285,    55,
     282,   281,    53,   278,   277,    51,   274,    49,   271,    47,
     268,   267,    45,   264,    43,   261,   260,    41,   257,    39,
     254,   253,    37,   250,   249,    35,   246,    33,   243,   242,
      31,   239,   238,    29,   235,    27,   232,   231,    25,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,   101,   101,   101,
     101,   101,   101,   101,   101,   101,   101,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111
};

  /* YYDEFACT[STATE-NUM] -- Default reduction number in state STATE-NUM.
     Performed when YYTABLE does not specify something else to do.  Zero
     means the default is an error.  */
static const yytype_uint16 yydefact[] =
{
       0,     2,     0,   316,     1,     4,    34,   313,     7,    10,
      13,    16,    19,    22,    25,    28,    31,    37,    40,    43,
      46,    49,    52,    55,    58,    61,    64,    67,    70,    73,
      76,    79,    82,    85,    88,    91,    94,    97,   100,   103,
     106,   109,   112,   115,   118,   121,   124,   127,   130,   133,
     136,   139,   142,   145,   148,   151,   154,   157,   160,   163,
     166,   169,   172,   175,   178,   181,   184,   187,   190,   193,
     196,   199,   202,   205,   208,   211,   214,   217,   220,   223,
     226,   229,   232,   235,   238,   241,   244,   247,   250,   253,
     256,   259,   262,   265,   268,   271,   274,   277,   280,   283,
     286,   289,   292,   295,   298,   301,   304,   307,   310,     0,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,     3,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     0,
       0,     0,     0,     0,     0,     0,     0,     0,     0,     5,
      35,   314,     8,    11,    14,    17,    20,    23,    26,    29,
      32,    38,    41,    44,    47,    50,    53,    56,    59,    62,
      65,    68,    71,    74,    77,    80,    83,    86,    89,    92,
      95,    98,   101,   104,   107,   110,   113,   116,   119,   122,
     125,   128,   131,   134,   137,   140,   143,   146,   149,   152,
     155,   158,   161,   164,   167,   170,   173,   176,   179,   182,
     185,   188,   191,   194,   197,   200,   203,   206,   209,   212,
     215,   218,   221,   224,   227,   230,   233,   236,   239,   242,
     245,   248,   251,   254,   257,   260,   263,   266,   269,   272,
     275,   278,   281,   284,   287,   290,   293,   296,   299,   302,
     305,   308,   311,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,   316,   316,   316,
     316,   316,   316,   316,   316,   316,   316,     6,    36,   315,
       9,    12,    15,    18,    21,    24,    27,    30,    33,    39,
      42,    45,    48,    51,    54,    57,    60,    63,    66,    69,
      72,    75,    78,    81,    84,    87,    90,    93,    96,    99,
     102,   105,   108,   111,   114,   117,   120,   123,   126,   129,
     132,   135,   138,   141,   144,   147,   150,   153,   156,   159,
     162,   165,   168,   171,   174,   177,   180,   183,   186,   189,
     192,   195,   198,   201,   204,   207,   210,   213,   216,   219,
     222,   225,   228,   231,   234,   237,   240,   243,   246,   249,
     252,   255,   258,   261,   264,   267,   270,   273,   276,   279,
     282,   285,   288,   291,   294,   297,   300,   303,   306,   309,
     312
};

  /* YYPGOTO[NTERM-NUM].  */
static const yytype_int8 yypgoto[] =
{
    -111,  -111,  -111,  -110,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,  -111,
    -111,  -111
};

  /* YYDEFGOTO[NTERM-NUM].  */
static const yytype_int16 yydefgoto[] =
{
      -1,     2,     3,   109,   110,   423,   113,   426,   114,   427,
     115,   428,   116,   429,   117,   430,   118,   431,   119,   432,
     120,   433,   121,   434,   111,   424,   122,   435,   123,   436,
     124,   437,   125,   438,   126,   439,   127,   440,   128,   441,
     129,   442,   130,   443,   131,   444,   132,   445,   133,   446,
     134,   447,   135,   448,   136,   449,   137,   450,   138,   451,
     139,   452,   140,   453,   141,   454,   142,   455,   143,   456,
     144,   457,   145,   458,   146,   459,   147,   460,   148,   461,
     149,   462,   150,   463,   151,   464,   152,   465,   153,   466,
     154,   467,   155,   468,   156,   469,   157,   470,   158,   471,
     159,   472,   160,   473,   161,   474,   162,   475,   163,   476,
     164,   477,   165,   478,   166,   479,   167,   480,   168,   481,
     169,   482,   170,   483,   171,   484,   172,   485,   173,   486,
     174,   487,   175,   488,   176,   489,   177,   490,   178,   491,
     179,   492,   180,   493,   181,   494,   182,   495,   183,   496,
     184,   497,   185,   498,   186,   499,   187,   500,   188,   501,
     189,   502,   190,   503,   191,   504,   192,   505,   193,   506,
     194,   507,   195,   508,   196,   509,   197,   510,   198,   511,
     199,   512,   200,   513,   201,   514,   202,   515,   203,   516,
     204,   517,   205,   518,   206,   519,   207,   520,   208,   521,
     209,   522,   210,   523,   211,   524,   212,   525,   213,   526,
     112,   425
};

  /* YYTABLE[YYPACT[STATE-NUM]] -- What to do in state STATE-NUM.  If
     positive, shift that token.  If negative, reduce the rule whose
     number is the opposite.  If YYTABLE_NINF, syntax error.  */
static const yytype_uint16 yytable[] =
{
     215,   216,   217,   218,   219,   220,   221,   222,   223,   224,
     225,   226,   227,   228,   229,   230,   231,   232,   233,   234,
     235,   236,   237,   238,   239,   240,   241,   242,   243,   244,
     245,   246,   247,   248,   249,   250,   251,   252,   253,   254,
     255,   256,   257,   258,   259,   260,   261,   262,   263,   264,
     265,   266,   267,   268,   269,   270,   271,   272,   273,   274,
     275,   276,   277,   278,   279,   280,   281,   282,   283,   284,
     285,   286,   287,   288,   289,   290,   291,   292,   293,   294,
     295,   296,   297,   298,   299,   300,   301,   302,   303,   304,
     305,   306,   307,   308,   309,   310,   311,   312,   313,   314,
     315,   316,   317,   318,     5,     1,     6,     4,     7,   214,
       8,   320,     9,   319,    10,   323,    11,   326,    12,   321,
      13,   329,    14,   322,    15,   332,    16,   334,    17,   324,
      18,   337,    19,   325,    20,   340,    21,   342,    22,   327,
      23,   345,    24,   328,    25,   348,    26,   350,    27,   330,
      28,   353,    29,   331,    30,   356,    31,   358,    32,   333,
      33,   361,    34,   363,    35,   335,    36,   366,    37,   336,
      38,   368,    39,   370,    40,   338,    41,   373,    42,   339,
      43,   376,    44,   378,    45,   341,    46,   381,    47,   383,
      48,   343,    49,   386,    50,   344,    51,   389,    52,   391,
     346,   393,    53,   347,    54,   396,    55,   398,    56,   349,
      57,   401,    58,   403,    59,   351,    60,   406,    61,   352,
      62,   409,    63,   411,    64,   354,    65,   414,    66,   355,
      67,   417,    68,   419,    69,   357,    70,   422,    71,     0,
      72,   359,    73,     0,    74,   360,    75,     0,    76,     0,
      77,   362,    78,     0,    79,     0,    80,   364,    81,     0,
      82,   365,    83,     0,    84,     0,    85,     0,    86,   367,
      87,     0,    88,     0,    89,   369,    90,     0,    91,     0,
      92,   371,    93,     0,    94,   372,    95,     0,    96,     0,
      97,   374,    98,     0,    99,   375,   100,     0,   101,     0,
     102,   377,   103,     0,   104,     0,   105,   379,   106,     0,
     107,   380,   108,   527,   528,   529,   530,   531,   532,   533,
     534,   535,   536,   537,   538,   539,   540,   541,   542,   543,
     544,   545,   546,   547,   548,   549,   550,   551,   552,   553,
     554,   555,   556,   557,   558,   559,   560,   561,   562,   563,
     564,   565,   566,   567,   568,   569,   570,   571,   572,   573,
     574,   575,   576,   577,   578,   579,   580,   581,   582,   583,
     584,   585,   586,   587,   588,   589,   590,   591,   592,   593,
     594,   595,   596,   597,   598,   599,   600,   601,   602,   603,
     604,   605,   606,   607,   608,   609,   610,   611,   612,   613,
     614,   615,   616,   617,   618,   619,   620,   621,   622,   623,
     624,   625,   626,   627,   628,   629,   630,   382,   384,   385,
     387,   388,   390,   392,   394,   395,   397,   399,   400,   402,
     404,   405,   407,   408,   410,   412,   413,   415,   416,   418,
     420,   421
};

static const yytype_int16 yycheck[] =
{
     110,   111,   112,   113,   114,   115,   116,   117,   118,   119,
     120,   121,   122,   123,   124,   125,   126,   127,   128,   129,
     130,   131,   132,   133,   134,   135,   136,   137,   138,   139,
     140,   141,   142,   143,   144,   145,   146,   147,   148,   149,
     150,   151,   152,   153,   154,   155,   156,   157,   158,   159,
     160,   161,   162,   163,   164,   165,   166,   167,   168,   169,
     170,   171,   172,   173,   174,   175,   176,   177,   178,   179,
     180,   181,   182,   183,   184,   185,   186,   187,   188,   189,
     190,   191,   192,   193,   194,   195,   196,   197,   198,   199,
     200,   201,   202,   203,   204,   205,   206,   207,   208,   209,
     210,   211,   212,   213,     3,    99,     5,     0,     7,   100,
       9,     6,    11,     4,    13,    12,    15,    18,    17,     8,
      19,    24,    21,    10,    23,    30,    25,    34,    27,    14,
      29,    40,    31,    16,    33,    46,    35,    50,    37,    20,
      39,    56,    41,    22,    43,    62,    45,    66,    47,    26,
      49,    72,    51,    28,    53,    78,    55,    82,    57,    32,
      59,    88,    61,    92,    63,    36,    65,    98,    67,    38,
      69,   104,    71,   108,    73,    42,    75,   114,    77,    44,
      79,   120,    81,   124,    83,    48,    85,   130,    87,   134,
      89,    52,    91,   140,    93,    54,    95,   146,    97,   150,
      58,   154,   101,    60,   103,   160,   105,   164,   107,    64,
     109,   170,   111,   174,   113,    68,   115,   180,   117,    70,
     119,   186,   121,   190,   123,    74,   125,   196,   127,    76,
     129,   202,   131,   206,   133,    80,   135,   212,   137,    -1,
     139,    84,   141,    -1,   143,    86,   145,    -1,   147,    -1,
     149,    90,   151,    -1,   153,    -1,   155,    94,   157,    -1,
     159,    96,   161,    -1,   163,    -1,   165,    -1,   167,   102,
     169,    -1,   171,    -1,   173,   106,   175,    -1,   177,    -1,
     179,   110,   181,    -1,   183,   112,   185,    -1,   187,    -1,
     189,   116,   191,    -1,   193,   118,   195,    -1,   197,    -1,
     199,   122,   201,    -1,   203,    -1,   205,   126,   207,    -1,
     209,   128,   211,   423,   424,   425,   426,   427,   428,   429,
     430,   431,   432,   433,   434,   435,   436,   437,   438,   439,
     440,   441,   442,   443,   444,   445,   446,   447,   448,   449,
     450,   451,   452,   453,   454,   455,   456,   457,   458,   459,
     460,   461,   462,   463,   464,   465,   466,   467,   468,   469,
     470,   471,   472,   473,   474,   475,   476,   477,   478,   479,
     480,   481,   482,   483,   484,   485,   486,   487,   488,   489,
     490,   491,   492,   493,   494,   495,   496,   497,   498,   499,
     500,   501,   502,   503,   504,   505,   506,   507,   508,   509,
     510,   511,   512,   513,   514,   515,   516,   517,   518,   519,
     520,   521,   522,   523,   524,   525,   526,   132,   136,   138,
     142,   144,   148,   152,   156,   158,   162,   166,   168,   172,
     176,   178,   182,   184,   188,   192,   194,   198,   200,   204,
     208,   210
};

  /* YYSTOS[STATE-NUM] -- The (internal number of the) accessing
     symbol of state STATE-NUM.  */
static const yytype_uint16 yystos[] =
{
       0,    99,   214,   215,     0,     3,     5,     7,     9,    11,
      13,    15,    17,    19,    21,    23,    25,    27,    29,    31,
      33,    35,    37,    39,    41,    43,    45,    47,    49,    51,
      53,    55,    57,    59,    61,    63,    65,    67,    69,    71,
      73,    75,    77,    79,    81,    83,    85,    87,    89,    91,
      93,    95,    97,   101,   103,   105,   107,   109,   111,   113,
     115,   117,   119,   121,   123,   125,   127,   129,   131,   133,
     135,   137,   139,   141,   143,   145,   147,   149,   151,   153,
     155,   157,   159,   161,   163,   165,   167,   169,   171,   173,
     175,   177,   179,   181,   183,   185,   187,   189,   191,   193,
     195,   197,   199,   201,   203,   205,   207,   209,   211,   216,
     217,   237,   423,   219,   221,   223,   225,   227,   229,   231,
     233,   235,   239,   241,   243,   245,   247,   249,   251,   253,
     255,   257,   259,   261,   263,   265,   267,   269,   271,   273,
     275,   277,   279,   281,   283,   285,   287,   289,   291,   293,
     295,   297,   299,   301,   303,   305,   307,   309,   311,   313,
     315,   317,   319,   321,   323,   325,   327,   329,   331,   333,
     335,   337,   339,   341,   343,   345,   347,   349,   351,   353,
     355,   357,   359,   361,   363,   365,   367,   369,   371,   373,
     375,   377,   379,   381,   383,   385,   387,   389,   391,   393,
     395,   397,   399,   401,   403,   405,   407,   409,   411,   413,
     415,   417,   419,   421,   100,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,     4,
       6,     8,    10,    12,    14,    16,    18,    20,    22,    24,
      26,    28,    30,    32,    34,    36,    38,    40,    42,    44,
      46,    48,    50,    52,    54,    56,    58,    60,    62,    64,
      66,    68,    70,    72,    74,    76,    78,    80,    82,    84,
      86,    88,    90,    92,    94,    96,    98,   102,   104,   106,
     108,   110,   112,   114,   116,   118,   120,   122,   124,   126,
     128,   130,   132,   134,   136,   138,   140,   142,   144,   146,
     148,   150,   152,   154,   156,   158,   160,   162,   164,   166,
     168,   170,   172,   174,   176,   178,   180,   182,   184,   186,
     188,   190,   192,   194,   196,   198,   200,   202,   204,   206,
     208,   210,   212,   218,   238,   424,   220,   222,   224,   226,
     228,   230,   232,   234,   236,   240,   242,   244,   246,   248,
     250,   252,   254,   256,   258,   260,   262,   264,   266,   268,
     270,   272,   274,   276,   278,   280,   282,   284,   286,   288,
     290,   292,   294,   296,   298,   300,   302,   304,   306,   308,
     310,   312,   314,   316,   318,   320,   322,   324,   326,   328,
     330,   332,   334,   336,   338,   340,   342,   344,   346,   348,
     350,   352,   354,   356,   358,   360,   362,   364,   366,   368,
     370,   372,   374,   376,   378,   380,   382,   384,   386,   388,
     390,   392,   394,   396,   398,   400,   402,   404,   406,   408,
     410,   412,   414,   416,   418,   420,   422,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216,   216,   216,   216,   216,   216,   216,   216,   216,   216,
     216
};

  /* YYR1[YYN] -- Symbol number of symbol that rule YYN derives.  */
static const yytype_uint16 yyr1[] =
{
       0,   213,   215,   214,   217,   218,   216,   219,   220,   216,
     221,   222,   216,   223,   224,   216,   225,   226,   216,   227,
     228,   216,   229,   230,   216,   231,   232,   216,   233,   234,
     216,   235,   236,   216,   237,   238,   216,   239,   240,   216,
     241,   242,   216,   243,   244,   216,   245,   246,   216,   247,
     248,   216,   249,   250,   216,   251,   252,   216,   253,   254,
     216,   255,   256,   216,   257,   258,   216,   259,   260,   216,
     261,   262,   216,   263,   264,   216,   265,   266,   216,   267,
     268,   216,   269,   270,   216,   271,   272,   216,   273,   274,
     216,   275,   276,   216,   277,   278,   216,   279,   280,   216,
     281,   282,   216,   283,   284,   216,   285,   286,   216,   287,
     288,   216,   289,   290,   216,   291,   292,   216,   293,   294,
     216,   295,   296,   216,   297,   298,   216,   299,   300,   216,
     301,   302,   216,   303,   304,   216,   305,   306,   216,   307,
     308,   216,   309,   310,   216,   311,   312,   216,   313,   314,
     216,   315,   316,   216,   317,   318,   216,   319,   320,   216,
     321,   322,   216,   323,   324,   216,   325,   326,   216,   327,
     328,   216,   329,   330,   216,   331,   332,   216,   333,   334,
     216,   335,   336,   216,   337,   338,   216,   339,   340,   216,
     341,   342,   216,   343,   344,   216,   345,   346,   216,   347,
     348,   216,   349,   350,   216,   351,   352,   216,   353,   354,
     216,   355,   356,   216,   357,   358,   216,   359,   360,   216,
     361,   362,   216,   363,   364,   216,   365,   366,   216,   367,
     368,   216,   369,   370,   216,   371,   372,   216,   373,   374,
     216,   375,   376,   216,   377,   378,   216,   379,   380,   216,
     381,   382,   216,   383,   384,   216,   385,   386,   216,   387,
     388,   216,   389,   390,   216,   391,   392,   216,   393,   394,
     216,   395,   396,   216,   397,   398,   216,   399,   400,   216,
     401,   402,   216,   403,   404,   216,   405,   406,   216,   407,
     408,   216,   409,   410,   216,   411,   412,   216,   413,   414,
     216,   415,   416,   216,   417,   418,   216,   419,   420,   216,
     421,   422,   216,   423,   424,   216,   216
};

  /* YYR2[YYN] -- Number of symbols on the right hand side of rule YYN.  */
static const yytype_uint8 yyr2[] =
{
       0,     2,     0,     4,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0,     0,     6,     0,
       0,     6,     0,     0,     6,     0,     0,     6,     0,     0,
       6,     0,     0,     6,     0,     0,     6,     0,     0,     6,
       0,     0,     6,     0,     0,     6,     0
};


#define yyerrok         (yyerrstatus = 0)
#define yyclearin       (yychar = YYEMPTY)
#define YYEMPTY         (-2)
#define YYEOF           0

#define YYACCEPT        goto yyacceptlab
#define YYABORT         goto yyabortlab
#define YYERROR         goto yyerrorlab


#define YYRECOVERING()  (!!yyerrstatus)

#define YYBACKUP(Token, Value)                                  \
do                                                              \
  if (yychar == YYEMPTY)                                        \
    {                                                           \
      yychar = (Token);                                         \
      yylval = (Value);                                         \
      YYPOPSTACK (yylen);                                       \
      yystate = *yyssp;                                         \
      goto yybackup;                                            \
    }                                                           \
  else                                                          \
    {                                                           \
      yyerror (YY_("syntax error: cannot back up")); \
      YYERROR;                                                  \
    }                                                           \
while (0)

/* Error token number */
#define YYTERROR        1
#define YYERRCODE       256



/* Enable debugging if requested.  */
#if YYDEBUG

# ifndef YYFPRINTF
#  include <stdio.h> /* INFRINGES ON USER NAME SPACE */
#  define YYFPRINTF fprintf
# endif

# define YYDPRINTF(Args)                        \
do {                                            \
  if (yydebug)                                  \
    YYFPRINTF Args;                             \
} while (0)

/* This macro is provided for backward compatibility. */
#ifndef YY_LOCATION_PRINT
# define YY_LOCATION_PRINT(File, Loc) ((void) 0)
#endif


# define YY_SYMBOL_PRINT(Title, Type, Value, Location)                    \
do {                                                                      \
  if (yydebug)                                                            \
    {                                                                     \
      YYFPRINTF (stderr, "%s ", Title);                                   \
      yy_symbol_print (stderr,                                            \
                  Type, Value); \
      YYFPRINTF (stderr, "\n");                                           \
    }                                                                     \
} while (0)


/*----------------------------------------.
| Print this symbol's value on YYOUTPUT.  |
`----------------------------------------*/

static void
yy_symbol_value_print (FILE *yyoutput, int yytype, YYSTYPE const * const yyvaluep)
{
  FILE *yyo = yyoutput;
  YYUSE (yyo);
  if (!yyvaluep)
    return;
# ifdef YYPRINT
  if (yytype < YYNTOKENS)
    YYPRINT (yyoutput, yytoknum[yytype], *yyvaluep);
# endif
  YYUSE (yytype);
}


/*--------------------------------.
| Print this symbol on YYOUTPUT.  |
`--------------------------------*/

static void
yy_symbol_print (FILE *yyoutput, int yytype, YYSTYPE const * const yyvaluep)
{
  YYFPRINTF (yyoutput, "%s %s (",
             yytype < YYNTOKENS ? "token" : "nterm", yytname[yytype]);

  yy_symbol_value_print (yyoutput, yytype, yyvaluep);
  YYFPRINTF (yyoutput, ")");
}

/*------------------------------------------------------------------.
| yy_stack_print -- Print the state stack from its BOTTOM up to its |
| TOP (included).                                                   |
`------------------------------------------------------------------*/

static void
yy_stack_print (yytype_int16 *yybottom, yytype_int16 *yytop)
{
  YYFPRINTF (stderr, "Stack now");
  for (; yybottom <= yytop; yybottom++)
    {
      int yybot = *yybottom;
      YYFPRINTF (stderr, " %d", yybot);
    }
  YYFPRINTF (stderr, "\n");
}

# define YY_STACK_PRINT(Bottom, Top)                            \
do {                                                            \
  if (yydebug)                                                  \
    yy_stack_print ((Bottom), (Top));                           \
} while (0)


/*------------------------------------------------.
| Report that the YYRULE is going to be reduced.  |
`------------------------------------------------*/

static void
yy_reduce_print (yytype_int16 *yyssp, YYSTYPE *yyvsp, int yyrule)
{
  unsigned long int yylno = yyrline[yyrule];
  int yynrhs = yyr2[yyrule];
  int yyi;
  YYFPRINTF (stderr, "Reducing stack by rule %d (line %lu):\n",
             yyrule - 1, yylno);
  /* The symbols being reduced.  */
  for (yyi = 0; yyi < yynrhs; yyi++)
    {
      YYFPRINTF (stderr, "   $%d = ", yyi + 1);
      yy_symbol_print (stderr,
                       yystos[yyssp[yyi + 1 - yynrhs]],
                       &(yyvsp[(yyi + 1) - (yynrhs)])
                                              );
      YYFPRINTF (stderr, "\n");
    }
}

# define YY_REDUCE_PRINT(Rule)          \
do {                                    \
  if (yydebug)                          \
    yy_reduce_print (yyssp, yyvsp, Rule); \
} while (0)

/* Nonzero means print parse trace.  It is left uninitialized so that
   multiple parsers can coexist.  */
int yydebug;
#else /* !YYDEBUG */
# define YYDPRINTF(Args)
# define YY_SYMBOL_PRINT(Title, Type, Value, Location)
# define YY_STACK_PRINT(Bottom, Top)
# define YY_REDUCE_PRINT(Rule)
#endif /* !YYDEBUG */


/* YYINITDEPTH -- initial size of the parser's stacks.  */
#ifndef YYINITDEPTH
# define YYINITDEPTH 200
#endif

/* YYMAXDEPTH -- maximum size the stacks can grow to (effective only
   if the built-in stack extension method is used).

   Do not make this value too large; the results are undefined if
   YYSTACK_ALLOC_MAXIMUM < YYSTACK_BYTES (YYMAXDEPTH)
   evaluated with infinite-precision integer arithmetic.  */

#ifndef YYMAXDEPTH
# define YYMAXDEPTH 10000
#endif


#if YYERROR_VERBOSE

# ifndef yystrlen
#  if defined __GLIBC__ && defined _STRING_H
#   define yystrlen strlen
#  else
/* Return the length of YYSTR.  */
static YYSIZE_T
yystrlen (const char *yystr)
{
  YYSIZE_T yylen;
  for (yylen = 0; yystr[yylen]; yylen++)
    continue;
  return yylen;
}
#  endif
# endif

# ifndef yystpcpy
#  if defined __GLIBC__ && defined _STRING_H && defined _GNU_SOURCE
#   define yystpcpy stpcpy
#  else
/* Copy YYSRC to YYDEST, returning the address of the terminating '\0' in
   YYDEST.  */
static char *
yystpcpy (char *yydest, const char *yysrc)
{
  char *yyd = yydest;
  const char *yys = yysrc;

  while ((*yyd++ = *yys++) != '\0')
    continue;

  return yyd - 1;
}
#  endif
# endif

# ifndef yytnamerr
/* Copy to YYRES the contents of YYSTR after stripping away unnecessary
   quotes and backslashes, so that it's suitable for yyerror.  The
   heuristic is that double-quoting is unnecessary unless the string
   contains an apostrophe, a comma, or backslash (other than
   backslash-backslash).  YYSTR is taken from yytname.  If YYRES is
   null, do not copy; instead, return the length of what the result
   would have been.  */
static YYSIZE_T
yytnamerr (char *yyres, const char *yystr)
{
  if (*yystr == '"')
    {
      YYSIZE_T yyn = 0;
      char const *yyp = yystr;

      for (;;)
        switch (*++yyp)
          {
          case '\'':
          case ',':
            goto do_not_strip_quotes;

          case '\\':
            if (*++yyp != '\\')
              goto do_not_strip_quotes;
            /* Fall through.  */
          default:
            if (yyres)
              yyres[yyn] = *yyp;
            yyn++;
            break;

          case '"':
            if (yyres)
              yyres[yyn] = '\0';
            return yyn;
          }
    do_not_strip_quotes: ;
    }

  if (! yyres)
    return yystrlen (yystr);

  return yystpcpy (yyres, yystr) - yyres;
}
# endif

/* Copy into *YYMSG, which is of size *YYMSG_ALLOC, an error message
   about the unexpected token YYTOKEN for the state stack whose top is
   YYSSP.

   Return 0 if *YYMSG was successfully written.  Return 1 if *YYMSG is
   not large enough to hold the message.  In that case, also set
   *YYMSG_ALLOC to the required number of bytes.  Return 2 if the
   required number of bytes is too large to store.  */
static int
yysyntax_error (YYSIZE_T *yymsg_alloc, char **yymsg,
                yytype_int16 *yyssp, int yytoken)
{
  YYSIZE_T yysize0 = yytnamerr (YY_NULLPTR, yytname[yytoken]);
  YYSIZE_T yysize = yysize0;
  enum { YYERROR_VERBOSE_ARGS_MAXIMUM = 5 };
  /* Internationalized format string. */
  const char *yyformat = YY_NULLPTR;
  /* Arguments of yyformat. */
  char const *yyarg[YYERROR_VERBOSE_ARGS_MAXIMUM];
  /* Number of reported tokens (one for the "unexpected", one per
     "expected"). */
  int yycount = 0;

  /* There are many possibilities here to consider:
     - If this state is a consistent state with a default action, then
       the only way this function was invoked is if the default action
       is an error action.  In that case, don't check for expected
       tokens because there are none.
     - The only way there can be no lookahead present (in yychar) is if
       this state is a consistent state with a default action.  Thus,
       detecting the absence of a lookahead is sufficient to determine
       that there is no unexpected or expected token to report.  In that
       case, just report a simple "syntax error".
     - Don't assume there isn't a lookahead just because this state is a
       consistent state with a default action.  There might have been a
       previous inconsistent state, consistent state with a non-default
       action, or user semantic action that manipulated yychar.
     - Of course, the expected token list depends on states to have
       correct lookahead information, and it depends on the parser not
       to perform extra reductions after fetching a lookahead from the
       scanner and before detecting a syntax error.  Thus, state merging
       (from LALR or IELR) and default reductions corrupt the expected
       token list.  However, the list is correct for canonical LR with
       one exception: it will still contain any token that will not be
       accepted due to an error action in a later state.
  */
  if (yytoken != YYEMPTY)
    {
      int yyn = yypact[*yyssp];
      yyarg[yycount++] = yytname[yytoken];
      if (!yypact_value_is_default (yyn))
        {
          /* Start YYX at -YYN if negative to avoid negative indexes in
             YYCHECK.  In other words, skip the first -YYN actions for
             this state because they are default actions.  */
          int yyxbegin = yyn < 0 ? -yyn : 0;
          /* Stay within bounds of both yycheck and yytname.  */
          int yychecklim = YYLAST - yyn + 1;
          int yyxend = yychecklim < YYNTOKENS ? yychecklim : YYNTOKENS;
          int yyx;

          for (yyx = yyxbegin; yyx < yyxend; ++yyx)
            if (yycheck[yyx + yyn] == yyx && yyx != YYTERROR
                && !yytable_value_is_error (yytable[yyx + yyn]))
              {
                if (yycount == YYERROR_VERBOSE_ARGS_MAXIMUM)
                  {
                    yycount = 1;
                    yysize = yysize0;
                    break;
                  }
                yyarg[yycount++] = yytname[yyx];
                {
                  YYSIZE_T yysize1 = yysize + yytnamerr (YY_NULLPTR, yytname[yyx]);
                  if (! (yysize <= yysize1
                         && yysize1 <= YYSTACK_ALLOC_MAXIMUM))
                    return 2;
                  yysize = yysize1;
                }
              }
        }
    }

  switch (yycount)
    {
# define YYCASE_(N, S)                      \
      case N:                               \
        yyformat = S;                       \
      break
      YYCASE_(0, YY_("syntax error"));
      YYCASE_(1, YY_("syntax error, unexpected %s"));
      YYCASE_(2, YY_("syntax error, unexpected %s, expecting %s"));
      YYCASE_(3, YY_("syntax error, unexpected %s, expecting %s or %s"));
      YYCASE_(4, YY_("syntax error, unexpected %s, expecting %s or %s or %s"));
      YYCASE_(5, YY_("syntax error, unexpected %s, expecting %s or %s or %s or %s"));
# undef YYCASE_
    }

  {
    YYSIZE_T yysize1 = yysize + yystrlen (yyformat);
    if (! (yysize <= yysize1 && yysize1 <= YYSTACK_ALLOC_MAXIMUM))
      return 2;
    yysize = yysize1;
  }

  if (*yymsg_alloc < yysize)
    {
      *yymsg_alloc = 2 * yysize;
      if (! (yysize <= *yymsg_alloc
             && *yymsg_alloc <= YYSTACK_ALLOC_MAXIMUM))
        *yymsg_alloc = YYSTACK_ALLOC_MAXIMUM;
      return 1;
    }

  /* Avoid sprintf, as that infringes on the user's name space.
     Don't have undefined behavior even if the translation
     produced a string with the wrong number of "%s"s.  */
  {
    char *yyp = *yymsg;
    int yyi = 0;
    while ((*yyp = *yyformat) != '\0')
      if (*yyp == '%' && yyformat[1] == 's' && yyi < yycount)
        {
          yyp += yytnamerr (yyp, yyarg[yyi++]);
          yyformat += 2;
        }
      else
        {
          yyp++;
          yyformat++;
        }
  }
  return 0;
}
#endif /* YYERROR_VERBOSE */

/*-----------------------------------------------.
| Release the memory associated to this symbol.  |
`-----------------------------------------------*/

static void
yydestruct (const char *yymsg, int yytype, YYSTYPE *yyvaluep)
{
  YYUSE (yyvaluep);
  if (!yymsg)
    yymsg = "Deleting";
  YY_SYMBOL_PRINT (yymsg, yytype, yyvaluep, yylocationp);

  YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN
  YYUSE (yytype);
  YY_IGNORE_MAYBE_UNINITIALIZED_END
}




/* The lookahead symbol.  */
int yychar;

/* The semantic value of the lookahead symbol.  */
YYSTYPE yylval;
/* Number of syntax errors so far.  */
int yynerrs;


/*----------.
| yyparse.  |
`----------*/

int
yyparse (void)
{
    int yystate;
    /* Number of tokens to shift before error messages enabled.  */
    int yyerrstatus;

    /* The stacks and their tools:
       'yyss': related to states.
       'yyvs': related to semantic values.

       Refer to the stacks through separate pointers, to allow yyoverflow
       to reallocate them elsewhere.  */

    /* The state stack.  */
    yytype_int16 yyssa[YYINITDEPTH];
    yytype_int16 *yyss;
    yytype_int16 *yyssp;

    /* The semantic value stack.  */
    YYSTYPE yyvsa[YYINITDEPTH];
    YYSTYPE *yyvs;
    YYSTYPE *yyvsp;

    YYSIZE_T yystacksize;

  int yyn;
  int yyresult;
  /* Lookahead token as an internal (translated) token number.  */
  int yytoken = 0;
  /* The variables used to return semantic value and location from the
     action routines.  */
  YYSTYPE yyval;

#if YYERROR_VERBOSE
  /* Buffer for error messages, and its allocated size.  */
  char yymsgbuf[128];
  char *yymsg = yymsgbuf;
  YYSIZE_T yymsg_alloc = sizeof yymsgbuf;
#endif

#define YYPOPSTACK(N)   (yyvsp -= (N), yyssp -= (N))

  /* The number of symbols on the RHS of the reduced rule.
     Keep to zero when no symbol should be popped.  */
  int yylen = 0;

  yyssp = yyss = yyssa;
  yyvsp = yyvs = yyvsa;
  yystacksize = YYINITDEPTH;

  YYDPRINTF ((stderr, "Starting parse\n"));

  yystate = 0;
  yyerrstatus = 0;
  yynerrs = 0;
  yychar = YYEMPTY; /* Cause a token to be read.  */
  goto yysetstate;

/*------------------------------------------------------------.
| yynewstate -- Push a new state, which is found in yystate.  |
`------------------------------------------------------------*/
 yynewstate:
  /* In all cases, when you get here, the value and location stacks
     have just been pushed.  So pushing a state here evens the stacks.  */
  yyssp++;

 yysetstate:
  *yyssp = yystate;

  if (yyss + yystacksize - 1 <= yyssp)
    {
      /* Get the current used size of the three stacks, in elements.  */
      YYSIZE_T yysize = yyssp - yyss + 1;

#ifdef yyoverflow
      {
        /* Give user a chance to reallocate the stack.  Use copies of
           these so that the &'s don't force the real ones into
           memory.  */
        YYSTYPE *yyvs1 = yyvs;
        yytype_int16 *yyss1 = yyss;

        /* Each stack pointer address is followed by the size of the
           data in use in that stack, in bytes.  This used to be a
           conditional around just the two extra args, but that might
           be undefined if yyoverflow is a macro.  */
        yyoverflow (YY_("memory exhausted"),
                    &yyss1, yysize * sizeof (*yyssp),
                    &yyvs1, yysize * sizeof (*yyvsp),
                    &yystacksize);

        yyss = yyss1;
        yyvs = yyvs1;
      }
#else /* no yyoverflow */
# ifndef YYSTACK_RELOCATE
      goto yyexhaustedlab;
# else
      /* Extend the stack our own way.  */
      if (YYMAXDEPTH <= yystacksize)
        goto yyexhaustedlab;
      yystacksize *= 2;
      if (YYMAXDEPTH < yystacksize)
        yystacksize = YYMAXDEPTH;

      {
        yytype_int16 *yyss1 = yyss;
        union yyalloc *yyptr =
          (union yyalloc *) YYSTACK_ALLOC (YYSTACK_BYTES (yystacksize));
        if (! yyptr)
          goto yyexhaustedlab;
        YYSTACK_RELOCATE (yyss_alloc, yyss);
        YYSTACK_RELOCATE (yyvs_alloc, yyvs);
#  undef YYSTACK_RELOCATE
        if (yyss1 != yyssa)
          YYSTACK_FREE (yyss1);
      }
# endif
#endif /* no yyoverflow */

      yyssp = yyss + yysize - 1;
      yyvsp = yyvs + yysize - 1;

      YYDPRINTF ((stderr, "Stack size increased to %lu\n",
                  (unsigned long int) yystacksize));

      if (yyss + yystacksize - 1 <= yyssp)
        YYABORT;
    }

  YYDPRINTF ((stderr, "Entering state %d\n", yystate));

  if (yystate == YYFINAL)
    YYACCEPT;

  goto yybackup;

/*-----------.
| yybackup.  |
`-----------*/
yybackup:

  /* Do appropriate processing given the current state.  Read a
     lookahead token if we need one and don't already have one.  */

  /* First try to decide what to do without reference to lookahead token.  */
  yyn = yypact[yystate];
  if (yypact_value_is_default (yyn))
    goto yydefault;

  /* Not known => get a lookahead token if don't already have one.  */

  /* YYCHAR is either YYEMPTY or YYEOF or a valid lookahead symbol.  */
  if (yychar == YYEMPTY)
    {
      YYDPRINTF ((stderr, "Reading a token: "));
      yychar = yylex ();
    }

  if (yychar <= YYEOF)
    {
      yychar = yytoken = YYEOF;
      YYDPRINTF ((stderr, "Now at end of input.\n"));
    }
  else
    {
      yytoken = YYTRANSLATE (yychar);
      YY_SYMBOL_PRINT ("Next token is", yytoken, &yylval, &yylloc);
    }

  /* If the proper action on seeing token YYTOKEN is to reduce or to
     detect an error, take that action.  */
  yyn += yytoken;
  if (yyn < 0 || YYLAST < yyn || yycheck[yyn] != yytoken)
    goto yydefault;
  yyn = yytable[yyn];
  if (yyn <= 0)
    {
      if (yytable_value_is_error (yyn))
        goto yyerrlab;
      yyn = -yyn;
      goto yyreduce;
    }

  /* Count tokens shifted since error; after three, turn off error
     status.  */
  if (yyerrstatus)
    yyerrstatus--;

  /* Shift the lookahead token.  */
  YY_SYMBOL_PRINT ("Shifting", yytoken, &yylval, &yylloc);

  /* Discard the shifted token.  */
  yychar = YYEMPTY;

  yystate = yyn;
  YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN
  *++yyvsp = yylval;
  YY_IGNORE_MAYBE_UNINITIALIZED_END

  goto yynewstate;


/*-----------------------------------------------------------.
| yydefault -- do the default action for the current state.  |
`-----------------------------------------------------------*/
yydefault:
  yyn = yydefact[yystate];
  if (yyn == 0)
    goto yyerrlab;
  goto yyreduce;


/*-----------------------------.
| yyreduce -- Do a reduction.  |
`-----------------------------*/
yyreduce:
  /* yyn is the number of a rule to reduce with.  */
  yylen = yyr2[yyn];

  /* If YYLEN is nonzero, implement the default value of the action:
     '$$ = $1'.

     Otherwise, the following line sets YYVAL to garbage.
     This behavior is undocumented and Bison
     users should not rely upon it.  Assigning to YYVAL
     unconditionally makes the parser a bit smaller, and it avoids a
     GCC warning that YYVAL may be used uninitialized.  */
  yyval = yyvsp[1-yylen];


  YY_REDUCE_PRINT (yyn);
  switch (yyn)
    {
        case 2:
#line 42 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "html");  }
#line 1966 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 3:
#line 42 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "html"); printf("cor");}
#line 1972 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 4:
#line 56 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "abbr"); }
#line 1978 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 5:
#line 56 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "abbr"); }
#line 1984 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 7:
#line 57 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "a"); }
#line 1990 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 8:
#line 57 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "a"); }
#line 1996 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 10:
#line 58 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "acronym"); }
#line 2002 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 11:
#line 58 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "acronym"); }
#line 2008 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 13:
#line 59 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "address"); }
#line 2014 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 14:
#line 59 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "address"); }
#line 2020 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 16:
#line 60 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "applet"); }
#line 2026 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 17:
#line 60 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "applet"); }
#line 2032 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 19:
#line 61 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "article"); }
#line 2038 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 20:
#line 61 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "article"); }
#line 2044 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 22:
#line 62 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "aside"); }
#line 2050 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 23:
#line 62 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "aside"); }
#line 2056 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 25:
#line 63 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "audio"); }
#line 2062 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 26:
#line 63 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "audio"); }
#line 2068 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 28:
#line 64 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "b"); }
#line 2074 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 29:
#line 64 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "b"); }
#line 2080 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 31:
#line 65 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "bdi"); }
#line 2086 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 32:
#line 65 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "bdi"); }
#line 2092 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 34:
#line 66 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "div"); }
#line 2098 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 35:
#line 66 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "div"); }
#line 2104 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 37:
#line 67 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "bdo"); }
#line 2110 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 38:
#line 67 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "bdo"); }
#line 2116 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 40:
#line 68 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "big"); }
#line 2122 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 41:
#line 68 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "big"); }
#line 2128 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 43:
#line 69 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "blockquote"); }
#line 2134 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 44:
#line 69 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "blockquote"); }
#line 2140 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 46:
#line 70 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "body"); }
#line 2146 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 47:
#line 70 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "body"); }
#line 2152 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 49:
#line 71 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "button"); }
#line 2158 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 50:
#line 71 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "button"); }
#line 2164 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 52:
#line 72 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "canvas"); }
#line 2170 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 53:
#line 72 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "canvas"); }
#line 2176 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 55:
#line 73 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "caption"); }
#line 2182 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 56:
#line 73 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "caption"); }
#line 2188 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 58:
#line 74 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "center"); }
#line 2194 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 59:
#line 74 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "center"); }
#line 2200 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 61:
#line 75 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "cite"); }
#line 2206 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 62:
#line 75 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "cite"); }
#line 2212 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 64:
#line 76 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "code"); }
#line 2218 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 65:
#line 76 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "code"); }
#line 2224 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 67:
#line 77 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "colgroup"); }
#line 2230 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 68:
#line 77 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "colgroup"); }
#line 2236 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 70:
#line 78 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "data"); }
#line 2242 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 71:
#line 78 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "data"); }
#line 2248 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 73:
#line 79 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "datalist"); }
#line 2254 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 74:
#line 79 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "datalist"); }
#line 2260 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 76:
#line 80 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dd"); }
#line 2266 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 77:
#line 80 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dd"); }
#line 2272 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 79:
#line 81 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "del"); }
#line 2278 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 80:
#line 81 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "del"); }
#line 2284 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 82:
#line 82 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "details"); }
#line 2290 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 83:
#line 82 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "details"); }
#line 2296 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 85:
#line 83 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dfn"); }
#line 2302 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 86:
#line 83 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dfn"); }
#line 2308 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 88:
#line 84 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dialog"); }
#line 2314 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 89:
#line 84 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dialog"); }
#line 2320 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 91:
#line 85 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dir"); }
#line 2326 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 92:
#line 85 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dir"); }
#line 2332 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 94:
#line 86 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dl"); }
#line 2338 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 95:
#line 86 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dl"); }
#line 2344 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 97:
#line 87 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "dt"); }
#line 2350 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 98:
#line 87 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "dt"); }
#line 2356 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 100:
#line 88 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "em"); }
#line 2362 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 101:
#line 88 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "em"); }
#line 2368 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 103:
#line 89 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "fieldset"); }
#line 2374 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 104:
#line 89 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "fieldset"); }
#line 2380 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 106:
#line 90 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "figcaption"); }
#line 2386 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 107:
#line 90 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "figcaption"); }
#line 2392 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 109:
#line 91 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "figure"); }
#line 2398 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 110:
#line 91 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "figure"); }
#line 2404 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 112:
#line 92 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "font"); }
#line 2410 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 113:
#line 92 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "font"); }
#line 2416 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 115:
#line 93 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "footer"); }
#line 2422 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 116:
#line 93 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "footer"); }
#line 2428 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 118:
#line 94 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "form"); }
#line 2434 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 119:
#line 94 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "form"); }
#line 2440 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 121:
#line 95 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h1"); }
#line 2446 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 122:
#line 95 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h1"); }
#line 2452 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 124:
#line 96 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h2"); }
#line 2458 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 125:
#line 96 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h2"); }
#line 2464 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 127:
#line 97 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h3"); }
#line 2470 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 128:
#line 97 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h3"); }
#line 2476 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 130:
#line 98 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h4"); }
#line 2482 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 131:
#line 98 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h4"); }
#line 2488 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 133:
#line 99 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h5"); }
#line 2494 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 134:
#line 99 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h5"); }
#line 2500 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 136:
#line 100 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "h6"); }
#line 2506 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 137:
#line 100 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "h6"); }
#line 2512 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 139:
#line 101 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "head"); }
#line 2518 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 140:
#line 101 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "head"); }
#line 2524 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 142:
#line 102 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "header"); }
#line 2530 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 143:
#line 102 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "header"); }
#line 2536 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 145:
#line 103 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "i"); }
#line 2542 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 146:
#line 103 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "i"); }
#line 2548 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 148:
#line 104 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "iframe"); }
#line 2554 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 149:
#line 104 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "iframe"); }
#line 2560 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 151:
#line 105 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "ins"); }
#line 2566 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 152:
#line 105 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "ins"); }
#line 2572 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 154:
#line 106 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "kbd"); }
#line 2578 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 155:
#line 106 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "kbd"); }
#line 2584 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 157:
#line 107 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "label"); }
#line 2590 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 158:
#line 107 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "label"); }
#line 2596 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 160:
#line 108 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "legend"); }
#line 2602 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 161:
#line 108 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "legend"); }
#line 2608 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 163:
#line 109 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "li"); }
#line 2614 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 164:
#line 109 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "li"); }
#line 2620 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 166:
#line 110 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "main"); }
#line 2626 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 167:
#line 110 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "main"); }
#line 2632 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 169:
#line 111 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "mark"); }
#line 2638 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 170:
#line 111 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "mark"); }
#line 2644 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 172:
#line 112 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "meter"); }
#line 2650 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 173:
#line 112 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "meter"); }
#line 2656 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 175:
#line 113 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "nav"); }
#line 2662 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 176:
#line 113 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "nav"); }
#line 2668 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 178:
#line 114 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "noframes"); }
#line 2674 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 179:
#line 114 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "noframes"); }
#line 2680 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 181:
#line 115 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "noscript"); }
#line 2686 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 182:
#line 115 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "noscript"); }
#line 2692 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 184:
#line 116 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "object"); }
#line 2698 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 185:
#line 116 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "object"); }
#line 2704 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 187:
#line 117 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "ol"); }
#line 2710 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 188:
#line 117 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "ol"); }
#line 2716 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 190:
#line 118 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "optgroup"); }
#line 2722 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 191:
#line 118 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "optgroup"); }
#line 2728 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 193:
#line 119 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "option"); }
#line 2734 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 194:
#line 119 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "option"); }
#line 2740 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 196:
#line 120 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "output"); }
#line 2746 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 197:
#line 120 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "output"); }
#line 2752 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 199:
#line 121 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "p"); }
#line 2758 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 200:
#line 121 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "p"); }
#line 2764 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 202:
#line 122 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "picture"); }
#line 2770 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 203:
#line 122 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "picture"); }
#line 2776 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 205:
#line 123 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "pre"); }
#line 2782 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 206:
#line 123 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "pre"); }
#line 2788 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 208:
#line 124 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "progress"); }
#line 2794 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 209:
#line 124 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "progress"); }
#line 2800 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 211:
#line 125 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "q"); }
#line 2806 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 212:
#line 125 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "q"); }
#line 2812 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 214:
#line 126 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "rp"); }
#line 2818 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 215:
#line 126 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "rp"); }
#line 2824 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 217:
#line 127 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "rt"); }
#line 2830 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 218:
#line 127 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "rt"); }
#line 2836 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 220:
#line 128 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "ruby"); }
#line 2842 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 221:
#line 128 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "ruby"); }
#line 2848 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 223:
#line 129 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "s"); }
#line 2854 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 224:
#line 129 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "s"); }
#line 2860 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 226:
#line 130 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "samp"); }
#line 2866 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 227:
#line 130 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "samp"); }
#line 2872 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 229:
#line 131 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "section"); }
#line 2878 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 230:
#line 131 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "section"); }
#line 2884 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 232:
#line 132 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "select"); }
#line 2890 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 233:
#line 132 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "select"); }
#line 2896 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 235:
#line 133 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "small"); }
#line 2902 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 236:
#line 133 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "small"); }
#line 2908 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 238:
#line 134 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "span"); }
#line 2914 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 239:
#line 134 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "span"); }
#line 2920 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 241:
#line 135 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "strike"); }
#line 2926 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 242:
#line 135 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "strike"); }
#line 2932 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 244:
#line 136 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "strong"); }
#line 2938 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 245:
#line 136 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "strong"); }
#line 2944 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 247:
#line 137 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "style"); }
#line 2950 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 248:
#line 137 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "style"); }
#line 2956 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 250:
#line 138 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "sub"); }
#line 2962 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 251:
#line 138 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "sub"); }
#line 2968 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 253:
#line 139 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "summary"); }
#line 2974 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 254:
#line 139 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "summary"); }
#line 2980 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 256:
#line 140 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "sup"); }
#line 2986 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 257:
#line 140 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "sup"); }
#line 2992 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 259:
#line 141 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "svg"); }
#line 2998 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 260:
#line 141 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "svg"); }
#line 3004 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 262:
#line 142 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "table"); }
#line 3010 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 263:
#line 142 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "table"); }
#line 3016 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 265:
#line 143 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "tbody"); }
#line 3022 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 266:
#line 143 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "tbody"); }
#line 3028 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 268:
#line 144 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "td"); }
#line 3034 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 269:
#line 144 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "td"); }
#line 3040 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 271:
#line 145 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "template"); }
#line 3046 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 272:
#line 145 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "template"); }
#line 3052 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 274:
#line 146 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "textarea"); }
#line 3058 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 275:
#line 146 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "textarea"); }
#line 3064 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 277:
#line 147 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "tfoot"); }
#line 3070 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 278:
#line 147 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "tfoot"); }
#line 3076 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 280:
#line 148 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "th"); }
#line 3082 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 281:
#line 148 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "th"); }
#line 3088 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 283:
#line 149 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "thead"); }
#line 3094 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 284:
#line 149 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "thead"); }
#line 3100 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 286:
#line 150 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "time"); }
#line 3106 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 287:
#line 150 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "time"); }
#line 3112 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 289:
#line 151 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "title"); }
#line 3118 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 290:
#line 151 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "title"); }
#line 3124 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 292:
#line 152 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "tr"); }
#line 3130 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 293:
#line 152 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "tr"); }
#line 3136 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 295:
#line 153 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "tt"); }
#line 3142 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 296:
#line 153 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "tt"); }
#line 3148 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 298:
#line 154 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "u"); }
#line 3154 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 299:
#line 154 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "u"); }
#line 3160 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 301:
#line 155 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "ul"); }
#line 3166 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 302:
#line 155 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "ul"); }
#line 3172 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 304:
#line 156 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "var"); }
#line 3178 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 305:
#line 156 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "var"); }
#line 3184 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 307:
#line 157 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "video"); }
#line 3190 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 308:
#line 157 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "video"); }
#line 3196 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 310:
#line 158 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "wbr"); }
#line 3202 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 311:
#line 158 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "wbr"); }
#line 3208 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 313:
#line 159 "ex1.y" /* yacc.c:1646  */
    { inserer(&stack, "script"); }
#line 3214 "ex1.tab.c" /* yacc.c:1646  */
    break;

  case 314:
#line 159 "ex1.y" /* yacc.c:1646  */
    { retirer(&stack, "script"); }
#line 3220 "ex1.tab.c" /* yacc.c:1646  */
    break;


#line 3224 "ex1.tab.c" /* yacc.c:1646  */
      default: break;
    }
  /* User semantic actions sometimes alter yychar, and that requires
     that yytoken be updated with the new translation.  We take the
     approach of translating immediately before every use of yytoken.
     One alternative is translating here after every semantic action,
     but that translation would be missed if the semantic action invokes
     YYABORT, YYACCEPT, or YYERROR immediately after altering yychar or
     if it invokes YYBACKUP.  In the case of YYABORT or YYACCEPT, an
     incorrect destructor might then be invoked immediately.  In the
     case of YYERROR or YYBACKUP, subsequent parser actions might lead
     to an incorrect destructor call or verbose syntax error message
     before the lookahead is translated.  */
  YY_SYMBOL_PRINT ("-> $$ =", yyr1[yyn], &yyval, &yyloc);

  YYPOPSTACK (yylen);
  yylen = 0;
  YY_STACK_PRINT (yyss, yyssp);

  *++yyvsp = yyval;

  /* Now 'shift' the result of the reduction.  Determine what state
     that goes to, based on the state we popped back to and the rule
     number reduced by.  */

  yyn = yyr1[yyn];

  yystate = yypgoto[yyn - YYNTOKENS] + *yyssp;
  if (0 <= yystate && yystate <= YYLAST && yycheck[yystate] == *yyssp)
    yystate = yytable[yystate];
  else
    yystate = yydefgoto[yyn - YYNTOKENS];

  goto yynewstate;


/*--------------------------------------.
| yyerrlab -- here on detecting error.  |
`--------------------------------------*/
yyerrlab:
  /* Make sure we have latest lookahead translation.  See comments at
     user semantic actions for why this is necessary.  */
  yytoken = yychar == YYEMPTY ? YYEMPTY : YYTRANSLATE (yychar);

  /* If not already recovering from an error, report this error.  */
  if (!yyerrstatus)
    {
      ++yynerrs;
#if ! YYERROR_VERBOSE
      yyerror (YY_("syntax error"));
#else
# define YYSYNTAX_ERROR yysyntax_error (&yymsg_alloc, &yymsg, \
                                        yyssp, yytoken)
      {
        char const *yymsgp = YY_("syntax error");
        int yysyntax_error_status;
        yysyntax_error_status = YYSYNTAX_ERROR;
        if (yysyntax_error_status == 0)
          yymsgp = yymsg;
        else if (yysyntax_error_status == 1)
          {
            if (yymsg != yymsgbuf)
              YYSTACK_FREE (yymsg);
            yymsg = (char *) YYSTACK_ALLOC (yymsg_alloc);
            if (!yymsg)
              {
                yymsg = yymsgbuf;
                yymsg_alloc = sizeof yymsgbuf;
                yysyntax_error_status = 2;
              }
            else
              {
                yysyntax_error_status = YYSYNTAX_ERROR;
                yymsgp = yymsg;
              }
          }
        yyerror (yymsgp);
        if (yysyntax_error_status == 2)
          goto yyexhaustedlab;
      }
# undef YYSYNTAX_ERROR
#endif
    }



  if (yyerrstatus == 3)
    {
      /* If just tried and failed to reuse lookahead token after an
         error, discard it.  */

      if (yychar <= YYEOF)
        {
          /* Return failure if at end of input.  */
          if (yychar == YYEOF)
            YYABORT;
        }
      else
        {
          yydestruct ("Error: discarding",
                      yytoken, &yylval);
          yychar = YYEMPTY;
        }
    }

  /* Else will try to reuse lookahead token after shifting the error
     token.  */
  goto yyerrlab1;


/*---------------------------------------------------.
| yyerrorlab -- error raised explicitly by YYERROR.  |
`---------------------------------------------------*/
yyerrorlab:

  /* Pacify compilers like GCC when the user code never invokes
     YYERROR and the label yyerrorlab therefore never appears in user
     code.  */
  if (/*CONSTCOND*/ 0)
     goto yyerrorlab;

  /* Do not reclaim the symbols of the rule whose action triggered
     this YYERROR.  */
  YYPOPSTACK (yylen);
  yylen = 0;
  YY_STACK_PRINT (yyss, yyssp);
  yystate = *yyssp;
  goto yyerrlab1;


/*-------------------------------------------------------------.
| yyerrlab1 -- common code for both syntax error and YYERROR.  |
`-------------------------------------------------------------*/
yyerrlab1:
  yyerrstatus = 3;      /* Each real token shifted decrements this.  */

  for (;;)
    {
      yyn = yypact[yystate];
      if (!yypact_value_is_default (yyn))
        {
          yyn += YYTERROR;
          if (0 <= yyn && yyn <= YYLAST && yycheck[yyn] == YYTERROR)
            {
              yyn = yytable[yyn];
              if (0 < yyn)
                break;
            }
        }

      /* Pop the current state because it cannot handle the error token.  */
      if (yyssp == yyss)
        YYABORT;


      yydestruct ("Error: popping",
                  yystos[yystate], yyvsp);
      YYPOPSTACK (1);
      yystate = *yyssp;
      YY_STACK_PRINT (yyss, yyssp);
    }

  YY_IGNORE_MAYBE_UNINITIALIZED_BEGIN
  *++yyvsp = yylval;
  YY_IGNORE_MAYBE_UNINITIALIZED_END


  /* Shift the error token.  */
  YY_SYMBOL_PRINT ("Shifting", yystos[yyn], yyvsp, yylsp);

  yystate = yyn;
  goto yynewstate;


/*-------------------------------------.
| yyacceptlab -- YYACCEPT comes here.  |
`-------------------------------------*/
yyacceptlab:
  yyresult = 0;
  goto yyreturn;

/*-----------------------------------.
| yyabortlab -- YYABORT comes here.  |
`-----------------------------------*/
yyabortlab:
  yyresult = 1;
  goto yyreturn;

#if !defined yyoverflow || YYERROR_VERBOSE
/*-------------------------------------------------.
| yyexhaustedlab -- memory exhaustion comes here.  |
`-------------------------------------------------*/
yyexhaustedlab:
  yyerror (YY_("memory exhausted"));
  yyresult = 2;
  /* Fall through.  */
#endif

yyreturn:
  if (yychar != YYEMPTY)
    {
      /* Make sure we have latest lookahead translation.  See comments at
         user semantic actions for why this is necessary.  */
      yytoken = YYTRANSLATE (yychar);
      yydestruct ("Cleanup: discarding lookahead",
                  yytoken, &yylval);
    }
  /* Do not reclaim the symbols of the rule whose action triggered
     this YYABORT or YYACCEPT.  */
  YYPOPSTACK (yylen);
  YY_STACK_PRINT (yyss, yyssp);
  while (yyssp != yyss)
    {
      yydestruct ("Cleanup: popping",
                  yystos[*yyssp], yyvsp);
      YYPOPSTACK (1);
    }
#ifndef yyoverflow
  if (yyss != yyssa)
    YYSTACK_FREE (yyss);
#endif
#if YYERROR_VERBOSE
  if (yymsg != yymsgbuf)
    YYSTACK_FREE (yymsg);
#endif
  return yyresult;
}
#line 165 "ex1.y" /* yacc.c:1906  */

 

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
