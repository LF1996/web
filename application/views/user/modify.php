<!-- 注册-->
<div class="container">
    <center>
        <form action="<?php echo site_url('user/modify'); ?>" method="post" class="form-signin"
              style="width:600px;height:70px;text-align: left" ;>
            <h2 class="form-signin-heading" style="text-align: center;">Modify</h2>
            <?php if (isset($tip) && $tip != '') { ?>
                <div class="alert alert-danger" role="alert"><?php echo $tip; ?></div>
            <?php } ?>
            <!-- username -->
            <label for="inputEmail" class="form-group">Email</label>
            <?php echo form_error('username'); ?>
            <input name="username" type="email" value="<?php echo $_SESSION['user']->username; ?>" id="inputEmail"
                   class="form-control" placeholder="Your email" readonly>
            <br>
            <!-- nickname -->
            <label for="inputName" class="form-group">Name</label>
            <?php echo form_error('nickname'); ?>
            <input name="nickname" type="text" value="<?php echo $_SESSION['user']->nickname; ?>" id="inputName"
                   class="form-control" placeholder="Your Name" required>
            <br>
            <!-- 密码 -->
            <label for="inputPassword " class="form-group">Input Password</label>
            <?php echo form_error('password'); ?>
            <input name="password" type="password" value="<?php echo $_SESSION['user']->password; ?>" id="inputPassword "
                   class="form-control " placeholder="Input Password " required>
            <br>
            <!-- 重复密码 -->
            <label for="ReInputPassword " class="form-group">ReInput Password</label>
            <?php echo form_error('passconf'); ?>
            <input name="passconf" type="password" id="ReInputPassword "
                   class="form-control" placeholder="ReInput Password " required>
            <!-- 检查密码是否相同 -->
            <script type="text/javascript">
                function checkPasswaord() {
                    
                }
            </script>
            <br>
            <!-- phone -->
            <div class="form-group ">
                <label for="tel">Phone</label>
                <?php echo form_error('phone'); ?>
                <input name="phone" type="tel" value="<?php echo $_SESSION['user']->phone; ?>" id="phone"
                       class="form-control " placeholder="Your Phone" required>
            </div>
            <br>
            <!-- address -->
            <div class="form-group ">
                <label for="address">Address</label>
                <?php echo form_error('address'); ?>
                <input name="address" type="text" value="<?php echo $_SESSION['user']->address; ?>" id="address"
                       class="form-control " placeholder="Your Address" required>
            </div>
            <br>
            <!-- summit -->
            <button class="btn btn-lg btn-primary btn-block " type="submit">Modify</button>
        </form>
        <br>
        <br>
        <br>
        <br>
    </center>
</div>
