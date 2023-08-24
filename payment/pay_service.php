<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `mechanics_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
        }
    }
}
?>

<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"> Pay Service</h3>
	</div>
	<div class="card-body">
		<form action="" id="mechanic-form">
			<input type="hidden" name ="id" value="">
			<div class="form-group">
				<label for="name" class="control-label">Owner Name</label>
                <input name="name" type="text" class="form-control rounded-0" value="" required>
			</div>
            <div class="form-group">
				<label for="contact" class="control-label">Owner Contact</label>
                <input name="contact"  type="text" class="form-control rounded-0" value="" required>
			</div>
            <div class="form-group">
				<label for="email" class="control-label">Service</label>
                <input name="email" type="email" class="form-control rounded-0" value="" required>
			</div>
			 <div class="form-group">
				<label for="price" class="control-label">Amount</label>
                <input name="price" type="number" class="form-control rounded-0" value="" required>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="mechanic-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=payment">Cancel</a>
	</div>
</div>
