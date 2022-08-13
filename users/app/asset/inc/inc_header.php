<!-- start header -->
<header>
    <h1 class="logo">SDT <p>Projects</p>
    </h1>
    <nav>
        <ul class="list-nav">
            <li><a href="index.php" class="link-nav"><i class="bi bi-house-door-fill"></i></a></li>
            <li><a href="chat.php" class="link-nav"><i class="bi bi-chat-text"></i></a></li>
            <li><a href="posting.php" class="link-nav"><i class="bi bi-plus-square"></i></a></li>
            <li><a type="button" data-bs-toggle="modal" data-bs-target="#notifikasi" class="link-nav"><i class="bi bi-bell"></i></a></li>
            <li><a href="team.php" class="link-nav"><i class="bi bi-microsoft-teams"></i></a></li>
            <li><a href="profile.php" class="link-nav"><i class="bi bi-person-circle"></i></a></li>
            <li><a type="button" onclick="Search();" id="btn-search" class="link-nav"><i class="bi bi-search"></i></a></li>
            <li><a type="button" onclick="closeSearch();" id="btn-close-search" style="display: none;" class="link-nav"><i class="bi bi-x-lg"></i></a></li>
            <li><a href="setting.php" class="link-nav"><i class="bi bi-gear-fill"></i></a></li>
        </ul>
    </nav>
    <div style="display: flex;">
        <a type="button" id="btn-search" class="btn-nav"><i class="bi bi-search"></i></a>
        <a type="button" id="btn-close-search" style="display: none;" class="btn-nav"><i class="bi bi-x-lg"></i></a>
        <button class="btn-nav" onclick="viewSideBar();"><i class="bi bi-list" id="view-nav"></i></button>

    </div>


</header>
<!-- end header -->

<!-- sidebar -->
<div class="sidebar" style="display: none;" id="sidebar">
    <button onclick="closeSideBar();" class="btn-nav" style="float: right; margin: 10px; font-size: 30px;"><i class="bi bi-x-lg"></i></button>
    <br>
    <ul style="list-style: none;">
        <li><a href="index.php" class="link-side"><i class="bi bi-house-door-fill"> Home</i></a></li>
        <li><a href="profile.php" class="link-side"><i class="bi bi-person-circle"></i> Profile</a></li>
        <li><a href="chat.php" class="link-side"><i class="bi bi-chat-text"></i> Chat</a></li>
        <li><a href="posting.php" class="link-side"><i class="bi bi-plus-square"></i> Posting</a></li>
        <li><a href="team.php" class="link-side"><i class="bi bi-microsoft-teams"></i> Team</a></li>
        <li><a onclick="closeSideBar();" type="button" data-bs-toggle="modal" data-bs-target="#notifikasi" class="link-side"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><a href="setting.php" class="link-side"><i class="bi bi-gear-fill"></i> Setting</a></li>
    </ul>
</div>




<!-- form cari -->
<div class="cari" style="display: none;" id="cari">
    <form action="">
        <input type="text" class="input-cari" placeholder="enter to search">
    </form>
</div>



<script>
    // nav script
    function viewSideBar() {
        let sideBar = document.getElementById("sidebar");
        let btnViewSideBar = document.getElementById("view-nav")

        btnViewSideBar.setAttribute("style", "display:none;")

        sideBar.setAttribute("style", "");
    }

    function closeSideBar() {
        let sideBar = document.getElementById("sidebar");
        let btnViewSideBar = document.getElementById("view-nav")

        btnViewSideBar.setAttribute("style", "")

        sideBar.setAttribute("style", "display:none;");
    }

    // search script
    function Search() {
        let btnSearch = document.getElementById("btn-search");
        let inputSearch = document.getElementById("cari");
        let btnCloseSearch = document.getElementById("btn-close-search");

        btnSearch.setAttribute("style", "display:none;");
        btnCloseSearch.setAttribute("style", "");
        inputSearch.setAttribute("style", "");
    }


    function closeSearch() {
        let btnSearch = document.getElementById("btn-search");
        let inputSearch = document.getElementById("cari");
        let btnCloseSearch = document.getElementById("btn-close-search");

        btnSearch.setAttribute("style", "");
        btnCloseSearch.setAttribute("style", "display:none;");
        inputSearch.setAttribute("style", "display:none;");
    }
</script>