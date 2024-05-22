<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group' ></i></span> Data Calon Penerima PKH
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="shadow rounded-2 bg-light p-3">
            <div class="keterangan-sub mb-4">
                <span>Import Data Excel</span>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="" class="text-ubah-bobot">File</label>
                <div class="input-group w-50">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required name="excel">
                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04" name="import">Import</button>
                </div>
                <p class="text-ubah-bobot text-danger">*file harus daalam bentuk excel</p>
            </form>
        </div>
    </div> 
</section>

<?php 
	if (isset($_POST['import'])) {
		$fileName = $_FILES['excel']['name'];
		$fileExtension = explode('.', $fileName);
		$fileExtension = strtolower(end($fileExtension));

		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

		$targetDirectory = "uploads" . $newFileName;
		move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

		error_reporting(0);

		ini_set('display_errors', 0);

		require "excelReader/excel_reader2.php";
		require "excelReader/SpreadsheetReader.php";

		$reader = new SpreadsheetReader($targetDirectory);
		$conn = mysqli_connect("localhost", "root", "", "skripsi_spk");
		$x = 1;
		foreach ($reader as $key => $row) {
			$set = null;
			for ($i = 0; $i < count($row); $i++) {
				$set = $set . ", '".$row[$i]."'";
			}
			if ($x < 109) {
				mysqli_query($conn, "INSERT INTO alternatif VALUES('','',''" . $set . ")");
			}
			else{
				break;
			}
			$x++;
		}

        unlink($targetDirectory);
		echo 
		"
		<script>
		alert('Succesfully Imported');
		document.location.href = 'alternatif';
		</script>
		";
	}
?>