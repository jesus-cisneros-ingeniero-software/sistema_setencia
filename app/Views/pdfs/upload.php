<form action=<?= base_url('/pdfs/store'); ?> method="post" enctype="multipart/form-data">

  <label for="pdf_file" class="form-label">Selecciona un archivo PDF:</label>
  <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required>
  <br><br>
  <button type="submit">Subir PDF</button>
</form>