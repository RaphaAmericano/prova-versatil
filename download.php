<?php 
include('header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 p-2">
            <div class="jumbotron p-5">
                <h1 class="display-4">Prova Versátil </h1>

<?php
   
    if(!empty($_POST['arquivo'])){
        
        $total = 0;
        $arquivo = fopen($_POST['arquivo'], "r");   
        $ligacoes = array();
        $ddds = array();
        $c = 0;
        while(($value = fgets($arquivo)) !== false ){
            if($c == 20000000){
                break;
            }
            if($c != 0){
                $total++;
                $saida = explode(';', $value);
                $saida[1] = substr($saida[1],0, 2);
                $saida[2] = substr($saida[2],0, 2);
                array_push($ddds,substr($saida[1],0, 2));
                array_push($ligacoes, $saida);
            }
            $c++;
        }
        fclose($arquivo);

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

        $arquivo_saida = fopen('saida.txt', 'w');

        fwrite($arquivo_saida, 'TOTAL_CLIENTES_LIGARAM: '.$total.PHP_EOL);
        fwrite($arquivo_saida, 'DURACAO_MEDIA:'.PHP_EOL);

        foreach ($duracao_soma as $chaveddd => $segundos) {
            fwrite($arquivo_saida, $segundos[0].": ".$segundos[1].PHP_EOL);
        }

        fwrite($arquivo_saida, 'TOTAL_CLIENTES_LIGARAM_OUTRO_DDD: '.$outro_ddd.PHP_EOL);
        
        fclose($arquivo_saida); ?>

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Arquivo Pronto</p>
            <hr>
            <p class="mb-0">Seu relatório foi gerado com sucesso! Eles está disponível no arquivo <strong>saida.txt</strong>, na raíz do programa.</p>
            <p class="mb-0">Você pode <a href="index.php" class="alert-link">voltar</a> para a página inicial e carregue um novo arquivo.</p>
        </div>

    <?php
    } else { ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro:</h4>
            <p>Arquivo vazio</p>
            <hr>
            <p class="mb-0"><a href="index.php" class="alert-link">Volte</a> para a página inicial e carregue um arquivo válido</p>
        </div>
    <?php }
?>
            </div>
        </div>        
    </div>
</div>
</body>
</html>