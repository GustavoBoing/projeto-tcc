
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente: ' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})

$('#delete-user-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('usuario');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Usuário: ' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})

$('#delete-animal-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('animal');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Animal: ' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})