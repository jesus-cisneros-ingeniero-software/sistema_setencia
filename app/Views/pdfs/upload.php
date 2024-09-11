<?= $this->extend('Complementos/Master'); ?>
<?= $this->section('Title') ?>LOGIN<?= $this->endSection() ?>

<?= $this->section('MainContent'); ?>
<h2>Subir un archivo PDF</h2>

<?php if (session()->get('error')): ?>
  <div style="color:red;">
    <?= session()->get('error') ?>
  </div>
<?php endif; ?>

<form action=<?= base_url('/pdfs/store'); ?> method="post" enctype="multipart/form-data">
  <label for="pdf_file">Selecciona un archivo PDF:</label>
  <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required>
  <br><br>
  <button type="submit">Subir PDF</button>
</form>
<?= $this->endSection(); ?>

<?= $this->section('FooterContent'); ?>
<script src="<?= base_url(); ?>/assets/js/functions_pedido.js"></script>
<script src="<?= base_url(); ?>/assets/js/functions_admin.js"></script>
<?= $this->endSection(); ?>