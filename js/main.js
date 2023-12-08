
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-user').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('user');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Usuário: ' + id);
    modal.find('#confirm').attr('href', 'deleteUser.php?id=' + id);
  })

  $('#delete-funcionario').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('funcionario');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Colaborador: ' + id);
    modal.find('#confirm').attr('href', 'deleteFuncionario.php?id=' + id);

  })

  $('#delete-modal').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('fornecedor');
    
    var modal = $(this);
    modal.find('.modal-title').text('Excluir Fornecedor: ' + id);
    modal.find('#confirm').attr('href', 'deleteFornecedor.php?id=' + id);
  })

  $('#logout-modal').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data('logout');
    
    var modal = $(this);
    modal.find('.modal-title').text('Sair ');
    modal.find('#confirm').attr('href', '../index.php');
  })