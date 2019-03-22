<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DOMDocument;
use Auth;
use App\Analysis;


class AnalysisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //  ----------------- Secondary Functions -----------------

    public function loading_time (Request $request)
    {
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $array = $this->analyse($request);

        $analysis = new Analysis();
        foreach ($array as $key => $value) {
            $analysis->$key = json_encode($value);
        }

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = $finish - $start;
        $analysis->loading_time=$total_time;
        $analysis->save();

        return view('dashboard', $array);
    }

    public function add_http ($url)
    {
        if (false === strpos($url, '://'))  {
            $url = 'http:/' .parse_url($url, PHP_URL_HOST).'/'.parse_url($url, PHP_URL_PATH);
        }
        return $url;
    }

    // supprimer les commentaires conditionnels
    public function format_html($url)
    {
        $html = $this->file_get_contents_curl($url);
        $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);        
        $html = str_replace('\r\n', '', $html);
        return ($html);
    }

    public function file_get_contents_curl($url) 
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function t_reponse ($url)
    {
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $contents = $this->file_get_contents_curl($url);

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        return $total_time * 1000;
    }

    public function check_url($url) 
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
        return $headers['http_code'];
    }

    public function init_txt ()
    {
        chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/app/Http/Controllers/AnalyseWebCompilation");
        file_put_contents("tags.txt", "");
    }

    public function end_txt($url)
    {
        $this->init_txt();
        $htmlcontent =  $this->format_html($url);
        $htmlcontent = str_replace("><", ">\n<", $htmlcontent);
        file_put_contents("tags.txt",  $htmlcontent); 
    }

    

    //  ----------------- Primary Functions -----------------

    public function r_manquante($url, &$nb_r_broken)
    {
        $check_url_status = $this->check_url($url);
        if ($check_url_status == '200')
            return "Valide";
        else{
            $nb_r_broken++;
            return "non_Valide";
        }
    }

    public function broken_link($url, &$nb_broken, &$nb_broken404)
    {
        $check_url_status = $this->check_url($url);
        if ($check_url_status == '200')
           return "Valide";
        else
        {   
            $nb_broken++;
            if ($check_url_status == '404'){
                $nb_broken404++;
                return "introuvable";
            }
            if ($check_url_status == 'bad host'){
                return "Mauvais hôte";
            }
            if ($check_url_status == '302' || $check_url_status == '301' || $check_url_status == '303'){
                $nb_broken--;
                return "Redirection";
            }
            if ($check_url_status == '400'){
                return "Mauvaise demande";
            }
            if ($check_url_status == 'Malformed URL'){
                return "URL Malformé";
            }
            if ($check_url_status == 'bad code'){
                return "Mauvais code";
            }
            return "Lien mort";
        }
    }

    public function syntaxe_verif($url)
    {        
        $this->init_txt();
        $htmlcontent =  $this->format_html($url);
        $htmlcontent = str_replace("><", ">\n<", $htmlcontent);

        file_put_contents("tags.txt",  $htmlcontent);
                
        $result = array();
        $res = shell_exec('./ex1 2>&1');
        

        if (strlen($res) == 3) {
            array_push($result, "CORRECT");
        } else {
            $pos1 = strpos($res, '.');
            $pos2 = strpos($res, '.', $pos1 + 1);
            // balise
            array_push($result, substr ( $res , 0 , $pos1 ));
            // ouverture
            array_push($result, intval( substr ( $res , $pos1 + 1 , $pos2 - $pos1 - 1)));
            // fermeture prevue
            array_push($result, intval( substr ( $res , $pos2 + 1 , strlen($res) - $pos2 )));
        }
        
        return ($result);
    }

    public function getLinks($url,$tag) 
    {
        $url1=$url;
        $urlContent = $this->file_get_contents_curl($url);
        $urls = array();
        $dom = new DOMDocument();
        @$dom->loadHTML($urlContent);
        $xpath = new \DOMXPath($dom);
        if ($tag=="a"){
            $hrefs = $xpath->evaluate("/html/body//a");
            for($i = 0; $i < $hrefs->length; $i++){
                $href = $hrefs->item($i);
                $url = $href->getAttribute('href');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // validate url
                if(!filter_var($url, FILTER_VALIDATE_URL) === false){
                    array_push($urls, $url) ;
                }
            }
        }else{
            $hrefs = $xpath->evaluate("/html/body//img");
            for($i = 0; $i < $hrefs->length; $i++){
                $href = $hrefs->item($i);
                $url = $href->getAttribute('src');
                if (false === strpos($url, '://'))  {
                    $temp = parse_url($url1, PHP_URL_HOST).$url;
                    array_push($urls, $temp) ;
                } else {
                    array_push($urls, $url) ;
                }
            }
        }
        $result = array_unique($urls);
        return $result;
    }

    public function getLinkstime($urls) 
    {
        $result = array();
        foreach ($urls as $value) {
            array_push($result, $this->t_reponse($value));
        }
        return $result;
    }

    public function site_links($depth_0,$original_link,$profondeur,$lienx,$analyse_synt,$load_time, $broken_link,$syntaxe_errors, $nb_broken, $nb_broken404) 
    {
        $internal_links = 1;
        $external_links = 0;
        $links = array();
        $links1 = array();
        $result = array();
        $load_time_temp=array();
        $broken_link_temp=array();
        $syntaxe_errors_temp=array();

        array_push($load_time_temp, $load_time);
        array_push($broken_link_temp, $broken_link);
        array_push($syntaxe_errors_temp, $syntaxe_errors);

        $array["0"]["0"]= $depth_0;

        while(sizeof($array) <= $profondeur) {
            foreach ($array[sizeof($array)-1] as $value) {
                $links_temp=$this->getLinks($value,"a");
                foreach ($links_temp as $aLink) {
                    if(!in_array($aLink, $links, true)){
                        
                        // external + demandé
                        if (strpos(parse_url($aLink, PHP_URL_HOST), $original_link) === false && $lienx == 1){
                            $external_links = $external_links + 1; 
                            array_push($load_time_temp, $this->t_reponse($aLink));
                            array_push($broken_link_temp, $this->broken_link($aLink, $nb_broken, $nb_broken404));
                            if($analyse_synt == 1)
                                array_push($syntaxe_errors_temp, $this->syntaxe_verif($aLink));
                            else
                                array_push($syntaxe_errors_temp, "non demandé");
                            

                            array_push($links, $aLink);

                            // internal
                        } else if (strpos(parse_url($aLink, PHP_URL_HOST), $original_link) !== false){
                            $internal_links = $internal_links + 1;
                            array_push($load_time_temp, $this->t_reponse($aLink));
                            array_push($broken_link_temp, $this->broken_link($aLink, $nb_broken, $nb_broken404));
                            if($analyse_synt == 1)
                                array_push($syntaxe_errors_temp, $this->syntaxe_verif($aLink));
                            else
                                array_push($syntaxe_errors_temp, "non demandé");

                            array_push($links, $aLink);
                            array_push($links1, $aLink);
                        }          
                    }
                }
                
            }
            array_push($array, $links1);
            unset($links1);
            $links1 = array();
        }
        $result["vars"]["nb_broken"]=$nb_broken;
        $result["vars"]["nb_broken404"]=$nb_broken404;
        $result["vars"]["internal_links"]=$internal_links;
        $result["vars"]["external_links"]=$external_links;
        $result["vars"]["load_time"]=$load_time_temp;
        $result["vars"]["broken_link"]=$broken_link_temp;
        $result["vars"]["syntaxe_errors"]=$syntaxe_errors_temp;
        $result["array"]=$array;
        return $result;
    }

    public function depth_zero($url,$analyse_synt)
    {
        $nb_broken = 0;
        $nb_r_broken = 0;
        $nb_broken404 = 0;
        $array_temp = array();

        $array["load_time"]   = $this->t_reponse($url);

        $array["broken_link"] = $this->broken_link ($url, $nb_broken, $nb_broken404);

        if($analyse_synt == 1)
            $array["syntaxe_errors"] = $this->syntaxe_verif($url);
        else
            $array["syntaxe_errors"] = "non demandé";
        
        $array["r_links"] = $this->getLinks($url,"img");

        foreach ($array["r_links"] as $value){
            array_push($array_temp,$this->r_manquante($value,$nb_r_broken));
        }
        $array["r_manquante_arr"] = $array_temp;

        $array["nb_broken"]     = $nb_broken;
        $array["nb_r_broken"]   = $nb_r_broken;
        $array["nb_broken404"]  = $nb_broken404;

        return $array;
    }



    public function generatePDF(Request $request) {
        $var = $request->all()["name"];
        chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/vendor/");

        require_once 'autoload.php';    
        
        $pdf = new \Mpdf\Mpdf();
  

        $html = '
<h1>Rapport de l\'analyse</h1>
<h2>©AnalyseWeb</h2>
<p class="breadcrumb">PDF généré le : Mardi, le 19 mars 2019</p>


<h3>Détails de l\'analyse</h3>
<p><span>Le lien du site web analysé :</span> http://www.univ-rouen.fr/</p>
<p><span>Utilisateur ayant lancé l\'analyse :</span> sofiane@gmail.com</p>
<p><span>Date de l\'analyse :</span> Lundi, le 18 mars 2018, a 18h01.</p>

<br/>
<h3>Le site analysé en chiffres</h3>
<h4>Le nombre de liens trouvés</h4>
<p>Nombre de liens internes : <span class="blue">3697 lien(s)</span> <span>(97%)</span></p>
<p>Nombre de liens externes : <span class="blue">12 lien(s)</span> <span>(3%)</span></p>
<h5>Nombre total de liens : 3709 lien(s)</h5>

<h4>La profondeur des liens</h4>
<ul>
<li>Nombre de liens trouvés a la profondeur 0 : <span class="blue">1 lien(s)</span> <span>(0%)</span></li>
<li>Nombre de liens trouvés a la profondeur 1 : <span class="blue">12 lien(s)</span> <span>(2%)</span></li>
<li>Nombre de liens trouvés a la profondeur 2 : <span class="blue">217 lien(s)</span> <span>(5%)</span></li>
<li>Nombre de liens trouvés a la profondeur 3 : <span class="blue">739 lien(s)</span> <span>(11%)</span></li>
<li>Nombre de liens trouvés a la profondeur 4 : <span class="blue">1829 lien(s)</span> <span>(92%)</span></li>
<li>Nombre de liens trouvés a la profondeur 5 : <span class="blue">2712 lien(s)</span> <span>(65 %)</span></li>
</ul>

<h4>Le temps de réponse</h4>
<ul>
<li>Temps de réponse minimum : <span class="blue">64 (ms)</span></li>
<li>Temps de réponse maximum : <span class="blue">1964 (ms)</span></li>
<ul>
<li><span>Répartition</span></li>
<li>Nombre de liens en dessous de 200 (ms) : <span class="blue">1102 lien(s)</span> <span>(49%)</span></li>
<li>Nombre de liens en dessus de 200 (ms) : <span class="blue">1309 lien(s)</span> <span>(51%)</span></li>
</ul>
</ul>
<h5>Temps de réponse moyen : 312 (ms)</h5>

<h4>Validité des liens (Détection de liens morts)</h4>
<ul>
<li>Nombre de liens valides : <span class="blue">2664 lien(s)</span></li>
<li>Nombre de redirections : <span class="blue">5 lien(s)</span></li>
<li>Nombre de liens invalides : <span class="blue">46 lien(s)</span></li>
<ul>
<li>Erreur 404 : <span class="blue">7 lien(s)</span></li>
<li>Mauvais hôte : <span class="blue">6 lien(s)</span></li>
<li>Autre(s) erreur(s) : <span class="blue">6 lien(s)</span></li>
</ul>
</ul>
<h5>Pourcentage de validité : 96% (liens valides)</h5>

<h4>Les ressources (Détection de ressources manquantes)</h4>
<ul>
<li>Nombre de ressources valides : <span class="blue">164</span> </span> <span>(3%)</span></li>
<li>Nombre de ressources invalides : <span class="blue">16</span> </span> <span>(3%)</span></li>
</ul>
<h5>Pourcentage de validité : 81% (ressources valides)</h5>

<h4>Vérification syntaxique</h4>
<p>Nombre de liens ne contenants <span>pas</span> d\'erreurs syntaxiques : <span class="blue">53 </span> <span>(3%)</span></sPan></p>
<p>Nombre de liens contenants des erreurs syntaxiques : <span class="blue">53 </span> <span>(3%)</span></sPan></p>
<h5>Pourcentage de validité : 89% (syntaxiqument valides)</h5>


';
//==============================================================
//==============================================================
//==============================================================

//$pdf=new mPDF('c');
$pdf->SetDisplayMode('fullpage');
// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdfstyleA4.css');
$stylesheet = 'body { font-family: DejaVuSansCondensed, sans-serif; font-size: 11pt; background-image: url("/assets/img/backwhite.png");  }
        p {     text-align: justify; margin-bottom: 4pt;  margin-top:0pt; }

        hr {    width: 70%; height: 1px; 
            text-align: center; color: #999999; 
            margin-top: 8pt; margin-bottom: 8pt; }

        a { color: #000066; font-style: normal; text-decoration: underline; 
            font-weight: normal; }

        ul {    text-indent: 1mm; margin-bottom: 9pt; }
        ol {    text-indent: 5mm; margin-bottom: 9pt; }

        pre { font-family: DejaVuSansMono, monospaced; font-size: 9pt; margin-top: 5pt; margin-bottom: 5pt; }

        h1 {    font-weight: normal; font-size: 26pt; color: #000066; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 18pt; margin-bottom: 6pt; 
            border-top: 0.075cm solid #000000; border-bottom: 0.075cm solid #000000; 
            text-align: ; page-break-after:avoid; }
        h2 {    font-weight: bold; font-size: 12pt; color: #000066; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 6pt; margin-bottom: 6pt; 
            border-top: 0.07cm solid #000000; border-bottom: 0.07cm solid #000000; 
            text-align: ;  text-transform: uppercase; page-break-after:avoid; }
        h3 {    font-weight: normal; font-size: 22pt; color: #000000; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 0pt; margin-bottom: 6pt; 
            border-top: 0; border-bottom: 0; 
            text-align: ; page-break-after:avoid; }
        h4 {    font-weight: ; font-size: 15pt; color: #9f2b1e; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 10pt; margin-bottom: 7pt; 
            text-align: ;  margin-collapse:collapse; page-break-after:avoid; }
        h5 {    font-weight: bold; font-style:italic; ; font-size: 11pt; color: #000044; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 8pt; margin-bottom: 4pt; 
            text-align: ;  page-break-after:avoid; }
        h6 {    font-weight: bold; font-size: 9.5pt; color: #333333; 
            font-family: DejaVuSansCondensed, sans-serif; margin-top: 6pt; margin-bottom: ; 
            text-align: ;  page-break-after:avoid; }

            span {
                font-weight: bold;
            }
        .breadcrumb {
            text-align: right; font-size: 8pt; font-family: DejaVuSerifCondensed, serif; color: #666666;
            font-weight: bold; font-style: normal; margin-bottom: 6pt; }

        .infobox { margin-top:10pt; background-color:#DDDDBB; text-align:center; border:1px solid #880000; }

        .big { font-size: 1.5em; }
        .red { color: #880000; }
        .slanted { font-style: italic;
         }

         .blue {
            color: #000044;
            font-weight: bolder;
         }
';
$pdf->WriteHTML($stylesheet,1); // The parameter 1 tells that this is css/style only and no body/html/text
$pdf->WriteHTML($html);

        $pdf->Output();
    }

    //  ----------------- Main Function -----------------

    public function analyse($request)
    {
        // init vars
        $url = $request->all()["url"];
        $profondeur = $request->all()["Profondeur"];
        $lienx = $request->all()["liensx"];
        $analyse_synt = $request->all()["analyse_synt"];
        $tmoyen = $request->all()["TempsRep"];
        $op_images = $request->all()["op_images"];
        
        
        // adding http to url
        $url = $this->add_http($url);

        // getting host 
        $original_link = parse_url($url, PHP_URL_HOST);

        // results of main page
        $array = $this->depth_zero($url,$analyse_synt);

        // result of depth X
        $links_array = $this->site_links($url,$original_link,$profondeur,$lienx,$analyse_synt,$array["load_time"],$array["broken_link"],$array["syntaxe_errors"], $array["nb_broken"], $array["nb_broken404"]);

        // adding final content to tags
        if ($analyse_synt == 1)
            $this->end_txt($url);

        $var ["url"] = $url;
        $var ["user_id"] = Auth::id();
        $var ["r_manquante_arr"] = $array["r_manquante_arr"];
        $var ["r_links"] = $array["r_links"];
        $var ["nb_r_broken"] = $array["nb_r_broken"];
        $var ["urls"] = $links_array["array"];
        $var ["tmoyen"] = $tmoyen;
        $var ["prof"] = $profondeur;
        $var ["tdep"] = $lienx;
        $var ["load_time"] = $links_array["vars"]["load_time"];
        $var ["broken_link"] = $links_array["vars"]["broken_link"];
        $var ["syntaxe_errors"] = $links_array["vars"]["syntaxe_errors"];
        $var ["internal_links"] = $links_array["vars"]["internal_links"];
        $var ["external_links"] = $links_array["vars"]["external_links"];
        $var ["nb_broken"] = $links_array["vars"]["nb_broken"];
        $var ["nb_broken404"] = $links_array["vars"]["nb_broken404"];
        $var ["analyse_synt"] = $analyse_synt;
        $var ["op_images"] = $op_images;
        return $var;
    }
}
