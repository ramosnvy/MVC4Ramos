<?php include __DIR__ . '/../comeco-html.php'; ?>

    <form action="/realiza-login" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control">
        </div>
        <button class="btn btn-primary">Entrar</button>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>