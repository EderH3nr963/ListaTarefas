<style>
    .box-table {
        display: flex;
        justify-content: center;
    }
    .table {
        width: 50%;
    }
</style>

<div class="box-table">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Data de Criacao</th>
                <th scope="col">Data da Tarefa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($tarefas as $key => $tarefa) : ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $tarefa->getDataCriacao() ?></td>
                    <td><?= $tarefa->getDataTarefa() ?></td>
                    <td><?= $tarefa->getDescricao() ?></td>
                    <td><a href="/delete?id=<?= $tarefa->getID() ?>" class="btn btn-danger">X</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>