<?php
session_start();

$user = $_SESSION['username'];
$datauser = "data/user/$user.txt";

if ( !file_exists( $datauser ) ) {
    echo '<script>alert("Kamu Belum Mempunyai Catatan, Silakan mengisi data dahulu"); window.location = "isidata.php";</script>';
} else {
    $file = fopen( $datauser, "r" );
}
?>


<head>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .table {
        border: 1px solid black;
        margin: 2px auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php"?>
        <table align="center" width="50%" class="table">
            <td>
                <a>Urutkan Berdasarkan</a>
                <select id="urut" onclick="urutkan(this)">
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">Suhu</option>
                </select>
            </td>
        </table>
        <br>
        <table align="center" width="50%" height="40%" class="table">
            <td>
                <table align="center" width="90%" border="1" class="table" id="myTable">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                    </tr>
                    <?php
while (  ( $row = fgets( $file ) ) != false ) {
    $col = explode( ',', $row );
    foreach ( $col as $data ) {
        echo "<td>" . trim( $data ) . "</td>";
    }
}
?>
                </table>
            </td>
        </table>
    </div>
    <script src="main.js"></script>
</body>