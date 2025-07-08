<?php
session_start();
$conn = new mysqli("localhost", "root", "", "aero_dairy");
$program = "Dairy Farming";
include 'track_view.php';
if (!$conn->connect_error) {
    $stmt = $conn->prepare("INSERT INTO program_views (program_name, user_name, email) VALUES (?, ?, ?)");
    $program = "Equipment & Technology"; // You can change this depending on the page
    $user = $_SESSION['FirstName'] ?? 'Guest';
    $email = $_SESSION['email'] ?? 'anonymous@domain.com';
    $stmt->bind_param("sss", $program, $user, $email);
    $stmt->execute();
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dairy Equipment & Technology – AERO DAIRY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{
      font-family:'Poppins',Arial,Helvetica,sans-serif;
      background:linear-gradient(135deg,#c8ff7c,#00c9b7);
      color:#fff;
      min-height:100vh;
      display:flex;
      flex-direction:column;
      padding-top:60px;
      text-align:center;
    }

    .navbar{
      position:fixed;
      top:0; left:0; width:100%;
      background:rgba(0,0,0,.85);
      display:flex;
      justify-content:flex-end;
      z-index:1000;
    }
    .navbar a{
      color:#fff;
      padding:14px 20px;
      font-weight:bold;
      text-decoration:none;
      transition:background .3s;
    }
    .navbar a:hover,
    .navbar a.active{
      background:rgba(255,255,255,.2);
    }

    .header-banner{
      background:linear-gradient(90deg,#004d00,#00a651);
      padding:50px 20px 36px;
      text-shadow:1px 1px 4px rgba(0,0,0,.4);
    }
    .glow-title{
      font-size:44px;
      font-weight:800;
      animation:colorCycle 10s linear infinite;
    }
    .header-banner p{
      font-size:20px;
      max-width:820px;
      margin:12px auto 0;
    }

    .back-btn{
      position:relative;
      display:inline-block;
      margin:28px auto 0;
      padding:10px 26px;
      background:#00695c;
      border:none;
      border-radius:8px;
      font-size:16px;
      font-weight:600;
      color:#fff;
      cursor:pointer;
      transition:background .3s,transform .3s;
    }
    .back-btn:hover{
      background:#00a88e;
      transform:scale(1.05);
    }
    .back-btn:before{content:"← ";}

    .card{
      max-width:940px;
      margin:40px auto 60px;
      background:linear-gradient(135deg,rgba(46,125,50,.90),rgba(196,79,255,.90));
      backdrop-filter:blur(10px);
      border:2px solid rgba(255,255,255,.15);
      border-radius:16px;
      box-shadow:0 10px 28px rgba(0,0,0,.24);
      text-align:left;
      color:#fff;
      overflow:hidden;
      animation:fUp .8s ease both;
    }
    .card h2{
      background:#732bff;
      padding:18px 24px;
      font-size:26px;
    }
    .card section{
      padding:22px 30px;
    }
    .card section:not(:last-child){
      border-bottom:1px solid rgba(255,255,255,.18);
    }
    .card h3{
      color:#cddc39;
      margin-bottom:12px;
    }
    .card p, .card li{
      font-size:18px;
      line-height:1.65;
      margin-bottom:10px;
    }
    .card ul{
      padding-left:24px;
      list-style:square;
    }

    .apply-btn{
      display:inline-block;
      margin:30px auto 38px;
      padding:12px 36px;
      background:linear-gradient(135deg,#2e7d32,#732bff);
      border:none;
      border-radius:9px;
      font-size:19px;
      color:#fff;
      cursor:pointer;
      transition:background .25s,transform .25s;
    }
    .apply-btn:hover{
      background:linear-gradient(135deg,#cddc39,#c44fff);
      transform:scale(1.06);
    }

    footer{
      margin-top:auto;
      background:rgba(0,0,0,.85);
      font-size:14px;
      padding:14px;
      color:#fff;
    }

    @keyframes fUp{
      from{opacity:0;transform:translateY(40px)}
      to{opacity:1;transform:translateY(0)}
    }
    @keyframes colorCycle{
      0%{color:#81c784}
      25%{color:#80cbc4}
      50%{color:#ffb74d}
      75%{color:#ba68c8}
      100%{color:#81c784}
    }

    @media(max-width:600px){
      .navbar a{padding:12px 14px;font-size:14px}
      .glow-title{font-size:32px}
      .card h2{font-size:22px}
      .card p, .card li{font-size:16px}
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
     <a href="dashboard.php">Home</a>
	  <a href="report.html">Report</a>
     <a href="admission.html">Admission</a>
     <a href="permits.html">Permits</a>
	 <a href="resources.html">Resources</a>
     <a href="programs.html" class="active">Programs</a>
     <a href="contact.html">Contact Us</a>
     <a href="about.html">About Us</a>
     <a href="logout.php">Logout</a>
</nav>

<!-- HEADER -->
<header class="header-banner">
  <h1 class="glow-title">Dairy Equipment & Technology</h1>
  <p>Empower your dairy operations through modern equipment, IoT, automation, and smart-tech integration.</p>
</header>

<!-- BACK BUTTON -->
<button class="back-btn" onclick="window.location.href='programs.html'">Back to Programs</button>

<!-- CARD CONTENT -->
<article class="card">
  <h2>Program Details</h2>

  <section>
    <h3>Overview</h3>
    <p>This program equips learners with hands-on skills to operate, maintain, and optimize modern dairy equipment. Explore automation systems, sensor integration, preventive maintenance, and equipment calibration for efficient milk production.</p>
  </section>

  <section>
    <h3>Learning Outcomes</h3>
    <ul>
      <li>Install and troubleshoot milking machines, chilling systems, and pasteurizers.</li>
      <li>Apply IoT technologies and smart sensors in dairy production.</li>
      <li>Implement preventive maintenance strategies to minimize downtime.</li>
      <li>Calibrate and validate milk analyzers and quality-testing instruments.</li>
    </ul>
  </section>

  <section>
    <h3>Curriculum Highlights</h3>
    <ul>
      <li>Milking System Design & Operation</li>
      <li>Milk Cooling and Storage Technology</li>
      <li>Sensor Networks & Data Logging in Dairy</li>
      <li>Automation and Smart Dairy Equipment</li>
      <li>Maintenance, Safety & Compliance</li>
    </ul>
  </section>

  <section>
    <h3>Practical Activities</h3>
    <p>Students engage in lab sessions with milk-flow sensors, pulsators, in-line filters, and automation control panels. They’ll maintain chilling units and validate quality testing tools.</p>
  </section>

  <section>
    <h3>Career Opportunities</h3>
    <p>Work as dairy equipment technicians, process automation specialists, IoT field engineers, or quality systems operators in dairy companies and cooperatives.</p>
  </section>
  <!-- Meta SEO Tags -->
<meta name="description" content="AERO DAIRY is a modern, sustainable dairy education and training platform offering programs in dairy farming, milk processing, animal health and more in Kenya.">
<meta name="keywords" content="AERO DAIRY, Dairy Farming, Milk Production, Animal Health, Dairy Technology, Kenya Dairy Education">
<meta name="author" content="AERO DAIRY Team">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.aerodairy.co.ke/" />


  <button class="apply-btn" onclick="alert('Apply modal coming soon!')">Apply Now</button>
</article>

<<footer style="background:#014d00; color:#eee; padding:8px 0; font-size:0.78rem;">
  <div style="display: flex; justify-content: space-between; flex-wrap: wrap; align-items: center; width: 92%; margin: auto; gap: 10px;">

    <!-- Quick Links Left -->
    <div style="display: flex; gap: 18px; flex-wrap: wrap;">
      <a href="index.html" style="color:#eee; text-decoration:none;"><i class="fas fa-home"></i> Home</a>
      <a href="report.html" style="color:#eee; text-decoration:none;"><i class="fas fa-chart-line"></i> Report</a>
      <a href="admission.html" style="color:#eee; text-decoration:none;"><i class="fas fa-user-graduate"></i> Admissions</a>
      <a href="permits.html" style="color:#eee; text-decoration:none;"><i class="fas fa-id-badge"></i> Permits</a>
      <a href="resources.html" style="color:#eee; text-decoration:none;"><i class="fas fa-box-open"></i> Resources</a>
      <a href="programs.html" style="color:#eee; text-decoration:none;"><i class="fas fa-book-open"></i> Programs</a>
      <a href="contact.html" style="color:#eee; text-decoration:none;"><i class="fas fa-envelope"></i> Contact</a>
      <a href="about.html" style="color:#eee; text-decoration:none;"><i class="fas fa-circle-info"></i> About</a>
      <a href="logout.html" style="color:#eee; text-decoration:none;"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Socials Right -->
    <div style="display: flex; gap: 16px; flex-wrap: wrap;">
      <span><i class="fab fa-facebook"></i> Facebook – @aerodairykenya</span>
      <span><i class="fab fa-twitter"></i> Twitter – @aerodairyke</span>
      <span><i class="fab fa-instagram"></i> Instagram – @aerodairy_official</span>
      <span><i class="fab fa-youtube"></i> YouTube – AERO DAIRY</span>
      <span><i class="fab fa-whatsapp"></i> WhatsApp – +254 719 594 705</span>
      <span><i class="fab fa-tiktok"></i> TikTok – @aerodairy_ke</span>
    </div>
  </div>

  <!-- Copyright -->
  <div style="text-align:center; margin-top:4px; font-size:0.72rem; color:#ccc;">
    © 2025 AERO DAIRY. All rights reserved.
  </div>
</footer>

</body>
</html>
