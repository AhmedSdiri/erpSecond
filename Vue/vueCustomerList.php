<?php
include('../header.php');
include('../functions.php');
include('../Modele/Customer.php');

?>

<h1>Liste des Clients</h1>
<hr>

<div class="row">
	
	<div class="col-xs-12">
		<div id="response" class="alert alert-success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<div class="message"></div>
		</div>
	
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Client</h4>
			</div>
			<div class="panel-body form-group form-group-sm">
				//using the getter of the model Customer
                <?php $customer = new Customer();
                $customer->getCustomers();
                ?>
			</div>
		</div>
	</div>
<div>

<div id="delete_customer" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Supprimer Client</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ce client?</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Supprimer</button>
		<button type="button" data-dismiss="modal" class="btn">Annuler</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
	include('../footer.php');
?>