<?php

require 'auth.php';
require 'config.php';

/* TOTAL EVENTS */

$eventStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM events
");

$eventStmt->execute();

$totalEvents = $eventStmt->fetch()['total'];

/* TOTAL GALLERY IMAGES */

$galleryStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM gallery_images
");

$galleryStmt->execute();

$totalGallery = $galleryStmt->fetch()['total'];

/* TOTAL HOME SLIDERS */

$sliderStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM info_slider
");

$sliderStmt->execute();

$totalSlider = $sliderStmt->fetch()['total'];

/* TOTAL ENQUIRIES */

$enquiryStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM admission_enquiries
");

$enquiryStmt->execute();

$totalEnquiry = $enquiryStmt->fetch()['total'];

/* TOTAL CONTACTS */

$contactStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM contact_messages
");

$contactStmt->execute();

$totalContacts = $contactStmt->fetch()['total'];

/* TOTAL FEATURES */

$featureStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM school_features
");

$featureStmt->execute();

$totalFeatures = $featureStmt->fetch()['total'];

/* TOTAL NOTICES */

$noticeStmt = $pdo->prepare("
SELECT COUNT(*) as total FROM news_notices
");

$noticeStmt->execute();

$totalNotices = $noticeStmt->fetch()['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    background:#f4f7fb;

    font-family:'Poppins',sans-serif;

    overflow-x:hidden;
}

/* SIDEBAR */

.sidebar{

    width:280px;

    height:100vh;

    background:#071c3c;

    position:fixed;

    left:0;

    top:0;

    padding:25px;

    overflow-y:auto;

    transition:.3s ease;

    z-index:99999;
}

.logo{

    color:#fff;

    font-size:28px;

    font-weight:700;

    margin-bottom:35px;
}

.sidebar a{

    display:flex;

    align-items:center;

    gap:14px;

    color:#dfe7ff;

    text-decoration:none;

    padding:14px 16px;

    border-radius:14px;

    margin-bottom:12px;

    transition:.3s;

    font-size:15px;

    font-weight:500;
}

.sidebar a:hover{

    background:#d4a017;

    color:#071c3c;
}

.sidebar a i{

    width:22px;

    text-align:center;
}

/* CLOSE BUTTON */

.close-sidebar{

    position:absolute;

    top:20px;

    right:20px;

    width:42px;

    height:42px;

    border-radius:12px;

    background:#d4a017;

    color:#071c3c;

    display:none;

    align-items:center;

    justify-content:center;

    cursor:pointer;

    font-size:22px;

    font-weight:bold;
}

/* MAIN */

.main{

    margin-left:280px;

    transition:.3s;
}

/* TOPBAR */

.topbar{

    background:#fff;

    padding:18px 30px;

    display:flex;

    justify-content:space-between;

    /* flex-direction: row-reverse; */

    align-items:center;

    box-shadow:0 2px 15px rgba(0,0,0,.05);
}

.toggle-btn{

    width:45px;

    height:45px;

    border:none;

    border-radius:12px;

    background:#071c3c;

    color:#fff;

    font-size:18px;

    display:none;
}

.topbar h4{

    margin:0;

    font-size:22px;

    font-weight:600;

    color:#071c3c;
}

.admin-info{

    font-size:15px;

    color:#666;
}

/* CONTENT */

.content{

    padding:30px;
}

/* CARDS */

.cards{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:25px;
}

.dashboard-card{

    background:#fff;

    padding:28px;

    border-radius:24px;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

    transition:.3s;
}

.dashboard-card:hover{

    transform:translateY(-6px);
}

.card-icon{

    width:70px;

    height:70px;

    border-radius:18px;

    background:#f5f0df;

    display:flex;

    align-items:center;

    justify-content:center;

    margin-bottom:20px;
}

.card-icon i{

    font-size:28px;

    color:#d4a017;
}

.dashboard-card h2{

    font-size:34px;

    font-weight:700;

    color:#071c3c;

    margin-bottom:8px;
}

.dashboard-card p{

    margin:0;

    font-size:15px;

    color:#777;
}

/* RESPONSIVE */

@media(max-width:1200px){

    .cards{

        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

    .sidebar{

        left:-100%;

        width:280px;
    }

    .sidebar.show{

        left:0;
    }

    .close-sidebar{

        display:flex;
    }

    .main{

        margin-left:0;

        width:100%;
    }

    .topbar{

        padding:15px;

        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .topbar h4{

        font-size:18px;

        line-height:1.4;

        margin: 0;
        
    }

    .admin-info{

        display:none;
    }

    .toggle-btn{

        display:flex;

        align-items:center;

        justify-content:center;

        flex-shrink:0;
    }

    .cards{

        grid-template-columns:1fr;
    }

    .content{

        padding:15px;
    }
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar"
id="sidebar">

<div class="close-sidebar"
id="closeSidebar">

<i class="fa-solid fa-xmark"></i>

</div>

<div class="logo">

ADMIN PANEL

</div>

<a href="dashboard.php">
<i class="fa-solid fa-gauge"></i>
Dashboard
</a>

<a href="add-event.php">
<i class="fa-solid fa-calendar"></i>
Add Event
</a>

<a href="manage-events.php">
<i class="fa-solid fa-list"></i>
Manage Events
</a>

<a href="add-feature.php">
<i class="fa-solid fa-star"></i>
Add Features
</a>

<a href="manage-features.php">
<i class="fa-solid fa-list"></i>
Manage Features
</a>

<a href="add-notice.php">
<i class="fa-solid fa-bullhorn"></i>
Add Notice
</a>

<a href="manage-notice.php">
<i class="fa-solid fa-list"></i>
Manage Notices
</a>

<a href="slider/add.php">
<i class="fa-solid fa-plus"></i>
Add Hero Slider
</a>

<a href="slider/manage.php">
<i class="fa-solid fa-sliders"></i>
Manage Hero Slider
</a>

<a href="add-gallery.php">
<i class="fa-solid fa-image"></i>
Add Home Gallery
</a>

<a href="manage-home-gallery.php">
<i class="fa-solid fa-list"></i>
Manage Home Gallery
</a>

<a href="add-gallery-image.php">
<i class="fa-solid fa-images"></i>
Add Gallery Images
</a>

<a href="manage-gallery.php">
<i class="fa-solid fa-list"></i>
Manage Gallery
</a>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'super_admin'){ ?>

<a href="add-admin.php">
<i class="fa-solid fa-user-plus"></i>
Add Admin
</a>

<a href="manage-admins.php">
<i class="fa-solid fa-users"></i>
Manage Admins
</a>

<?php } ?>

<a href="logout.php">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<h4>

Welcome,
<?= $_SESSION['admin'] ?>

</h4>

<button class="toggle-btn"
id="toggleBtn">

<i class="fa-solid fa-bars"></i>

</button>


<div class="admin-info">

R B T Inter College Khabri

</div>

</div>

<!-- CONTENT -->

<div class="content">

<div class="cards">

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-calendar"></i>

</div>

<h2><?= $totalEvents ?></h2>

<p>Total Events</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-images"></i>

</div>

<h2><?= $totalGallery ?></h2>

<p>Gallery Images</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-sliders"></i>

</div>

<h2><?= $totalSlider ?></h2>

<p>Home Sliders</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-envelope"></i>

</div>

<h2><?= $totalEnquiry ?></h2>

<p>Admission Enquiries</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-phone"></i>

</div>

<h2><?= $totalContacts ?></h2>

<p>Contact Messages</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-star"></i>

</div>

<h2><?= $totalFeatures ?></h2>

<p>School Features</p>

</div>

<div class="dashboard-card">

<div class="card-icon">

<i class="fa-solid fa-bullhorn"></i>

</div>

<h2><?= $totalNotices ?></h2>

<p>News & Notices</p>

</div>

</div>

</div>

</div>

<!-- JS -->

<script>

const toggleBtn =
document.getElementById('toggleBtn');

const sidebar =
document.getElementById('sidebar');

const closeSidebar =
document.getElementById('closeSidebar');

toggleBtn.addEventListener('click',()=>{

sidebar.classList.add('show');

});

closeSidebar.addEventListener('click',()=>{

sidebar.classList.remove('show');

});

</script>

</body>
</html>