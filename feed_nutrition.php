<?php
session_start();
$conn = new mysqli("localhost", "root", "", "aero_dairy");
$program = "Dairy Farming";
include 'track_view.php';
if (!$conn->connect_error) {
    $stmt = $conn->prepare("INSERT INTO program_views (program_name, user_name, email) VALUES (?, ?, ?)");
    $program = "Feed &Nutrition"; // You can change this depending on the page
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
  <title>Feed & Nutrition Management – AERO DAIRY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    :root {
      --accent1: #4a7c59;   /* Green-Purple blend */
      --accent2: #9575cd;   /* Light Purple */
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #fdf8ef;
      color: #000;
      padding-top: 60px;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      text-align: center;
    }

    .navbar {
      position: fixed;
      top: 0; left: 0; width: 100%;
      background: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(5px);
      display: flex; justify-content: flex-end;
      z-index: 1000;
    }

    .navbar a {
      color: #fff;
      padding: 14px 20px;
      font-weight: bold;
      text-decoration: none;
      transition: background 0.3s;
    }

    .navbar a:hover,
    .navbar a.active {
      background: rgba(255, 255, 255, 0.25);
    }

    .header-banner {
      background: linear-gradient(90deg, var(--accent1), var(--accent2));
      color: #fff;
      padding: 56px 20px 38px;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.35);
    }

    .glow-title {
      font-size: 44px;
      font-weight: 800;
      background: linear-gradient(270deg, #c8e6c9, var(--accent2), #d1c4e9);
      background-size: 600% 100%;
      -webkit-background-clip: text;
      color: transparent;
      animation: shine 9s linear infinite;
    }

    .header-banner p {
      font-size: 20px;
      max-width: 820px;
      margin: 10px auto 0;
    }

    .card {
      max-width: 940px;
      margin: 44px auto 70px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      overflow: hidden;
      text-align: left;
      animation: fadeUp 0.9s ease-out both;
    }

    .card h2 {
      background: var(--accent1);
      color: #fff;
      padding: 18px 26px;
      font-size: 26px;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
    }

    .card section { padding: 24px 30px; }
    .card section:not(:last-child) { border-bottom: 1px solid #eee; }
    .card h3 { color: var(--accent1); margin-bottom: 12px; font-size: 20px; }
    .card p, .card li { font-size: 18px; line-height: 1.65; margin-bottom: 10px; }
    .card ul { padding-left: 24px; list-style: square; }

    .apply-btn, .back-btn {
      display: inline-block;
      margin: 20px 10px 42px;
      padding: 13px 38px;
      background: var(--accent1);
      color: #fff;
      font-size: 19px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.25s, transform 0.25s, box-shadow 0.25s;
    }

    .apply-btn:hover,
    .back-btn:hover {
      background: #6a1b9a;
      transform: scale(1.06);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
    }

    footer {
      margin-top: auto;
      background: rgba(0, 0, 0, 0.9);
      color: #fff;
      text-align: center;
      padding: 14px;
      font-size: 14px;
    }

    @keyframes shine {
      0% { background-position: 0% 0; }
      100% { background-position: 100% 0; }
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(45px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
      .glow-title { font-size: 32px; }
      .card h2 { font-size: 22px; }
      .card p, .card li { font-size: 16px; }
      .apply-btn, .back-btn { font-size: 17px; padding: 11px 30px; }
    }
  </style>
</head>
<body>

  <!-- NAVIGATION -->
  <nav class="navbar">
     <a href="homepage.html">Home</a>
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
    <h1 class="glow-title">Feed & Nutrition Management</h1>
    <p>Optimize dairy productivity through precision rations, forage conservation, and metabolic profiling.</p>
  </header>

  <!-- MAIN CARD -->
  <article class="card">
    <h2>Program Details</h2>

    <section>
      <h3>Overview</h3>
      <p>Develop evidence‑based feeding strategies that support herd health and elevate milk output.
         This program blends the latest nutritional science with hands‑on feed‑management practice.</p>
    </section>

    <section>
      <h3>Learning Outcomes</h3>
      <ul>
        <li>Balance Total Mixed Rations (TMR) for differing lactation stages.</li>
        <li>Analyze forages, grains, and by‑products to meet nutrient specs.</li>
        <li>Employ metabolic profiling to pre‑empt nutrition‑related disorders.</li>
        <li>Implement pasture rotation and forage conservation for year‑round supply.</li>
      </ul>
    </section>

    <section>
      <h3>Curriculum Highlights</h3>
      <ul>
        <li>Ration Formulation & Dry‑Matter Intake Modelling</li>
        <li>Forage Quality Analysis, Silage & Haylage Technologies</li>
        <li>Feed Additives & Mineral Balancing</li>
        <li>TMR Mixer Calibration & Bunk Management</li>
        <li>Pasture Management / Rotational Grazing Plans</li>
      </ul>
    </section>

    <section>
      <h3>Practical Activities</h3>
      <p>Hands‑on labs with TMR mixers, on‑farm silage pits, NIRS feed analyzers, and metabolic sample
         interpretation workshops.</p>
    </section>

    <section>
      <h3>Career Paths</h3>
      <p>Graduates thrive as dairy nutrition advisers, feed‑mill specialists, forage‑management consultants,
         or technical sales managers for agrinutrition companies.</p>
    </section>

    <!-- Buttons -->
    <button class="apply-btn" onclick="openApplyModal('Feed & Nutrition Management')">Apply Now</button>
    <a href="programs.html" class="back-btn">← Back to Programs</a>

  </article>
  <!-- Meta SEO Tags -->
<meta name="description" content="AERO DAIRY is a modern, sustainable dairy education and training platform offering programs in dairy farming, milk processing, animal health and more in Kenya.">
<meta name="keywords" content="AERO DAIRY, Dairy Farming, Milk Production, Animal Health, Dairy Technology, Kenya Dairy Education">
<meta name="author" content="AERO DAIRY Team">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.aerodairy.co.ke/" />


  <!-- MODAL FUNCTION -->
  <script>
    function openApplyModal(area) {
      alert("Apply Now for: " + area + "\n(Modal placeholder – integrate your form here.)");
    }
  </script>
  <footer style="background:#014d00; color:#eee; padding:8px 0; font-size:0.78rem;">
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
