<?= $this->extend('barang/layout'); ?>
<?= $this->section('body'); ?>
<?php

?>
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
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success col-12" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="product__details__container">
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                <img src="/uploads/<?= $user['avatar']; ?>" alt="full-image" style="height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2><?= $user['username']; ?></h2>
                    </div>
                    <div class="pro__details">
                        <p>Email :<?= $user['email']; ?></p>
                    </div>
                    <div class="pro__details">
                        <p>Tanggal dibuat:<?= date("d M Y", strtotime($user['created_date'])); ?></p>
                    </div>
                    <ul class="pro__details">
                        <li>Dana :<?= "Rp." . number_format($uang[0]['jumlah'], 0, 0, '.'); ?></li>
                    </ul>
                    <a href="/user/edit/<?= $user['id']; ?>" class="btn-prfl">Edit Profile</a>
                    <hr>
                    <h1>Isi Dana</h1>
                    <form action="/user/req" method="POST">
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan nominal yang ingin di isi">
                        <input type="submit" name="submit" class="btn-dana" value="Pesan" min="1" value="1">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>