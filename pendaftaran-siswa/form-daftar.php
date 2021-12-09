<!-- form daftar -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <div class="jumbotron">
        <h3>Formulir Pendaftaran Siswa Baru</h3>
        <form  action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama: </label>
                <input class="form-control" type="text" name="nama" placeholder="nama lengkap" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat: </label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
            </div>
            <div class="form-group">
                <label for="agama">Agama: </label>
                <select class="form-control" name="agama">
        <option>Islam</option>
        <option>Kristen</option>
        <option>Hindu</option>
        <option>Budha</option>
        <option>Atheis</option>
    </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input class="form-control" type="text" name="sekolah_asal" placeholder="nama sekolah" id="sekolah_asal" />
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Upload Foto</label>
                <input class="form-control" type="file" id="formFile" name="berkas" onchange="imageUploaded()">
            </div>
                <input class="form-control" type="text" name="foto" placeholder="nama sekolah" id="foto" hidden="true" />
            <button value="Daftar" name="daftar" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        let base64String = "";
  
  function imageUploaded() {
      var file = document.querySelector(
          'input[type=file]')['files'][0];
    
      var reader = new FileReader();
      console.log("next");
        
      reader.onload = function () {
          base64String = reader.result.replace("data:", "")
              .replace(/^.+,/, "");
    
          imageBase64Stringsep = base64String;
    
          // alert(imageBase64Stringsep);
          const input = document.getElementById("foto").value = imageBase64Stringsep;
          console.log(base64String);
      }
      reader.readAsDataURL(file);
  }
    
  function displayString() {
      console.log("Base64String about to be printed");
      alert(base64String);
  }
    </script>
    
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>