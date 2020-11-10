<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('images/bg/2.jpg'); ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title"><?= $user['username']; ?></h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="/">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">User</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__product__details pt--120 pb--100 bg__white">
    <div class="container">
        <div class="row">
            <form action="/user/update/<?= $user['id']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                <input type="hidden" name="avatarLama" value="<?= $user['avatar']; ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $user['username'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email'] ?>">
                    <div class=" invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Avatar" class="form-control-label" style="float:left;">Avatar</label><br>
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/uploads/<?= $user['avatar']; ?>" alt="" class="img-thumbnail img-preview" style="width: 500px;height:300px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-file mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('avatar')) ? 'is-invalid' : ''; ?>" id="avatar" id="avatar" name="avatar" onchange="previewAvatar()" value="<?= (old('avatar')) ? old('avatar') : $user['avatar'] ?>">
                                <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('avatar'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-edt-prfl">Ubah</button>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>