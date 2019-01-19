<?php

$app->get('/downloadxlsx', function($req, $res, $args){

  $file = '../../assets/SurveySetTemplate.xlsx';
  $response = $res->withHeader('Content-Description', 'File Transfer')
                  ->withHeader('Content-Type', 'application/octet-stream')
                  ->withHeader('Content-Disposition', 'attachment;filename="'.basename($file).'"')
                  ->withHeader('Expires', '0')
                  ->withHeader('Cache-Control', 'must-revalidate')
                  ->withHeader('Pragma', 'public')
                  ->withHeader('Content-Length', filesize($file));

 readfile($file);
 return $response;

});

?>
