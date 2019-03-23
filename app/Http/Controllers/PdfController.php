<?php

namespace App\Http\Controllers;

use Session;
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
        
        $html = '
            <h1>Rapport de l\'analyse</h1>
            <h2>©AnalyseWeb</h2>
            <p class="breadcrumb">PDF généré le : Mardi, le 19 mars 2019 </p>


            <h3>Détails de l\'analyse</h3>
            <p><span>Le lien du site web analysé :</span> '.$analysis["url"].'</p>
            <p><span>Utilisateur ayant lancé l\'analyse :</span> '.$email.'</p>
            <p><span>Date de l\'analyse :</span>'.$analysis["created_at"].'</p>

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
            <h5>Pourcentage de validité : 89% (syntaxiqument valides)</h5>';

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

    
}
