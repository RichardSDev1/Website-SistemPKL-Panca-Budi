<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3><?= $title ?? '' ?></h3>
<hr>

<?= $this->renderSection('body') ?>

<?= $this->endSection() ?>