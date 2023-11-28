<?php
    $valor = "R$ 1.234,56";
    $valor = str_replace("R$ ", "", $valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", ".", $valor);

    var_dump ($valor);

    $sql = "SELECT `id_mov`, m.`Data`, `QntdAtual`, `QntdModificada`, `QntdAtual` + `QntdModificada` 'Saldo', m.`Produto_id`, `Usuario_id`, `Funcionario_id` FROM `movimentacao` m, (SELECT MAX(Data) 'Data', Produto_id FROM movimentacao GROUP BY Produto_id) r WHERE
    m.Data = r.Data AND m.Produto_id = r.Produto_id
    ORDER BY m.Produto_id
    ;";