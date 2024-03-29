<?php

include('connect.php');

$getMesg = $conn->real_escape_string($_POST['text']);

//cek user query dengan yang ada di database
$check_data = "SELECT replies FROM list_queries WHERE queries LIKE '%$getMesg%'";
$run_query = $conn->query($check_data) or die("Error");

// jika query user sama dengan yang ada dalam database maka akan dibalas sesuai query-nya
if ($run_query->num_rows > 0) {
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Silahkan pilih kategori lain yang ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>1. Barter</p>
    <p class='mb-0'>2. Donasi</p>
          <p class='mb-0'>3. Akun dan keamanan</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 1) {
    echo "
    <div class='card'>
    <div class='card-header'>
    Silahkan pilih Pertanyaan yang ingin ditanyakan 
    </div>
    <div class='card-body'>
    <p class='mb-0'>11. Apa itu Barter ?</p>
    <p class='mb-0'>12. Bagaimana cara upload Barang ?</p>
    <p class='mb-0'>13. Barang yang bisa di barter pada barterin ?</p>
    </div>
    </div>
    ";
} elseif ($getMesg == 11) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'barter adalah'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.php'>disini</a> untuk mulai transaksi barter</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>12. Bagaimana cara upload Barang ?</p>
    <p class='mb-0'>13. Barang apa yang bisa di barter pada barterin ?</p>
    <p class='mb-0'>14. Bagaimana cara barter ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 12) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'cara upload'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/barang/upload.php'>disini</a> untuk mulai mengupload barang</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>13. Barang apa yang bisa di barter ?</p>
    <p class='mb-0'>14. Bagaimana cara barter ?</p>
    <p class='mb-0'>34. Bagaimana jika terjadi penipuan?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 13) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'barang yang di barter'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.php'>disini</a> untuk mengetahui beberapa contoh barang yang sudah di posting sebelumnya</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>12. Bagaimana cara upload Barang ?</p>
    <p class='mb-0'>14. Bagaimana cara barter ?</p>
    <p class='mb-0'>34. Bagaimana jika terjadi penipuan?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 14) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'cara barter'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.php'>disini</a> untuk memulai transaksi barter </p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>12. Bagaimana cara upload Barang ?</p>
    <p class='mb-0'>14. Bagaimana cara barter ?</p>
    <p class='mb-0'>34. Bagaimana jika terjadi penipuan?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 2) {
    echo "
    <div class='card'>
    <div class='card-header'>
    Silahkan pilih Pertanyaan yang ingin ditanyakan
    </div>
    <div class='card-body'>
    <p class='mb-0'>21. Apa itu Donasi ?</p>
    <p class='mb-0'>22. Bagaimana cara Berdonasi di barterin ?</p>
    <p class='mb-0'>23. Bagaimana cara mengambil donasi ?</p>
    </div>
    </div>
    ";
} elseif ($getMesg == 21) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'donasi adalah'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/barang/upload.php'>disini</a> untuk mulai mendonasikan barang mu</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>22. Bagaimana cara Berdonasi di barterin ?</p>
    <p class='mb-0'>23. Bagaimana cara mengambil donasi ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 22) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'cara donasi'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/barang/upload.php'>disini</a> untuk mulai mendonasikan barang mu </p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>23. Bagaimana cara mengambil donasi ?</p>
    <p class='mb-0'>24. Kenapa tidak bisa mengambil donasi ?</p>
    <p class='mb-0'>25. Ongkos kirim dari donasi ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 23) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'cara mengambil donasi'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.php'>disini</a> untuk mencari barang kebutuhan mu </p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>22. Bagaimana cara Berdonasi di barterin ?</p>
    <p class='mb-0'>24. Kenapa tidak bisa mengambil donasi ?</p>
    <p class='mb-0'>25. Ongkos kirim dari donasi ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 24) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'Kenapa tidak bisa mengambil donasi'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.com'>disini</a> untuk mengetahui riwayat transaksimu</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>22. Bagaimana cara Berdonasi di barterin ?</p>
    <p class='mb-0'>23. Bagaimana cara mengambil donasi ?</p>
    <p class='mb-0'>25. Ongkos kirim dari donasi ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 25) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'Ongkos kirim dari donasi'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/home/homepage.php'>disini</a> untuk mencari barang yang kamu butuhkan</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>22. Bagaimana cara Berdonasi di barterin ?</p>
    <p class='mb-0'>23. Bagaimana cara mengambil donasi ?</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 3) {
    echo "
    <div class='card'>
    <div class='card-header'>
    Silahkan pilih Pertanyaan yang ingin ditanyakan </p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
    <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
    <p class='mb-0'>33. Bagaimana cara mengganti nomor handphone</p>
    <p class='mb-0'>34. Bagaimana cara menghindari Penipuan</p>
    <p class='mb-0'>35. Tidak Mendapatkan kode OTP</p>
    <p class='mb-0'>36. blank page website</p>
    </div>
    </div>
    ";
} elseif ($getMesg == 31) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'register'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/auth/register.php'>disini</a> untuk mendaftar di Barterin </p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
    <p class='mb-0'>33. Bagaimana cara mengganti nomor handphone</p>
    <p class='mb-0'>34. Bagaimana cara menghindari Penipuan</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 32) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'login'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/auth/login.php'>disini</a> untuk masuk kedalam aplikasi Barterin</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
    <p class='mb-0'>33. Bagaimana cara mengganti nomor handphone</p>
    <p class='mb-0'>34. Bagaimana cara menghindari Penipuan</p>
    <p class='mb-0'>35. Tidak Mendapatkan kode OTP</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 33) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'ubah nomor hp'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='frontend/userProfile/profile.php'>disini</a> untuk mengganti data dirimu</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
    <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
    <p class='mb-0'>34. Bagaimana cara menghindari Penipuan</p>
    <p class='mb-0'>35. Tidak Mendapatkan kode OTP</p>
    </div>
    </div>
          ";
} elseif ($getMesg == 34) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'penipu'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
        <div class='card-header'>
        <p class='mb-0'>Klik <a href='https://barterin.co.id/formPenipuan'>disini</a> untuk melaporkan penipuan</p>
        <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
        </div>
        <div class='card-body'>
        <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
        <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
        <p class='mb-0'>33. Bagaimana cara mengganti nomor handphone</p>
        </div>
    </div>
          ";
} elseif ($getMesg == 35) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'tidak terima otp'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
        <div class='card-header'>
        <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/auth/emailVerification.php'>disini</a> untuk kirim ulang OTP</p>
        <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
        </div>
        <div class='card-body'>
        <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
        <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
        <p class='mb-0'>33. Bagaimana cara mengganti nomor handphone</p>
        </div>
    </div>
          ";
} elseif ($getMesg == 36) {
    $read = "SELECT replies FROM list_queries WHERE queries LIKE 'blank page'";
    $run_query = $conn->query($read) or die("Error");
    $fetch_data = $run_query->fetch_assoc();
    //menyetorkan balasan ke variabel yang kemudian dikirimkan ke ajax
    $replay =  nl2br(htmlspecialchars($fetch_data['replies']));
    echo $replay;
    echo "
    <div class='card'>
    <div class='card-header'>
    <p class='mb-0'>Klik <a href='barterin-web/app/view/frontend/userProfile/profile.php'>disini</a> untuk keluar dari aplikasi Barterin</p>
    <p class='mb-0'>atau pilih pertanyaan yang mungkin ingin ditanyakan lagi</p>
    </div>
    <div class='card-body'>
    <p class='mb-0'>31. Bagaimana cara daftar atau Register di aplikasi Barterin ?</p>
    <p class='mb-0'>32. Bagaimana cara login di aplikasi Barterin ?</p>
    <p class='mb-0'>34. Bagaimana cara menghindari Penipuan</p>
    </div>
    </div>
          ";
} else {
    $queries    = $_POST['text'];

    $insert = mysqli_query($conn, "insert into list_request set queries='$queries'");
    echo "
    <div class='card'>
        <div class='card-body'>
            Maaf, aku bantu cek ya. Yuk infoin kendalanya dengan detail
        </div>
        <div class='card-body'>
            <p class='mb-0'>Dengan pilih kategori yang ingin ditanyakan
            <p class='mb-0'>1. Barter</p>
            <p class='mb-0'>2. Donasi</p>
            <p class='mb-0'>3. Akun dan keamanan</p>
        </div>
    </div>
    ";
}
