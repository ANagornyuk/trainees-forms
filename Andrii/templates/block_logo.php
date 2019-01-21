<div class="col" style="float: left;">
    <img src="images/<?php echo $image; ?>" alt="" style="width: 400px; height: 400px">
    <form method="post" enctype="multipart/form-data" action="backend/requests.php" >
        <fieldset>
            <legend>Change image</legend>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <input type="file" name="upload" required>
            <input type="submit" value="Load image">
        </fieldset>
    </form>
</div>