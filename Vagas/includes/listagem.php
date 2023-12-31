<?php

    $mensagem = '';
    if(isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

        case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
    }

    $resultados = '';

    foreach($vagas as $vaga){
    $resultados .= '<tr>
                        <td>'.$vaga->id.'</td>
                        <td>'.$vaga->titulo.'</td>
                        <td>'.$vaga->descricao.'</td>
                        <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                        <td>'.date('d/m/Y à\s H:i:s',strtotime($vaga->data)).'</td>
                        <td>
                        <a href="editar.php?id='.$vaga->id.'">
                            <button type="button" class="btn" style="background-color: #BD93F9;color: white">Editar</button>
                        </a>
                        </td>
                        <td>
                        <a href="excluir.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                        </td>
                    </tr>';
    }


    $resultados = !empty($resultados) ? $resultados : '<tr> <td colspan="6" class="text-center">Nenhuma vaga encontrada :(</td> </tr>';

?>

    

<main>

    <?=$mensagem?>

    <section>
        
        <a href="cadastrar.php">
            <button class="btn" style="background-color: #BD93F9; color: white">Nova Vaga</button>
        </a>

    </section>

    <section>

<div class="table-responsive mt-3">
    
        <div class="">
            <table class="table bg-light mt-3 rounded">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
            </table>
        </div>

</div>

    </section>

</main>