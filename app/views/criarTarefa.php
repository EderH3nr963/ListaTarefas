<style>
    .box-criacao {
        display: flex;
        justify-content: center;
    }

    .box-formulario {
        width: 25%;
    }
</style>

<div class="box-criacao">
    <div class="box-formulario">
        <form method="post">
            <h1>Criar Tarefa</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Data Da Tarefa</label>
                <input type="date" name="dataTarefa" class="form-control <?= $response && $response['campo'] == 'data' ? "is-invalid" : "" ?>" id="exampleFormControlInput1">
                <?php if (isset($response) && $response['campo'] == 'data'): ?>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $response['mensagem'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label ">Descrição</label>
                <textarea class="form-control <?= $response && $response['campo'] == 'descricao' ? "is-invalid" : "" ?>" name="descricao" id="exampleFormControlTextarea1" rows="10"></textarea>
                <?php if (isset($response) && $response['campo'] == 'descricao'): ?>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $response['mensagem'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</div>