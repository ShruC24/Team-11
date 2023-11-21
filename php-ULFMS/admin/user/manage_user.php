<!-- <?php 
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}' ");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-navy">
	<div class="card-body">
		<div class="container-fluid pt-4">
			<div id="msg"></div>
			<form action="" id="manage-user">	
				<input type="hidden" name="id" value="<?= isset($meta['id']) ? $meta['id'] : '' ?>">
				<div class="form-group">
					<label for="name">First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="name">Middle Name</label>
					<input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>">
				</div>
				<div class="form-group">
					<label for="name">Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
				</div>
				<div class="form-group">
					<label for="password"><?= isset($meta['id']) ? "New" : "" ?> Password</label>
					<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                    <?php if(isset($meta['id'])): ?>
					<small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
				</div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                    <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Administrator</option>
                    <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
                    </select>
                </div>
				<div class="form-group">
					<label for="" class="control-label">Avatar</label>
					<div class="custom-file">
		              <input type="file" class="form-control" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">
		              <label class="custom-file-label" for="customFile">Choose file</label>
		            </div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary bg-gradient-teal border-0 rounded-0 mr-3" form="manage-user">Save User Details</button>
					<a href="./?page=user/list" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
			$('#cimg').attr('src', "<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>");
		}
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
					location.href='./?page=user/list'
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_loader()
				}
			}
		})
	})

</script> -->

<!-- <?php 
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}' ");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}
?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-body">
        <div class="container-fluid pt-4">
            <div id="msg"></div>
            <form action="" id="manage-user">   
                <input type="hidden" name="id" value="<?= isset($meta['id']) ? $meta['id'] : '' ?>">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" pattern="[a-zA-Z]+" title="First name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" pattern="[a-zA-Z]+" title="Last name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" pattern="[a-zA-Z]+" title="Username must contain only alphabets (letters)" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
                    <?php if (!empty($meta['email']) && !filter_var($meta['email'], FILTER_VALIDATE_EMAIL)): ?>
                        <small class="text-danger"><i>Invalid email format</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password"><?= isset($meta['id']) ? "New" : "" ?> Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" pattern="^(?!password|1234|password123|qwerty|admin|letmein|welcome|12345|123456|1234567|12345678|123456789|1234567890|test|abc123|abcdef|aaaaaa|aaaaaaa|password1|123123|admin123|root123|administrator|password1234$)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,}" title="Password must be at least 8 characters long and include at least one special character. Avoid using common weak passwords." required>
                    <?php if(isset($meta['id'])): ?>
                    <small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                        <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Administrator</option>
                        <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Avatar</label>
                    <div class="custom-file">
                      <input type="file" class="form-control" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-md-12">
            <div class="row">
                <button class="btn btn-sm btn-primary bg-gradient-teal border-0 rounded-0 mr-3" form="manage-user" onclick="return validateFields()">Save User Details</button>
                <a href="./?page=user/list" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
<style>
    img#cimg{
        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }
</style>
<script>
    function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
            $('#cimg').attr('src', "<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>");
        }
    }

    function validateFields() {
        if (!validateUsername()) {
            return false;
        }

        if (!validateName('firstname')) {
            return false;
        }

        if (!validateName('lastname')) {
            return false;
        }

        return true;
    }

    function validateUsername() {
        var username = $('#username').val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(username)) {
            $('#msg').html('<div class="alert alert-danger">Username must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    function validateName(field) {
        var name = $('#' + field).val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(name)) {
            $('#msg').html('<div class="alert alert-danger">' + field.charAt(0).toUpperCase() + field.slice(1) + ' must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    $('#manage-user').submit(function(e){
        e.preventDefault();
        start_loader()
        $.ajax({
            url:_base_url_+'classes/Users.php?f=save',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    location.href='./?page=user/list'
                }else{
                    $('#msg').html('<div class="alert alert-danger">Username or Email already exists</div>')
                    end_loader()
                }
            }
        })
    })
</script> -->


<!-- MAIN
<?php 
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}' ");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}
?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-body">
        <div class="container-fluid pt-4">
            <div id="msg"></div>
            <form action="" id="manage-user">   
                <input type="hidden" name="id" value="<?= isset($meta['id']) ? $meta['id'] : '' ?>">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" pattern="[a-zA-Z]+" title="First name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" pattern="[a-zA-Z]+" title="Last name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" pattern="[a-zA-Z]+" title="Username must contain only alphabets (letters)" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
                    <?php if (!empty($meta['email']) && !filter_var($meta['email'], FILTER_VALIDATE_EMAIL)): ?>
                        <small class="text-danger"><i>Invalid email format</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password"><?= isset($meta['id']) ? "New" : "" ?> Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" pattern="^(?!password|1234|password123|qwerty|admin|letmein|welcome|12345|123456|1234567|12345678|123456789|1234567890|test|abc123|abcdef|aaaaaa|aaaaaaa|password1|123123|admin123|root123|administrator|password1234$)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,}" title="Password must be at least 8 characters long and include at least one special character. Avoid using common weak passwords." required>
                    <?php if(isset($meta['id'])): ?>
                    <small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                        <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Administrator</option>
                        <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Avatar</label>
                    <div class="custom-file">
                      <input type="file" class="form-control" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-md-12">
            <div class="row">
                <button class="btn btn-sm btn-primary bg-gradient-teal border-0 rounded-0 mr-3" form="manage-user" onclick="return validateFields()">Save User Details</button>
                <a href="./?page=user/list" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
<style>
    img#cimg{
        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }
</style>
<script>
    function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
            $('#cimg').attr('src', "<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>");
        }
    }

    function validateFields() {
        if (!validateUsername()) {
            return false;
        }

        if (!validateName('firstname')) {
            return false;
        }

        if (!validateName('lastname')) {
            return false;
        }

        return true;
    }

    function validateUsername() {
        var username = $('#username').val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(username)) {
            $('#msg').html('<div class="alert alert-danger">Username must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    function validateName(field) {
        var name = $('#' + field).val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(name)) {
            $('#msg').html('<div class="alert alert-danger">' + field.charAt(0).toUpperCase() + field.slice(1) + ' must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    $('#manage-user').submit(function(e){
        e.preventDefault();

        if (!validateFields()) {
            return;
        }

        start_loader()
        $.ajax({
            url:_base_url_+'classes/Users.php?f=save',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    location.href='./?page=user/list'
                }else{
                    $('#msg').html('<div class="alert alert-danger">Username or Email already exists</div>')
                    end_loader()
                }
            }
        })
    })
</script>

 -->
<!-- Mainest  -->
<?php 
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}' ");
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }
}
?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-body">
        <div class="container-fluid pt-4">
            <div id="msg"></div>
            <form action="" id="manage-user">   
                <input type="hidden" name="id" value="<?= isset($meta['id']) ? $meta['id'] : '' ?>">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" pattern="[a-zA-Z]+" title="First name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" pattern="[a-zA-Z]+" title="Last name must contain only alphabets (letters)" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" pattern="[a-zA-Z]+" title="Username must contain only alphabets (letters)" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required>
                    <?php if (!empty($meta['email']) && !filter_var($meta['email'], FILTER_VALIDATE_EMAIL)): ?>
                        <small class="text-danger"><i>Invalid email format</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password"><?= isset($meta['id']) ? "New" : "" ?> Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" pattern="^(?!password|1234|password123|qwerty|admin|letmein|welcome|12345|123456|1234567|12345678|123456789|1234567890|test|abc123|abcdef|aaaaaa|aaaaaaa|password1|123123|admin123|root123|administrator|password1234$)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,}" title="Password must be at least 8 characters long and include at least one special character. Avoid using common weak passwords." required>
                    <?php if(isset($meta['id'])): ?>
                    <small><i>Leave this blank if you dont want to change the password.</i></small>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="type" class="control-label">Type</label>
                    <select name="type" id="type" class="form-control form-control-sm rounded-0" required>
                        <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Administrator</option>
                        <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Avatar</label>
                    <div class="custom-file">
                      <input type="file" class="form-control" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-md-12">
            <div class="row">
                <button class="btn btn-sm btn-primary bg-gradient-teal border-0 rounded-0 mr-3" form="manage-user" onclick="return validateFields()">Save User Details</button>
                <a href="./?page=user/list" class="btn btn-sm btn-default border rounded-0" form="manage-user"><i class="fa fa-angle-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
<style>
    img#cimg{
        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }
</style>
<script>
    function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }else{
            $('#cimg').attr('src', "<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] :'') ?>");
        }
    }

    function validateFields() {
        if (!validateUsername()) {
            return false;
        }

        if (!validateName('firstname')) {
            return false;
        }

        if (!validateName('lastname')) {
            return false;
        }

        if (!validatePassword()) {
            return false;
        }

        return true;
    }

    function validateUsername() {
        var username = $('#username').val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(username)) {
            $('#msg').html('<div class="alert alert-danger">Username must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    function validateName(field) {
        var name = $('#' + field).val();
        var pattern = /^[a-zA-Z]+$/;
        if (!pattern.test(name)) {
            $('#msg').html('<div class="alert alert-danger">' + field.charAt(0).toUpperCase() + field.slice(1) + ' must contain only alphabets (letters)</div>')
            return false;
        }
        return true;
    }

    function validatePassword() {
        var password = $('#password').val();
        if (password.length < 8) {
            $('#msg').html('<div class="alert alert-danger">Password must be at least 8 characters long</div>');
            return false;
        }
        return true;
    }

    $('#manage-user').submit(function(e){
        e.preventDefault();

        if (!validateFields()) {
            return;
        }

        start_loader()
        $.ajax({
            url:_base_url_+'classes/Users.php?f=save',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    location.href='./?page=user/list'
                }else{
                    $('#msg').html('<div class="alert alert-danger">Username or Email already exists</div>')
                    end_loader()
                }
            }
        })
    })
</script>