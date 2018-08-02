<?php include('header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 p-2">
            <div class="jumbotron p-5">
                <h1 class="display-4">Prova Versátil </h1>
                <div class="alert alert-primary">
                    <h4 class="alert-heading">Selecione um arquivo para gerar o relatório</h4>
                    <p>O arquivo deve estar formatado dentro do padrão exigido.</p>
                    <hr>
                    <form action="download.php" method="post">
                        <div class="form-group">
                            <input class="form-control-file" type="file" name="arquivo" value="Selecionar">
                        </div>
                        <input class="btn btn-primary" type="submit">
                    </form>
                </div>
            </div>
        </div>        
    </div>
</div>   
</body>
</html>