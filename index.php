<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prova Versátil</title>
</head>
<body>
    <form action="download.php" method="post">
        <input type="file" name="arquivo" value="Selecionar">
        <input type="submit">
    </form>

    <?php 
    
    // $total = 0;
    // $arquivo = file("teste-ligacoes-2018-01-01.txt", FILE_SKIP_EMPTY_LINES);
    // $ligacoes = array();
    // $ddds = array();
    // foreach ($arquivo as $key => $value) {
    //     if($key != 0){
    //         $total++;
    //         $saida = explode(';', $value);
    //         $saida[1] = substr($saida[1],0, 2);
    //         $saida[2] = substr($saida[2],0, 2);
    //         array_push($ddds,substr($saida[1],0, 2));
    //         array_push($ligacoes, $saida);
    //     }
    //     if($total == 20000000){
    //         break;
    //     }
    // }

    // $ddds = array_unique($ddds);

    // $outro_ddd = 0;
    // foreach ($ligacoes as $chave => $valor ) {       
    //    if($valor[1] != $valor[2] ){
    //         $outro_ddd++;
    //    }   
    // }

    // $duracao_por_ddd = array();

    // foreach ( $ligacoes as $chave2 => $valor2 ) {
            
    //     $ddd = array($valor2[1] => $valor2[3]);
    //     array_push($duracao_por_ddd, $ddd);
    // }

    // $duracao_organizada = array();

    // for ($i=0; $i < count($ddds); $i++) { 
    //     $soma = array($ddds[$i], array_column($duracao_por_ddd, $ddds[$i]));
    //     array_push($duracao_organizada, $soma);
    // }

    // $duracao_soma = array();
    // foreach ($duracao_organizada as $key => $arraySub) {
        
    //     $soma_por_ddd = array($arraySub[0], 0);
    //     $soma_por_ddd[1] = array_sum($arraySub[1]) / count($arraySub[1]) * 60;
    //     $soma_por_ddd[1] = intval(round($soma_por_ddd[1])); 
    //     array_push($duracao_soma, $soma_por_ddd);
    // }

    // print 'TOTAL_CLIENTES_LIGARAM: '.$total."<br>"; 
    // print 'DURACAO_MEDIA:<br>';
    // foreach ($duracao_soma as $chaveddd => $segundos) {
    //     print $segundos[0].": ".$segundos[1]."<br>";
    // }
    // print 'TOTAL_CLIENTES_LIGARAM_OUTRO_DDD: '.$outro_ddd;
    // print '<br>';
    // ?>
    
</body>
</html>