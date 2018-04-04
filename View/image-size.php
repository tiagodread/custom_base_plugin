<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 03/04/2018
 * Time: 23:46
 */
?>

<form action="#" method="post" id="addImage" name="addImage">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header"><b>Cadastro de Imagens</b></h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nomeImagem">Nome da Imagem:</label>
                        <input type="text"  required class="form-control" id="nomeImagem" name="nomeImagem" placeholder="Ex: Destaque">
                    </div>
                    <div class="form-group">
                        <label for="larguraSize">Largura:</label>
                        <input type="text" required class="form-control" id="larguraSize" name="larguraSize" placeholder="Ex: 1140">
                    </div>
                    <div class="form-group">
                        <label for="alturaSize">Altura:</label>
                        <input type="text" required class="form-control" id="alturaSize" name="alturaSize" placeholder="Ex: 500">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </div>
        </div>
</form>
        <div class="col-md-6">
            <div class="card">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Largura</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Destaque</td>
                        <td>1140</td>
                        <td>500</td>
                        <td>
                            <button type="button" class="btn btn-warning">Editar</i></button>
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>