<?= $this->extend('frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="main-container">
    <div class="containerLeft">
        <h1 class="tagline">Let's Exchange Your Stuff</h1>
    </div>
    <div class="containerRight">
        <div class="font signup">
            Member already? <a href="<?= base_url() ?>/auth/login">Sign in</a>
        </div>
        <div class="form">
            <form id="formRegister">
                <div class="font title">
                    Sign Up to Barterin
                </div>
                <div class="form-body">
                    <div class="group-name">
                        <div class="form-group field-name">
                            <label class="mt-3 fw-bold">Name</label>
                            <input class="form-control mt-1 shadow-none" type="text" name="fullname" autofocus>
                            <div id="validate_fullname"></div>
                        </div>
                        <div class="form-group field-username">
                            <label class="mt-3 fw-bold">Username</label>
                            <input class="form-control mt-1 shadow-none" type="text" name="username">
                            <div id="validate_username"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mt-3 fw-bold">Email</label>
                        <input class="form-control mt-1 shadow-none" type="text" name="email">
                        <div id="validate_email"></div>
                    </div>
                    <div class="form-group">
                        <label class="mt-3 fw-bold">Password</label>
                        <input class="form-control mt-1 shadow-none" type="password" name="password">
                        <div id="validate_password"></div>
                    </div>
                    <input class="btn btn-submit" type="submit" value="Create Account">
                </div>
            </form>
        </div>
    </div>
</div>

<loadcss-register></loadcss-register>
<loadjs-register></loadjs-register>
<?= $this->endSection(); ?>