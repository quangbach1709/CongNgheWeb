<form method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label>User Name</label><br>
        <input type="text" class="form-control" name="username"
               value="<?php echo isset($user['username']) ? $user['username'] : "" ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control"
               value="<?php echo isset($user['password']) ? $user['password'] : "" ?>">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input class="form-control" type="text" name="lastname"
               value="<?php echo isset($user['lastname']) ? $user['lastname'] : "" ?>">
    </div>

    <div class="form-group">
        <label>First Name</label>
        <input class="form-control" type="text" name="firstname"
               value="<?php echo isset($user['firstname']) ? $user['firstname'] : "" ?>">
    </div>

    <div class="form-group">
        <label>Lop</label>
        <input class="form-control" type="text" name="city"
               value="<?php echo isset($user['city']) ? $user['city'] : "" ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="text" name="email"
               value="<?php echo isset($user['email']) ? $user['email'] : "" ?>">
    </div>

    <div class="form-group">
        
        <input class="form-control" type="hidden" name="course1"
               value="CSE485.202401">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
