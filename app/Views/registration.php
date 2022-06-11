<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm border-1 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Registration
                    </h3>
                </div>
                <div class="card-body">
                    <form action="register/save" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-floating mb-3">
                            <input class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" type="text" value="<?= old('fullname') ?>" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('fullname'); ?>
                            </div>
                            <label for="inputEmail">Fullname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" type="number" min="0" value="<?= old('phone') ?>" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone'); ?>
                            </div>
                            <label for="inputEmail">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" type="email" value="<?= old('email') ?>" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" type="password" value="<?= old('password') ?>" required />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="/login">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>