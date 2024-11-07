<!DOCTYPE html>


    <html>


      <body>
     <!-- The form from the beginning with values populated  -->


      <form action="index.php?action=update&id=<?php echo $tinTuc['id_tin_tuc']; ?>" method="post"> 


    <div class="mb-3">
        <label for="tieu_de" class="form-label">Tiêu đề:</label>
        <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="<?php echo htmlspecialchars($tinTuc['tieu_de']); ?>" required> 
    </div>



    </form>


    </html>