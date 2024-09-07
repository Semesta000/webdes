<?php
$userInfo = @$_SESSION['id_user'];
$q_data_user=mysqli_query($conn, "SELECT * FROM user WHERE id_user='$userInfo'");
$data_user=mysqli_fetch_array($q_data_user);
?>
<body>
    
    <div class="w-[95%] mx-auto md:w-[75%] lg:w-[50%] bg-gray-300 text-black rounded-lg">
        <div class="items-center">
            
        </div>
    </div>
</body>
</html>