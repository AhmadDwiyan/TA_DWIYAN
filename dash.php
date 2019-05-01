<?php 
include 'konek.php';



?>

<?php
if(isset($_POST['submit'])){

    $target_dir = "assets/";
    $target_file = $target_dir.basename($_FILES['gambar_organ']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $organ = $_POST['nama_organ'];
    $deskripsi = $_POST['deskripsi'];
    $jelas = $_POST['penjelasan'];
 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar_organ"]["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". basename( $_FILES["gambar_organ"]["name"]). " has been uploaded.')";
        } else {
            echo "Sorry, there was an error uploading your file.";
            
        }
    }
    $tambah= "INSERT INTO post VALUES('','$organ','$deskripsi','$jelas','$target_file')";
    $q_tambah = mysqli_query($konek,$tambah);
 
    if(!$q_tambah){
        echo "ERROR".mysqli_error($konek);
    } else {
    
    }

    


 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/ukl_dwiyan.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="dash-admin">
<ul>
 <li><a href="#Coba">Logout</a></li>
 <li><a href="#Coba">List Data</a></li> 
 <li><a href="#Coba">Tambah Data</a></li>
 <li><a href="#Coba">Tambah User</a></li>
 <li><a href="#Coba">Info User</a></li>
 <div class="kiri">MokletIO</div>

</ul>
</nav>
<?php 
if(isset($_GET['page'])){

if($_GET['page'] == "data"){
$q = "SELECT * FROM post";
$query = mysqli_query($konek,$q);
$num = mysqli_num_rows($query);
?>
<br><br>
<table>
<tr>
<th> NO </th>
<th> Nama  Organ</th>
<th> Deskripsi </th>
<th> Aksi </th>
<?php 
if($num > 0){
    $no = 1;
while($data = mysqli_fetch_assoc($query)){
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo"<td>".$data['judul']."</td>";
    echo"<td>".$data['deskripsi']."</td>";
    echo"<td><a class='tombol' href='#'>EDIT</a> | <a class='tombol' style='background-color:firebrick;' href='dash.php?page=delete&id=".$data['id']."'>DELETE</a></td>";
    echo"</tr>";
 
}

}
}
?>
</tr>
</table>

<?php
if($_GET['page'] == 'delete' && $_GET['id']){

    $del = "DELETE  FROM post WHERE id=".$_GET['id']." ";
    $delete = mysqli_query($konek,$del);

    if($delete){

        header('location:dash.php?page=data');
    } else {
        echo "GAGAL TAMBAH DATA".mysqli_error($konek);
    }

}
?>
<?php if($_GET['page'] == 'tambah'){

?>   

<div class="form-edit">

<h1> Tambah Data </h1>
<form action="" method="post" enctype="multipart/form-data"><br>
<input type="text" name="nama_organ" placeholder="Nama Organisasi"><br>
<input type="text" name="deskripsi" placeholder="deskripsi_singkat"><br>
<input type="file" name="gambar_organ" id="gambar_organ"> <br>
<textarea name="penjelasan" style="width:85%;height:150px;margin-left:5%;" placeholder="penjelasan"></textarea><br>
<input type="submit" name="submit" value="submit">
</form>

</div>


<?php 


} ?>

<?php if($_GET['page'] == 'edit'){
if(isset($_POST['submit'])){

    $target_dir = "assets/";
    $target_file = $target_dir.basename($_FILES['gambar_organ']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $organ = $_POST['nama_organ'];
    $deskripsi = $_POST['deskripsi'];
    $jelas = $_POST['penjelasan'];
 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar_organ"]["tmp_name"], $target_file)) {
            echo "<script>alert('The file ". basename( $_FILES["gambar_organ"]["name"]). " has been uploaded.')";
        } else {
            echo "Sorry, there was an error uploading your file.";
            
            
        }
    }
    $tambah= "UPDATE post SET JUDUl='$_POST[nama_organ]', deskripsi=$_POST[deskripsi]',text='$_POST[penjelasan]',upload='$target_file' WHERE id='$_GET[id]'";
    $q_tambah = mysqli_query($konek,$tambah);
 
    if(!$q_tambah){
        echo "ERROR".mysqli_error($konek);
    } else {
    
    }

    


 }

?>   

<div class="form-edit">

<h1>  Data </h1>
<form action="" method="post" enctype="multipart/form-data"><br>
<input type="text" name="nama_organ" placeholder="Nama Organisasi"><br>
<input type="text" name="deskripsi" placeholder="deskripsi_singkat"><br>
<input type="file" name="gambar_organ" id="gambar_organ"> <br>
<textarea name="penjelasan" style="width:85%;height:150px;margin-left:5%;" placeholder="penjelasan"></textarea><br>
<input type="submit" name="edit_sub" value="submit">
</form>

</div>


<?php 


} ?>


<?php
} else {
    echo "<h1 align='center'> Welcome To Dashboard </h1>";
}
?>
</body>
</html>