<?php
// session_start();
require 'koneksi.php';
include "auth.php";
// Fungsi untuk memeriksa apakah kamar sudah dipesan dan belum checkout
function isRoomBooked($roomNumber) {
    global $koneksi;
    $today = date("Y-m-d");
    $query = "SELECT COUNT(*) as count FROM pemesanan WHERE kamar = '$roomNumber' AND tanggalkeluar >= '$today'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['count'] > 0;
}

// Check if the form is submitted
if (isset($_POST['pesan'])) {
    // Get the selected rooms
    $selectedRooms = isset($_POST['id_kamar']) ? $_POST['id_kamar'] : array();

    // Validate if the room is already booked and not checked out
    foreach ($selectedRooms as $roomNumber) {
        if (isRoomBooked($roomNumber)) {
            // Room is already booked and not checked out
            echo '<script>alert("Kamar ' . $roomNumber . ' sudah dipesan dan belum checkout.");</script>';
            exit();
        }
    }

    // Get other form data
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tanggalmasuk = $_POST['tanggalmasuk'];
    $tanggalkeluar = $_POST['tanggalkeluar'];
    $deposit = $_POST['deposit'];
    $bayar = $_POST['bayar'];


    
    mysqli_query($koneksi, "UPDATE data_kamar SET status_kamar = 'terisi' WHERE id_kamar = '$roomNumber'");

    // Set a session variable indicating successful booking
    $_SESSION['bookingSuccess'] = true;

    // Redirect or display a success message
    header("Location: checkin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkin2.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="http://localhost/wisma/dashboard.php#">
                    <i class="fas fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/wisma/checkin.php">
                    <i class=" fas fa-regular fa-bed"></i>
                    <span>Check in</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/wisma/laporan/laporan.php">
                    <i class="fa-solid fa-sheet-plastic"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <?php
            if ($_SESSION['role'] == 'pimpinan') {
                echo '<li>
                <a href="http://localhost/wisma/tambahuser.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Tambah user</span>
                </a>
            </li>';
            }
            ?>
            <li class="logout">
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Wisma</span>
                <h2>Sekar wangi</h2>
            </div>
        </div>
        <div class="card--container">
            <div class="chair">
                <div class="row">
                    <?php
                   
                    $query1 = "SELECT * FROM data_kamar LIMIT 3";
                    $results1=mysqli_query($conn,$query1);

                    $query2 = "SELECT * FROM data_kamar LIMIT 3 OFFSET 3";
                    $results2=mysqli_query($conn,$query2);

                    $query3 = "SELECT * FROM data_kamar LIMIT 3 OFFSET 6";
                    $results3=mysqli_query($conn,$query3);
                    
                    $query4 = "SELECT * FROM data_kamar LIMIT 3 OFFSET 9";
                    $results4=mysqli_query($conn,$query4);

                    $query5 = "SELECT * FROM data_kamar LIMIT 3 OFFSET 12";
                    $results5=mysqli_query($conn,$query5);

                    $query6 = "SELECT * FROM data_kamar LIMIT 1 OFFSET 15";
                    $results6=mysqli_query($conn,$query6);


                    echo "<table>";
                    echo"<tr>";
                    while ($row1 = mysqli_fetch_array($results1)) {
                        
                        if ($row1['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row1['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row1['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo"<tr>";
                    while ($row2 = mysqli_fetch_array($results2)) {
                        
                        if ($row2['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row2['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row2['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo"<tr>";
                     while ($row3 = mysqli_fetch_array($results3)) {
                        
                        if ($row3['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row3['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row3['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo"<tr>";
                     while ($row4 = mysqli_fetch_array($results4)) {
                        
                        if ($row4['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row4['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row4['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo"<tr>";
                     while ($row5 = mysqli_fetch_array($results5)) {
                        
                        if ($row5['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row5['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row5['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo"<tr>";
                     while ($row6 = mysqli_fetch_array($results6)) {
                        
                        if ($row6['status_kamar'] == 'terisi') {
                            echo "<td class='seat'style='background-color: green;'>" . $row6['id_kamar'] . "</td>";
                        } else {
                            echo "<td class='seat'>" . $row6['id_kamar'] . "</td>";
                        }
                    }
                    echo"</tr>";
                    echo "</table>";

                 
                    ?>
                </div>
            </div>
            <div class="kotakpemesanan">
                <header>pemesanan kamar</header>
                <form action="#" class="form" method="POST" onsubmit="return validateForm()">
                    <label for="nik">NIK</label>
                    <div class="input-box">
                        <input type="text" name="nik" id="nik" placeholder="Masukkan Nik" />
                    </div>
                    <label>NAMA</label>
                    <div class="input-box">
                        <input type="text" name="nama" placeholder="Masukkan Nama" />
                    </div>

                    <label>ALAMAT</label>
                    <div class="input-box">
                        <input type="text" name="alamat" placeholder="Masukkan Alamat" />
                    </div>

                    <div class="gender-box">
                        <label>Jenis kelamin</label>
                        <div class="gender-option">
                            <div class="gender">
                                <input type="radio" id="check-male" name="jeniskelamin" value="laki-laki"/>
                                <label for="check-male">laki-laki</label>
                            </div>
                            <div class="gender">
                                <input type="radio" id="check-female" name="jeniskelamin" value="perempuan"/>
                                <label for="check-female">perempuan</label>
                            </div>
                        </div>
                    </div>

                    <label>Kamar</label>
                    <div class="select-btn">
                        <span class="btn-text">Pilih kamar</span>
                        <span class="arrow-dwn">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                    <ul class="list-items">
                        <li class="item">
                            <input type="checkbox" name="id_kamar[]" class="checkbox" value="202">
                              
                            </input>
                            <span class="item-text">202</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="203">
                              
                            </input>
                            <span class="item-text">203</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="204">
                              
                            </input>
                            <span class="item-text">204</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="205">
                              
                            <span class="item-text">205</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="206">
                              
                            <span class="item-text">206</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="207">
                              
                            <span class="item-text">207</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="208">
                              
                            <span class="item-text">208</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="209">
                              
                            <span class="item-text">209</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="301">
                              
                            <span class="item-text">301</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="302">
                              
                            <span class="item-text">302</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="303">
                              
                            <span class="item-text">303</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="304">
                              
                            <span class="item-text">304</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="305">
                              
                            <span class="item-text">305</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="306">
                              
                            <span class="item-text">306</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="307">
                              
                            <span class="item-text">307</span>
                        </li>
                        <li class="item">
                            <input type="checkbox" class="checkbox" name="id_kamar[]" value="308"> 
                            <span class="item-text">308</span>
                        </li>
                    </ul>
                    <div class="column">
                        <label>tanggal Masuk</label>
                        <div class="input-box">
                            <input type="Date" name="tanggalmasuk" placeholder="Masukkan Deposit" />
                        </div>
                        <label>tanggal Keluar</label>
                        <div class="input-box">
                            <input type="Date" name="tanggalkeluar" placeholder="Masukkan Pembayaran" />
                        </div>
                    </div>
                    <label>Deposit</label>
                    <div class="input-box">
                        <input type="number" name="deposit" placeholder="Masukkan Deposit" />
                    </div>
                    <label>Bayar</label>
                    <div class="input-box">
                        <input type="number" name="bayar" placeholder="Masukkan Pembayaran" />
                    </div>
                    <button type="submit" name="pesan" class="btn">Pesan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="js/script.js"></script>
</body>
<script>
    function validateForm() {
        // Get the values of the input fields
        // var nikInput = document.getElementById('nik').value;
        var depositInput = document.getElementsByName('deposit')[0].value;
        var bayarInput = document.getElementsByName('bayar')[0].value;

        // // Check if the NIK contains only numeric values
        // if (!/^\d+$/.test(nikInput)) {
        //     alert('NIK harus berupa angka.');
        //     return false; // Prevent form submission
        // }

        // Check if deposit is a valid numeric value
        if (!/^\d+$/.test(depositInput)) {
            alert('Deposit harus berupa angka.');
            return false; // Prevent form submission
        }

        // Check if bayar is a valid numeric value
        if (!/^\d+$/.test(bayarInput)) {
            alert('Bayar harus berupa angka.');
            return false; // Prevent form submission
        }

        // Check if any field is empty
        var formInputs = document.querySelectorAll('.input-box input');
        for (var i = 0; i < formInputs.length; i++) {
            if (formInputs[i].value.trim() === '') {
                alert('Semua Data harus diisi.');
                return false; // Prevent form submission
            }
        }

        // Continue with form submission if all validations pass
        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        // ... (previous JavaScript code)
    });
</script>
<?php
        // Check for the session variable and display alert if successful booking
        if(isset($_SESSION['bookingSuccess']) && $_SESSION['bookingSuccess']) {
            echo '<script>alert("Ruangan berhasil dibooking!");</script>';
            // Reset the session variable
            $_SESSION['bookingSuccess'] = false;
        }
    ?>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.form');
        const checkboxes = form.querySelectorAll('.checkbox');
        const seatElements = document.querySelectorAll('.seat');

        // Function to check if a room is already booked
        function isRoomBooked(roomNumber) {
            return seatElements.some(seat => seat.textContent.trim() === roomNumber && seat.style.backgroundColor === 'green');
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const roomNumber = this.value;

                // Check if the room is already booked
                if (isRoomBooked(roomNumber)) {
                    alert('Kamar ' + roomNumber + ' sudah dipesan dan belum checkout.');
                    this.checked = false;
                }

                // Update the color of the corresponding seat element based on checkbox state
                seatElements.forEach(seat => {
                    if (seat.textContent.trim() === roomNumber) {
                        seat.style.backgroundColor = this.checked ? 'green' : '';
                    }
                });
            });
        });
    });
</script>
