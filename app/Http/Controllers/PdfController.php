<?php

namespace App\Http\Controllers;

use Session;
use Response;
use Illuminate\Http\Request;
use DOMDocument;
use Auth;
use App\Analysis;


class PdfController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function generatePDF(Request $request) {
        $var = $request->all()["name"];
        $name = $request->input('name');
        $analysis = Analysis::find($name)->toArray();
        foreach ($analysis as $key => $value) {
            if ($key != "created_at" && $key != "updated_at") {
                $analysis[$key] = json_decode($value, true);
            }
        }
        chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/vendor/");

        require_once 'autoload.php';
        $pdf = new \Mpdf\Mpdf();
  
        $email=Auth::user()->email;

        $total_links=count($analysis["load_time"]);

        $cc=count($analysis["urls"]);

        for ($i=0; $i < $cc; $i++) { 
            $n[$i]=count($analysis["urls"][$i]);
        }

        for ($i=$cc; $i < 6; $i++) { 
            $n[$i]=0;
        }

        for ($i=0; $i < 6; $i++) { 
            $nn[$i]=$n[$i]/$total_links*100;
            $nn[$i] = round($nn[$i], 2);
        }

        $t_min=round(min($analysis["load_time"]), 2);
        $t_max=round (max($analysis["load_time"]), 2);
        $t_avr=round((array_sum($analysis["load_time"])/count($analysis["load_time"])), 2);



        if ($analysis["analyse_synt"]==0){
            $syn_correct="non demandé";
            $syn_noncorrect="non demandé";
        } else {
            $syn_correct=0;
            for ($i=0; $i < count($analysis["syntaxe_errors"]); $i++) { 
                if ($analysis["syntaxe_errors"][$i]["0"] == "CORRECT" )
                    $syn_correct++;
            }
            $syn_noncorrect=count($analysis["syntaxe_errors"])-$syn_correct;
        }

        $percent_internal = $analysis["internal_links"]/$total_links*100;
        $percent_external = $analysis["external_links"]/$total_links*100;

        $percent_internal=round($percent_internal, 2);
        $percent_external=round($percent_external, 2);

        $valid_links = $total_links-$analysis["nb_broken"];
        $percent_valid_links=round($valid_links/$total_links*100, 2);
        $autre = $analysis["nb_broken"]-$analysis["nb_broken404"];
        $valid_rsc = count($analysis["r_links"])-$analysis["nb_r_broken"];
        $percent_valid_rsc = round($valid_rsc/count($analysis["r_links"])*100, 2);
        $date1 = date('d/m/Y h:i:s a', time());
        $html = '
            <h1>Rapport de l\'analyse</h1>
            <p class="breadcrumb">PDF généré le : '.$date1.' </p>


            <h3>Détails de l\'analyse</h3>
            <p><span>Le lien du site web analysé :</span> '.$analysis["url"].'</p>
            <p><span>Utilisateur ayant lancé l\'analyse :</span> '.$email.'</p>
            <p><span>Date de l\'analyse :</span>'.$analysis["created_at"].'</p>

            <h3>Le site analysé en chiffres</h3>
            <h4>Le nombre de liens trouvés</h4>
            <p>Nombre de liens internes : <span class="blue">'.$analysis["internal_links"].' lien(s)</span> <span>('.$percent_internal.'%)</span></p>
            <p>Nombre de liens externes : <span class="blue">'.$analysis["external_links"].' lien(s)</span> <span>('.$percent_external.'%)</span></p>
            <h5>Nombre total de liens : '.$total_links.' lien(s)</h5>

            <h4>La profondeur des liens</h4>
            <ul>
            <li>Nombre de liens trouvés a la profondeur 0 : <span class="blue">'.$n["0"].' lien(s)</span> <span>('.$nn["0"].'%)</span></li>
            <li>Nombre de liens trouvés a la profondeur 1 : <span class="blue">'.$n["1"].' lien(s)</span> <span>('.$nn["1"].'%)</span></li>
            <li>Nombre de liens trouvés a la profondeur 2 : <span class="blue">'.$n["2"].' lien(s)</span> <span>('.$nn["2"].'%)</span></li>
            <li>Nombre de liens trouvés a la profondeur 3 : <span class="blue">'.$n["3"].' lien(s)</span> <span>('.$nn["3"].'%)</span></li>
            <li>Nombre de liens trouvés a la profondeur 4 : <span class="blue">'.$n["4"].' lien(s)</span> <span>('.$nn["4"].'%)</span></li>
            <li>Nombre de liens trouvés a la profondeur 5 : <span class="blue">'.$n["5"].' lien(s)</span> <span>('.$nn["5"].'%)</span></li>
            </ul>

            <h4>Le temps de réponse</h4>
            <ul>
            <li>Temps de réponse minimum : <span class="blue">'.$t_min.' (ms)</span></li>
            <li>Temps de réponse maximum : <span class="blue">'.$t_max.' (ms)</span></li>
            </ul>
            <h5>Temps de réponse moyen : '.$t_avr.' (ms)</h5>

            <h4>Validité des liens (Détection de liens morts)</h4>
            <ul>
            <li>Nombre de liens valides : <span class="blue">'.$valid_links.' lien(s)</span></li>
            <li>Nombre de liens invalides : <span class="blue">'.$analysis["nb_broken"].' lien(s)</span></li>
            </ul>
            <h5>Pourcentage de validité : '.$percent_valid_links.'% (liens valides)</h5>

            <h4>Les ressources (Détection de ressources manquantes)</h4>
            <ul>
            <li>Nombre de ressources valides : <span class="blue">'.$valid_rsc.'</span> </span></li>
            <li>Nombre de ressources invalides : <span class="blue">'.$analysis["nb_r_broken"].'</span> </span></li>
            </ul>
            <h5>Pourcentage de validité : '.$percent_valid_rsc.'% (ressources valides)</h5>

            <h4>Vérification syntaxique</h4>
            <p>Nombre de pages ne contenants <span>pas</span> d\'erreurs syntaxiques : <span class="blue">'.$syn_correct.' </span></span></p>
            <p>Nombre de pages contenants des erreurs syntaxiques : <span class="blue">'.$syn_noncorrect.' </span></span></p>';

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

            $pdfname = 'analysis_'.$name.'.pdf';

            $pdf->Output($pdfname ,'F');

            $realpath = realpath($pdfname);
            $realpath2 = str_replace("/vendor/", "/public/pdfs/", $realpath);

            rename($realpath, $realpath2);

            $content = file_get_contents($realpath2);

            return Response::make($content, 200, array('content-type'=>'application/pdf'));
    }

    
}
