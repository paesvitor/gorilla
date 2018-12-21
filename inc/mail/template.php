<?php
$template = "<!DOCTYPE html><html><head><meta charset='UTF-8'><style>img {display: block;}</style></head><body><table cellpadding='0' cellspacing='0' border='0'  style='font-size:16px; font-family: Verdana, Arial, Ubuntu, Helvetica, sans-serif; line-height: 25px;' width='500'><tr><td style='background-color: #009ee0; padding:10px;'><span style='color: #fff; font-size: 18px; font-weight: bold;'>Brasil Contadores</span><br/></td>";

if (isset($_POST['Assunto'])){
    $template .= "<td  style='background-color:#4a4a4a; padding: 10px; font-size: 15px; font-weight: bold; color: #fff'>" . $_POST['Assunto'] . "</td>";
}

$template .= "</tr><tr><td colspan='2' height='5' style='line-height: 5px; font-size: 10px;'>&nbsp;</td></tr>";
foreach($_POST as $campo => $valor) {
	if ($campo == 'Assunto') {
		# code...
	} else {
		$template .= '<tr><td valign="top" colspan="1" style="font-size: 14px;padding: 10px; background-color: #ededed">'.str_replace('_',' ',$campo).'</td><td valign="top" colspan="1" style="font-size: 14px;padding: 10px; background-color: #ededed">'.$valor.'</td></tr>';
	}
}

$template .= "<tr><td colspan='2' height='5' style='line-height: 5px; font-size: 10px;'>&nbsp;</td></tr><tr><td colspan='2' style='background-color:#4a4a4a; padding: 2px; font-size: 15px; font-weight: bold; color: #fff'></td></tr><tr><td width='480' style='font-size:13px; font-family:Verdana, Arial, Ubuntu, Helvetica, sans-serif; color:#959595; line-height: 20px; padding-bottom: 10px;' colspan='2'><p style='margin: 0px; padding-top: 16px;'>Especialistas em soluções de logística e transporte de carga.</p></td></tr></table></body></html>";