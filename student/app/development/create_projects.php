


<div class="container">
	<p>hier mag je niet komen als je niet ingelogd bent en de rol als development hebt...</p>

	<form method="post" action="index.php" role="form" class="users-form col-md-8 col-md-offset-2">
		<fieldset>
		<legend>Creëer project</legend>

		<ul>
			<?php  
			// succes of fail message
			if (isset($_GET['msg'])) {
				echo '<li>' .  htmlspecialchars($_GET['msg']) . '</li>';
			}
			?>
			</ul>
			<div class="createProjectForm">
				<div class="form-group col-md-4">
					<label for="company_name">Company name</label>
					<input type="company_name" name="company_name" id="company_name" class="form-control">	
				</div>
				<div class="form-group col-md-4">
					<label for="address">Address</label>
					<input type="address" name="address" id="address" class="form-control">	
				</div>
				<div class="form-group col-md-4">
					<label for="postcode">Postcode</label>
					<input type="postcode" name="postcode" id="postcode" class="form-control">	
				</div>
				<div class="form-group col-md-4">
					<label for="residence">Residence</label>
					<input type="residence" name="residence" id="residence" class="form-control">	
				</div>
				<div class="form-group col-md-4">
					<label for="contact_persons">Contact persons</label>
					<input type="contact_persons" name="contact_persons" id="contact_persons" class="form-control">	
				</div>
				<div class="form-group col-md-4">
					<label for="telephone_number">Telephone Number</label>
					<input type="telephone_number" name="telephone_number" id="telephone_number" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="fax_number">Fax Number</label>
					<input type="fax_number" name="fax_number" id="fax_number" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="maintenance_contract">Maintenance Contract</label>
					<input type="maintenance_contract" name="maintenance_contract" id="maintenance_contract" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="open_projects">Open projects</label>
					<input type="open_projects" name="open_projects" id="open_projects" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="applications">Applications</label>
					<input type="applications" name="applications" id="applications" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="hardware">Hardware</label>
					<input type="hardware" name="hardware" id="hardware" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="software">Software</label>
					<input type="software" name="software" id="software" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="appointments">Appointments</label>
					<input type="appointments" name="appointments" id="appointments" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<label for="internal_contact_person">Internal contact person</label>
					<input type="internal_contact_persond" name="internal_contact_person" id="internal_contact_person" class="form-control">
				</div>
				
				<div class="form-group col-md-4">
					<input type="submit" value="Maak project aan" name="create_projects" class="btn btn-large">
				</div>
			</div>
		</fieldset>
	</form>
</div>

