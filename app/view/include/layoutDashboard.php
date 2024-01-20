<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="<?=APP_URL?>public/assets/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>

.scrollable-rrrrrr {
   
    overflow-x: scroll  !important ; /* Enable horizontal scrollbar if content overflows */
    white-space: nowrap  !important  ; /* Prevent text from wrapping to the next line */
}

/* Optional: Style the scrollbar */
.scrollable-rrrrrr::-webkit-scrollbar {
    height: 12px;
}

.scrollable-rrrrrr::-webkit-scrollbar-thumb {
    background-color: #888;
}

.scrollable-rrrrrr::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}

    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="rrrrrr">
        <div class="navigation">
            <ul>
                <li>
                    <a href="<?=APP_URL?>">
                        
                        <span class="title">Wi.Ki</span>
                    </a>
                </li>

                <li>
                    <a href="<?=APP_URL?>dashboard">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?=APP_URL?>dashboard/manageuser">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">user management</span>
                    </a>
                </li>

                <li>
                    <a href="<?=APP_URL?>dashboard/managecategory">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">category management</span>
                    </a>
                </li>

                <li>
                    <a href="<?=APP_URL?>dashboard/managetag">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">tag management</span>
                    </a>
                </li>

                <li>
                    <a href="<?=APP_URL?>dashboard/managewiki">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">wiki management</span>
                    </a>
                </li>

        

                <li id="logOut" >
                    <a >
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                       
                    </label>
                </div>

                <div class="user">
                    <img src="<?=APP_URL?>public/asset/usersImage/<?=$infoUser->image?>" alt="">
                </div>
            </div>

           
            
            <?=$body?>
</div>
       
    </div>

    <!-- =========== Scripts =========  -->
    <script src="<?=APP_URL?>public/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
    <script>

$(document).ready(function () {

$("#logOut").click(() => {
const logout = "logout";
$.ajax({
    type: "POST", 
    url: "http://localhost/Wiki_PHP_MVC/signin/logout",
    data: { logout: logout, method: "POST" }, 
    success: function (response) {
        if (response === "1") {
            window.location.href = "http://localhost/Wiki_PHP_MVC/signin";
        }
    },
    error: function (error) {
        console.error("Error during logout:", error);
    }
});
});
});
</script>
</body>

</html>

