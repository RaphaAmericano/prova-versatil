<?php 

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=saida.txt");
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0');
header('Pragma: no-cache');
header('Expires:0');
header("Content-Type: application/force-download");
header("Connection: close");

    $total = 0;
    $arquivo = file($_POST['arquivo'], FILE_SKIP_EMPTY_LINES);
    $ligacoes = array();
    $ddds = array();
    foreach ($arquivo as $key => $value) {
        if($key != 0){
            $total++;
            $saida = explode(';', $value);
            $saida[1] = substr($saida[1],0, 2);
            $saida[2] = substr($saida[2],0, 2);
            array_push($ddds,substr($saida[1],0, 2));
            array_push($ligacoes, $saida);
        }
        if($total == 20000000){
            break;
        }
    }

    $ddds = array_unique($ddds);
    
    $outro_ddd = 0;
    foreach ($ligacoes as $chave => $valor ) {       
       if($valor[1] != $valor[2] ){
            $outro_ddd++;
       }   
    }

    $duracao_por_ddd = array();

    foreach ( $ligacoes as $chave2 => $valor2 ) {
            
        $ddd = array($valor2[1] => $valor2[3]);
        array_push($duracao_por_ddd, $ddd);
    }

    $duracao_organizada = array();

    for ($i=0; $i < count($ddds); $i++) { 
        $soma = array($ddds[$i], array_column($duracao_por_ddd, $ddds[$i]));
        array_push($duracao_organizada, $soma);
    }

    $duracao_soma = array();
    foreach ($duracao_organizada as $key => $arraySub) {
        
        $soma_por_ddd = array($arraySub[0], 0);
        $soma_por_ddd[1] = array_sum($arraySub[1]) / count($arraySub[1]) * 60;
        $soma_por_ddd[1] = intval(round($soma_por_ddd[1])); 
        array_push($duracao_soma, $soma_por_ddd);
    }

    print 'TOTAL_CLIENTES_LIGARAM: '.$total.'\r\n'; 
    print 'DURACAO_MEDIA:\n';
    foreach ($duracao_soma as $chaveddd => $segundos) {
        print $segundos[0].": ".$segundos[1].'\n';
    }
    print 'TOTAL_CLIENTES_LIGARAM_OUTRO_DDD: '.$outro_ddd.'\n';

 ?>