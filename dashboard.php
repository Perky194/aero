<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>AERO DAIRY – Responsive Animated Dashboard</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ------------ (all your existing CSS, unchanged) ------------ */
:root{--green-dark:#014d00;--green-light:#02a302;--panel-bg:rgba(0,0,0,.75);--blur-bg:rgba(0,0,0,.55)}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:Arial,Helvetica,sans-serif;background:url('880dc7b1af4a7c3998696a87f4efa7a8.jpg') center/cover fixed no-repeat;color:#fff;min-height:100vh;overflow-x:hidden}
.navbar{position:fixed;top:0;left:0;width:100%;background:var(--blur-bg);backdrop-filter:blur(4px);display:flex;justify-content:flex-end;z-index:100}
.navbar a{color:#fff;padding:2px 3px; font-weight:600;text-decoration:none;transition:background .25s}
.navbar a:hover{background:rgba(255,255,255	,.25)}
.welcome-bar{position:fixed;top:20px;left:30%;transform:translateX(-75%);width:50%;background:#fff;text-align:center;padding:12px 0;font-size:18px;font-weight:bold;z-index:99;box-shadow:0 2px 4px rgba(0,0,0,.25);border-radius:8px}
.blink-text{font-size:20px;animation:colorFlash 6s ease-in-out infinite}
@keyframes colorFlash{0%{color:var(--green-dark);}33%{color:cyan;}66%{color:purple;}100%{color:var(--green-dark)}}
.welcome-center{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);padding:28px 44px;border-radius:14px;text-align:center;background:rgba(0,51,0,.7);animation:pulseBG 12s linear infinite;z-index:98}
.welcome-center h1{font-size:32px;margin-bottom:10px}.welcome-center p{font-size:18px}
.hamburger{position:fixed;top:16px;left:20px;z-index:201;font-size:26px;background:var(--blur-bg);padding:6px 10px;border-radius:4px;cursor:pointer;transition:transform .3s}
.hamburger:hover{transform:scale(1.1)}
.floating-icons{position:fixed;top:100px;left:0;width:58px;background:var(--green-dark);padding:12px 0;border-top-right-radius:10px;border-bottom-right-radius:10px;display:flex;flex-direction:column;align-items:center;gap:16px;z-index:99;animation:slideInMini .6s ease}
.floating-icons i{font-size:20px;background:rgba(255,255,255,.1);padding:10px;border-radius:6px;cursor:pointer;transition:transform .25s,background .25s}
.floating-icons i:hover{transform:translateY(-3px) scale(1.1);background:rgba(255,255,255,.25)}
.icon-sidebar{position:fixed;top:0;left:-220px;width:220px;height:100%;background:var(--green-dark);padding-top:100px;display:flex;flex-direction:column;transition:transform .4s ease;z-index:200}
.icon-sidebar.show{transform:translateX(220px)}
.icon-sidebar .item{display:flex;gap:14px;align-items:center;padding:14px 22px;cursor:pointer;transition:background .25s}
.icon-sidebar .item:hover{background:rgba(255,255,255,.2)}
.icon-sidebar .item i{font-size:20px}
.content-panel{position:fixed;top:0;left:220px;right:0;bottom:0;background:var(--panel-bg);padding:100px 30px 40px;overflow-y:auto;transform:translateX(20px);opacity:0;pointer-events:none;transition:opacity .4s,transform .4s;z-index:150}
.content-panel.active{opacity:1;transform:translateX(0);pointer-events:all}
.content-panel h3{font-size:24px;margin-bottom:8px;border-bottom:2px solid var(--green-light);display:inline-block;padding-bottom:4px}
.content-panel h4{margin:14px 0 6px;font-size:18px;color:#c9ffb9}
.content-panel p{margin-bottom:8px}
.content-panel ul{list-style:none;margin:6px 0 0 0}
.content-panel li{margin-bottom:6px;font-size:16px}
.close-panel{position:absolute;top:72px;right:30px;font-size:26px;cursor:pointer;transition:transform .25s}
.close-panel:hover{transform:scale(1.2)}
.site-footer{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:75%;background:rgba(0,0,0,.85);backdrop-filter:blur(4px);color:#fff;font-size:13px;z-index:120;border-top-left-radius:8px;border-top-right-radius:8px}
.footer-top{display:flex;justify-content:center;gap:40px;padding:8px 10px 4px}
.footer-col{border-radius:6px;padding:6px 12px}
.footer-col.contact{background:rgba(46,125,50,.15)}.footer-col.links{background:rgba(0,121,107,.15)}.footer-col.address{background:rgba(123,31,162,.15)}
.footer-col h4{font-size:14px;margin-bottom:4px}.footer-col p{margin:2px 0}
.footer-col a{color:#80ffd0;text-decoration:none}.footer-col a:hover{text-decoration:underline}
.social-icons i{margin:0 4px;font-size:14px}
.footer-bottom{text-align:center;padding:4px 0;border-top:1px solid rgba(255,255,255,.25);font-size:12px}
@keyframes slideInMini{from{transform:translateX(-80px)}to{transform:translateX(0)}}
@keyframes pulseBG{0%{background:rgba(0,51,0,.7)}25%{background:rgba(0,102,102,.7)}50%{background:rgba(102,0,102,.7)}75%{background:rgba(102,51,0,.7)}100%{background:rgba(0,51,0,.7)}}
@media(max-width:600px){.navbar a{padding:12px 14px;font-size:14px}.floating-icons{top:80px;width:52px}.floating-icons i{font-size:18px;padding:8px}.icon-sidebar{width:190px}.icon-sidebar.show{transform:translateX(190px)}.content-panel{left:190px;padding-top:90px}.hamburger{top:12px;left:14px}.welcome-bar{font-size:16px;padding:10px 0;width:90%}.blink-text{font-size:18px}.site-footer{font-size:12px;width:90%}.footer-top{flex-direction:column;gap:12px;text-align:center}}
@media(max-width:420px){.icon-sidebar{width:100%;left:-100%}.icon-sidebar.show{transform:translateX(100%)}.content-panel{left:0}}
@keyframes colorFlash{0%{color:var(--green-dark)}33%{color:cyan}66%{color:purple}100%{color:var(--green-dark)}}

/* =========================
   AERO DAIRY DASHBOARD CSS
   ========================= */

:root {
  --green-dark: #014d00;
  --green-light: #02a302;
  --panel-bg: rgba(0,0,0,.75);
  --blur-bg: rgba(0,0,0,.55);
}

/* Reset & Base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  background: url('880dc7b1af4a7c3998696a87f4efa7a8.jpg') center/cover fixed no-repeat;
  color: #fff;
  min-height: 100vh;
  overflow-x: hidden;
}

/* --- NAVBAR --- */
.navbar {
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  background: var(--blur-bg);
  backdrop-filter: blur(4px);
  display: flex;
  justify-content: flex-start;
  padding: 4px 10% 4px 10%; /* top/bottom 4px, left/right 10% */
  z-index: 100;
}
.navbar a {
  color: #fff;
  padding: 4px 8px;         /* reduced padding */
  margin-right: 4px;
  font-size: 0.7rem;        /* smaller text */
  font-weight: 600;
  text-decoration: none;
  transition: background .25s;
}
.navbar a:hover {
  background: rgba(255,255,255,.25);
}

/* --- WELCOME BAR --- */
.welcome-bar {
  position: fixed;
  top: 48px; /* slightly closer under navbar */
  left: 50%;
  transform: translateX(-50%);
  width: 75%;
  background: #fff;
  color: #004d00;
  text-align: center;
  padding: 6px 0;
  font-weight: 600;
  font-size: 0.85rem;
  z-index: 99;
  box-shadow: 0 1px 3px rgba(0,0,0,.25);
  border-radius: 4px;
}
.welcome-bar .line1 {
  display: block;
  color: #006600;
  font-size: 0.9rem;
}
.welcome-bar .line2 {
  display: block;
  color: #004d00;
  font-size: 0.75rem;
  margin-top: 2px;
}

/* --- CENTER GREETING --- */
.welcome-center {
  position: fixed;
  top: 50%; left: 50%;
  transform: translate(-50%,-50%);
  padding: 24px 36px;
  border-radius: 12px;
  text-align: center;
  background: rgba(0,51,0,.7);
  animation: pulseBG 12s linear infinite;
  z-index: 98;
}
.welcome-center h1 { font-size: 28px; margin-bottom: 8px; }
.welcome-center p  { font-size: 16px; }

/* --- HAMBURGER & ICONS --- */
.hamburger {
  position: fixed; top: 12px; left: 14px;
  font-size: 24px; padding: 4px 8px;
  background: var(--blur-bg); border-radius: 4px;
  cursor: pointer; z-index: 201;
}
.hamburger:hover { transform: scale(1.1); }

/* --- FLOATING ICONS --- */
.floating-icons {
  position: fixed; top: 100px; left: 0;
  width: 52px; background: var(--green-dark);
  padding: 8px 0; border-top-right-radius:10px; border-bottom-right-radius:10px;
  display: flex; flex-direction: column; align-items: center;
  gap: 12px; z-index:99; animation:slideInMini .6s ease;
  overflow-y:auto; max-height:calc(100vh-120px);
}
.floating-icons i {
  font-size: 18px; padding: 8px;
  background: rgba(255,255,255,.1); border-radius:6px;
  transition: transform .25s, background .25s;
}
.floating-icons i:hover {
  transform: translateY(-2px) scale(1.1);
  background: rgba(255,255,255,.25);
}

/* --- SIDEBAR --- */
.icon-sidebar {
  position: fixed; top: 0; left: -220px;
  width: 220px; height: 100%;
  background: var(--green-dark); padding-top: 90px;
  display: flex; flex-direction: column;
  transition: transform .4s ease; z-index:200;
  overflow-y:auto;
}
.icon-sidebar.show { transform: translateX(220px); }
.icon-sidebar .item {
  display:flex; gap:12px; align-items:center;
  padding:12px 18px; cursor:pointer;
  transition: background .25s;
}
.icon-sidebar .item:hover { background: rgba(255,255,255,.2); }
.icon-sidebar .item i { font-size:18px; }

/* --- CONTENT PANELS --- */
.content-panel {
  position: fixed; top:0; left:220px; right:0; bottom:0;
  background: var(--panel-bg); padding:80px 20px 20px;
  overflow-y:auto; transform:translateX(20px); opacity:0;
  pointer-events:none; transition:opacity .35s,transform .35s; z-index:150;
}
.content-panel.active {
  opacity:1; transform:translateX(0); pointer-events: all;
}
.content-panel h3 {
  font-size:20px; margin-bottom:6px;
  border-bottom:2px solid var(--green-light);
}
.content-panel h4 { font-size:16px; margin:10px 0; color:#c9ffb9; }
.content-panel p  { margin-bottom:6px; font-size:14px; }
.content-panel li { margin-bottom:4px; font-size:14px; }
.close-panel {
  position:absolute; top:60px; right:20px;
  font-size:22px; cursor:pointer;
}

/* --- FOOTER --- */
.site-footer {
  position: fixed; bottom:0; left:50%;
  transform: translateX(-50%); width:75%;
  background: rgba(0,0,0,.85); backdrop-filter: blur(4px);
  color:#fff; font-size:12px; border-top-left-radius:8px; border-top-right-radius:8px;
  z-index:120;
}
.footer-top {
  display:flex; justify-content:center; gap:30px;
  padding:6px 8px 2px;
}
.footer-col {
  padding:4px 8px; border-radius:6px;
}
.footer-col.contact { background:rgba(46,125,50,.15); }
.footer-col.links   { background:rgba(0,121,107,.15); }
.footer-col.address { background:rgba(123,31,162,.15); }
.footer-col h4 { font-size:12px; margin-bottom:4px; }
.footer-col p, .footer-col a { font-size:11px; }
.footer-col a { color:#80ffd0; text-decoration:none; }
.footer-col a:hover { text-decoration:underline; }
.social-icons i { margin:0 3px; font-size:12px; }
.footer-bottom { text-align:center; padding:2px 0; border-top:1px solid rgba(255,255,255,.25); }

/* --- ANIMATIONS --- */
@keyframes slideInMini { from{transform:translateX(-80px)}to{transform:translateX(0)} }
@keyframes pulseBG {
  0%{background:rgba(0,51,0,.7)}25%{background:rgba(0,102,102,.7)}
  50%{background:rgba(102,0,102,.7)}75%{background:rgba(102,51,0,.7)}100%{background:rgba(0,51,0,.7)}
}

/* --- MEDIA QUERIES --- */
@media (max-width:768px) {
  .navbar a { font-size:0.6rem; padding:3px 6px; }
  .welcome-bar { width:90%; top: fifty px; font-size:0.75rem; }
  .floating-icons { width:48px; top:80px; }
  .icon-sidebar { width:190px; }
  .content-panel { left:190px; padding-top:80px; }
}
@media (max-width:600px) {
  .footer-top, .footer-content { flex-direction:column; align-items:center; }
  .social-grid { grid-template-columns:repeat(2,auto); }
}
@media (max-width:420px) {
  .icon-sidebar { left:-100%; width:100%; }
  .icon-sidebar.show { transform:translateX(100%); }
  .content-panel { left:0; }
}
/* Sidebar text & icon color */
.icon-sidebar .item,
.icon-sidebar .item i {
  color: #ffffff !important;
}

/* If you have any <a> links inside .item */
.icon-sidebar .item a {
  color: #ffffff !important;
}

/* On hover, keep white text but change background only */
.icon-sidebar .item:hover {
  background: rgba(255,255,255,0.2);
  color: #ffffff !important;
}




</style>
<!-- Presumed your existing dashboard code before -->

<!-- Other content panels remain unchanged -->

<!-- Replace Purpose panel with the extended version -->
<section class="content-panel" id="requirementsPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Core requirements:</h3>
  <p style="margin-bottom:16px; font-size:1.1rem; font-weight:600;">
    Select a core requirement below to view detailed information:
  </p>

  <!-- Dropdown for core requirements -->
  <select id="coreReqSelect" aria-label="Select Core Requirement" style="font-size:1.1rem; padding:8px; border-radius:6px; border: 2px solid var(--green-light); color: var(--green-dark); width:100%; max-width:400px; margin-bottom:24px; cursor:pointer;">
    <option value="" selected disabled>-- Choose Core Requirement --</option>
    <option value="budget">Budget & Financial Projections</option>
    <option value="milkResources">Milk Preservation Resources</option>
  </select>

  <!-- Content containers -->
  <div id="budgetContent" class="core-content" style="display:none; color:#d9f7be; max-height:600px; overflow-y:auto; padding-right:12px;">
    <!2-- Budget & Financial Projections content here -->
    <h4 style="color:var(--green-light); margin-bottom:12px;">Budget & Financial Projections</h4>
    <article style="line-height:1.5; font-size:1rem; margin-bottom:24px;">
      <h5 style="color:var(--green-dark);">Budget Overview (SMART Goals)</h5>
      <p><strong>S</strong>pecific: Our budget focuses on equipment acquisition, staff salaries, marketing, and operational costs tailored to increase milk production by 30% within 12 months.</p>
      <p><strong>M</strong>easurable: Monthly expenses and income streams will be tracked using accounting software to ensure we remain within budget.</p>
      <p><strong>A</strong>chievable: Budget allocations account for realistic supplier quotes and salary scales based on current market rates.</p>
      <p><strong>R</strong>elevant: Funds are prioritized for critical areas directly impacting milk preservation and product quality.</p>
      <p><strong>T</strong>ime-bound: The budget cycle spans the fiscal year from July 2025 to June 2026.</p>
      <p><em>Detailed breakdown over three main categories follows.</em></p>
      
      <h5 style="margin-top:16px; color:var(--green-dark);">1. Equipment & Infrastructure</h5>
      <ul>
        <li>Purchase of 3 high-efficiency milk chillers: Ksh 900,000</li>
        <li>Installation & maintenance: Ksh 150,000</li>
        <li>Refrigerated transportation van lease (annual): Ksh 600,000</li>
        <li>Facility renovation and storage improvement: Ksh 350,000</li>
      </ul>

      <h5 style="margin-top:16px; color:var(--green-dark);">2. Human Resources</h5>
      <ul>
        <li>Hiring 2 additional technicians (annual salary): Ksh 1,200,000</li>
        <li>Training and certification programs: Ksh 180,000</li>
        <li>Administrative staff salary top-ups: Ksh 300,000</li>
      </ul>

      <h5 style="margin-top:16px; color:var(--green-dark);">3. Marketing & Operations</h5>
      <ul>
        <li>Digital marketing campaigns: Ksh 250,000</li>
        <li>Community outreach & education programs: Ksh 150,000</li>
        <li>Operational consumables and utilities: Ksh 400,000</li>
      </ul>

      <p style="margin-top:16px; font-style: italic; color:#c0d9a4;">
        Total projected budget: Ksh 4,780,000 for the fiscal year, carefully aligned with expected revenue growth targets.
      </p>
    </article>

    <article style="margin-top:24px;">
      <h4 style="color:var(--green-light); margin-bottom:12px;">Financial Projections Table</h4>
      <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.9rem; color:#e6ffe6;">
          <thead style="background:var(--green-dark);">
            <tr>
              <th style="padding:8px; border:1px solid #ccc;">Month</th>
              <th style="padding:8px; border:1px solid #ccc;">Projected Sales (Ksh)</th>
              <th style="padding:8px; border:1px solid #ccc;">Operational Costs (Ksh)</th>
              <th style="padding:8px; border:1px solid #ccc;">Net Profit (Ksh)</th>
            </tr>
          </thead>
          <tbody>
            <tr><td style="padding:8px; border:1px solid #ccc;">July 2025</td><td style="padding:8px; border:1px solid #ccc;">400,000</td><td style="padding:8px; border:1px solid #ccc;">350,000</td><td style="padding:8px; border:1px solid #ccc;">50,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">August 2025</td><td style="padding:8px; border:1px solid #ccc;">450,000</td><td style="padding:8px; border:1px solid #ccc;">360,000</td><td style="padding:8px; border:1px solid #ccc;">90,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">September 2025</td><td style="padding:8px; border:1px solid #ccc;">480,000</td><td style="padding:8px; border:1px solid #ccc;">370,000</td><td style="padding:8px; border:1px solid #ccc;">110,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">October 2025</td><td style="padding:8px; border:1px solid #ccc;">520,000</td><td style="padding:8px; border:1px solid #ccc;">380,000</td><td style="padding:8px; border:1px solid #ccc;">140,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">November 2025</td><td style="padding:8px; border:1px solid #ccc;">600,000</td><td style="padding:8px; border:1px solid #ccc;">390,000</td><td style="padding:8px; border:1px solid #ccc;">210,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">December 2025</td><td style="padding:8px; border:1px solid #ccc;">620,000</td><td style="padding:8px; border:1px solid #ccc;">400,000</td><td style="padding:8px; border:1px solid #ccc;">220,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">January 2026</td><td style="padding:8px; border:1px solid #ccc;">650,000</td><td style="padding:8px; border:1px solid #ccc;">410,000</td><td style="padding:8px; border:1px solid #ccc;">240,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">February 2026</td><td style="padding:8px; border:1px solid #ccc;">670,000</td><td style="padding:8px; border:1px solid #ccc;">420,000</td><td style="padding:8px; border:1px solid #ccc;">250,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">March 2026</td><td style="padding:8px; border:1px solid #ccc;">700,000</td><td style="padding:8px; border:1px solid #ccc;">430,000</td><td style="padding:8px; border:1px solid #ccc;">270,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">April 2026</td><td style="padding:8px; border:1px solid #ccc;">720,000</td><td style="padding:8px; border:1px solid #ccc;">440,000</td><td style="padding:8px; border:1px solid #ccc;">280,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">May 2026</td><td style="padding:8px; border:1px solid #ccc;">750,000</td><td style="padding:8px; border:1px solid #ccc;">450,000</td><td style="padding:8px; border:1px solid #ccc;">300,000</td></tr>
            <tr><td style="padding:8px; border:1px solid #ccc;">June 2026</td><td style="padding:8px; border:1px solid #ccc;">800,000</td><td style="padding:8px; border:1px solid #ccc;">460,000</td><td style="padding:8px; border:1px solid #ccc;">340,000</td></tr>
          </tbody>
        </table>
      </div>
    </article>
  </div>

  <div id="milkResourcesContent" class="core-content" style="display:none; color:#e1d4ff; max-height:600px; overflow-y:auto; padding-right:12px;">
    <!-- Milk Preservation Resources content here -->
    <h4 style="color:var(--purple-light); margin-bottom:12px;">Milk Preservation Resources</h4>
    <p style="font-size:1rem; line-height:1.5;">
      Maintaining milk quality and freshness is crucial for our operations. Below are key resources and technologies that support our milk preservation efforts:
    </p>

    <ul style="margin-top:16px; font-size:1rem; line-height:1.5; list-style-type: disc; padding-left:20px;">
      <li><strong>Refrigeration Units:</strong> High-capacity chillers maintain milk temperature below 4°C to inhibit bacterial growth.</li>
      <li><strong>Pasteurization Equipment:</strong> Thermal processing units that ensure milk safety by destroying harmful microorganisms without compromising nutrients.</li>
      <li><strong>Vacuum Packaging:</strong> Reduces oxygen exposure, extending shelf life and preserving flavor.</li>
      <li><strong>Quality Testing Kits:</strong> Regular testing for acidity, bacterial count, and other quality parameters ensures product consistency.</li>
      <li><strong>Cold Chain Logistics:</strong> Refrigerated transport vehicles maintain the temperature integrity during delivery to retailers and customers.</li>
      <li><strong>Staff Training:</strong> Continuous education on hygiene and handling practices to minimize contamination risks.</li>
    </ul>

    <p style="margin-top:16px; font-style: italic; color:#c3b7ff;">
      Investing in these resources is essential to sustain competitive advantage and customer trust in our dairy products.
    </p>

    <p style="margin-top:24px; font-weight:bold; font-size:1.1rem; color:var(--purple-light);">
      Explore our advanced milk preservation solutions to enhance your dairy business today!
    </p>
  </div>
  

  <!-- Back to dashboard button -->
  <button
    onclick="closePanels()"
    style="
      margin-top: 24px;
      background: var(--green-dark);
      color: #fff;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    "
    onmouseover="this.style.backgroundColor='#6aa84f'"
    onmouseout="this.style.backgroundColor= 'var(--green-dark)'"
  >
    Back to Dashboard
  </button>
</section>



<!-- Existing CSS you had remains unchanged -->


<style>
  /* Your existing CSS here */

  /* Added scrollbar styling for core content */
  .core-content::-webkit-scrollbar {
    width: 8px;
  }
  .core-content::-webkit-scrollbar-track {
    background: transparent;
  }
  .core-content::-webkit-scrollbar-thumb {
    background-color: var(--green-light);
    border-radius: 6px;
  }

  /* Animations for panels */
  .content-panel {
    opacity: 0;
    transform: translateX(50px);
    transition: opacity 0.35s ease, transform 0.35s ease;
  }
  .content-panel.active {
    opacity: 1;
    transform: translateX(0);
  }
  .icon-sidebar {
  overflow-y: auto; /* allow vertical scrolling */
  scrollbar-width: thin;
  scrollbar-color: #0b6e4f transparent; /* Firefox */
}

.icon-sidebar::-webkit-scrollbar {
  width: 6px;
}

.icon-sidebar::-webkit-scrollbar-thumb {
  background-color: #0b6e4f;
  border-radius: 4px;
}

</style>


<!-- Existing JS remains unchanged, add this at the bottom or inside your scripts -->

<script>
  // Dropdown change event listener for Purpose panel content toggling
const sidebar = document.getElementById("iconSidebar");

document.querySelectorAll(".icon-sidebar .item").forEach(item => {
  item.addEventListener("click", () => {
    if (window.innerWidth < 600) {
      sidebar.classList.remove("show"); // Hide sidebar
    }
  });
});


    if (value === 'budget') {
      budgetDiv.style.display = 'block';
      milkDiv.style.display = 'none';
    } else if (value === 'milkResources') {
      budgetDiv.style.display = 'none';
      milkDiv.style.display = 'block';
    } else {
      budgetDiv.style.display = 'none';
      milkDiv.style.display = 'none';
    }
  });

  // Close panels function (assumed you have this, else add)
  function closePanels() {
    const panels = document.querySelectorAll('.content-panel.active');
    panels.forEach(panel => panel.classList.remove('active'));

  }
  const floatingIcons = document.getElementById("floatingIcons");

document.querySelectorAll(".icon-sidebar .item").forEach(item => {
  const clone = item.cloneNode(true);
  clone.innerHTML = item.querySelector("i").outerHTML; // only icon, not text
  floatingIcons.appendChild(clone);

  // Optional: add same click functionality
  clone.addEventListener("click", () => {
    const panelId = item.dataset.target;
    console.log("Show panel from floating:", panelId);

    if (window.innerWidth < 600) {
      sidebar.classList.remove("show");
	  
    }
  });
});

</script>

</head>
<body>

<nav class="navbar">
  <a href="dashboard.php">Home</a>
  <a href="dashboard_reports.php">Report</a>
  <a href="Admission.html">Admission</a>
  <a href="permits.html">Permits</a>
  <a href="resources.html">Resources</a>
  <a href="programs.html">Programs</a>
  <a href="contact.html">Contact Us</a>
  <a href="about.html">About Us</a>
  <a href="logout.php">Logout</a>
</nav>


<!-- WELCOME BAR -->
<div class="welcome-bar">👋 <span class="blink-text">Welcome to <strong>AERO DAIRY</strong> – Quality. Innovation. Care.</span></div>



<!-- CENTER GREETING -->
<div class="welcome-center"><h1>We’re Delighted You’re Here!</h1><p>Explore our world of fresh dairy, sustainable farming &amp; unmatched community support.</p></div>

<!-- HAMBURGER -->
<span class="hamburger" id="toggleSidebar">&#9776;</span>

<!-- SIDEBAR -->
<aside class="icon-sidebar" id="iconSidebar">
  <div class="item" data-target="dashboardPanel"><i class="fa-solid fa-gauge"></i>Dashboard</div>
  <a href="targetaudience.html" class="item"><i class="fa-solid fa-users"></i>Target Audience</a>
<a href="problemsolved.html" class="item"><i class="fa-solid fa-bug"></i>Problem Solved</a>
<a href="goals.html" class="item"><i class="fa-solid fa-bullseye"></i>Goals</a>
<a href="requirements.html" class="item"><i class="fa-solid fa-lightbulb"></i>Requirements</a>
<a href="purpose.html" class="item"><i class="fa-solid fa-list"></i>Purpose</a>
<a href="leadership.html" class="item"><i class="fa-solid fa-user-tie"></i>Leaderships</a>
<a href="tour.html" class="item"><i class="fa-solid fa-route"></i>Tour</a>
<a href="others.html" class="item"><i class="fa-solid fa-puzzle-piece"></i>Other Areas</a>
<a href="news-events.html" class="item"><i class="fa-solid fa-newspaper"></i>News & Events</a>
<a href="privacy.html" class="item"><i class="fa-solid fa-shield-halved"></i>Privacy</a>
</aside>


<!-- FLOATING ICONS -->
<div class="floating-icons" id="floatingIcons">
  <i class="fa-solid fa-gauge" data-target="dashboardPanel" title="Dashboard"></i>
  <i class="fa-solid fa-users" data-target="audiencePanel" title="Target Audience"></i>
  <i class="fa-solid fa-bug" data-target="problemsPanel" title="Problems Solved"></i>
  <i class="fa-solid fa-bullseye" data-target="goalsPanel" title="Goals"></i>
  <i class="fa-solid fa-lightbulb" data-target="requirementsPanel" title="Requirements"></i>
  <i class="fa-solid fa-list" data-target="puposePanel" title="Purpose"></i>
  <i class="fa-solid fa-user-tie" data-target="leadershipPanel" title="Leadership"></i>
  <i class="fa-solid fa-route" data-target="tourPanel" title="Tour"></i>
  <i class="fa-solid fa-puzzle-piece" data-target="otherPanel" title="Other Areas"></i>
  <i class="fa-solid fa-newspaper" data-target="newsPanel" title="News & Events"></i>
  <i class="fa-solid fa-shield-halved" data-target="privacyPanel" title="Privacy"></i>
</div>

<!-- CONTENT PANELS -->
<section class="content-panel" id="dashboardPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Dashboard Overview</h3>
  <img src="d.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="da.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="das.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="dash.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="modern.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="video.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="download (1).jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="freshmilk.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
   <img src="milklab.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
  <img src="testing.jpeg" alt="Aerial view of dairy farm" style="width:100%;max-width:500px;border-radius:8px;margin:6px 0">
</section>

<section class="content-panel" id="audiencePanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Target Audience</h3>
<section class="content-panel" id="problemsPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Problems Solved</h3>
  <img src="" alt="Quality control lab" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Low milk production</li><li>Milk quality issues</li><li>Disease management</li><li>Market access &amp; competitiveness</li></ul>
</section>

<section class="content-panel" id="goalsPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Goals</h3>
  <img src="" alt="Rising production chart" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Increase milk production</li><li>Improve milk quality</li><li>Expand market reach</li><li>Boost regulatory compliance</li></ul>
</section>

<section class="content-panel" id="purposePanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Purpose</h3>
  <img src="" alt="Investor meeting" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Seeking funds &amp; investment</li><li>Addressing operational challenges</li></ul>
  
</section>

<section class="content-panel" id="requirementsPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Core Requirements</h3>
  <img src="" alt="Financial projections document" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Budget &amp; financial projections</li><li>Milk preservation resources</li></ul>
</section>

<section class="content-panel" id="leadershipPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Leadership</h3>
  <img src="" alt="CEO addressing team" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul>
    <li><strong>CEO:</strong> Phillis Mwihaki</li>
    <li><strong>Support Team:</strong>
      <ul><li>Adrian Kamau</li><li>Mary Mwihaki</li><li>James Orengo</li><li>Victor Micheni</li></ul>
    </li>
  </ul>
</section>

<section class="content-panel" id="tourPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Tour Destinations</h3>
  <img src="" alt="Visitors on dairy farm tour" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Brookside</li><li>KCC</li><li>Delamare Farm</li></ul>
</section>

<section class="content-panel" id="otherPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Other Key Areas</h3>
  <img src="" alt="Scholarship award ceremony" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul>
    <li>Fees &amp; Finance – Infrastructure, licences, permits</li>
    <li>Scholarship – Trade fairs &amp; tours</li>
    <li>Farmer Resources – Online materials</li>
    <li>Farmer Portal – Secure login</li>
    <li>Counselling – Advice to increase quality &amp; production</li>
  </ul>
</section>

<section class="content-panel" id="newsPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>News &amp; Events</h3>
  <img src="" alt="News announcement board" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul>
    <li><strong>News:</strong> Memos, messages, calls, billboards</li>
    <li><strong>Events:</strong> Farm launches &amp; health checks</li>
    <li><strong>Announcements:</strong> Online platforms</li>
  </ul>
</section>
<!-- Quick Links & Socials Group -->
<div class="sidebar-extra">
  <!-- Quick Links -->
  <div class="sidebar-section">
    <h4>Quick Links</h4>
    <ul>
      <li><a href="requirements.html"><i class="fas fa-list-check"></i> Requirements</a></li>
      <li><a href="about.html"><i class="fas fa-circle-info"></i> About Us</a></li>
      <li><a href="faqs.html"><i class="fas fa-question-circle"></i> FAQs</a></li>
      <li><a href="terms.html"><i class="fas fa-file-contract"></i> Terms</a></li>
      <li><a href="privacy.html"><i class="fas fa-user-shield"></i> Privacy</a></li>
    </ul>
  </div>

  <!-- Socials -->
  <div class="sidebar-section">
    <h4>Socials</h4>
    <ul class="sidebar-social">
      <li><a href="https://facebook.com"       target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
      <li><a href="https://twitter.com/aerodairykenya" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
      <li><a href="https://instagram.com"      target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
      <li><a href="https://wa.me/254719594705" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
      <li><a href="https://youtube.com"        target="_blank"><i class="fab fa-youtube"></i> YouTube</a></li>
      <li><a href="#"><i class="fab fa-tiktok"></i> TikTok</a></li>
    </ul>
  </div>
</div>


<section class="content-panel" id="privacyPanel">
  <span class="close-panel" onclick="closePanels()">&times;</span>
  <h3>Privacy &amp; Data</h3>
  <img src="" alt="Data security lock graphic" style="width:100%;max-width:450px;border-radius:8px;margin-bottom:6px">
  <ul><li>Data encryption</li><li>User rights</li><li>Data retention</li></ul>
</section>

<!-- FOOTER (unchanged) -->
<footer class="site-footer">
  <div class="footer-top">
    <div class="footer-col contact"><h4>Contact Us</h4><p>Phone: +254 700 123 456</p><p>Email: <a href="mailto:info@aerodairy.com">info@aerodairy.com</a></p></div>
    <div class="footer-col links"><h4>Quick Links</h4><ul><li><a href="privacy.html">Privacy Policy</a></li><li><a href="terms.html">Terms of Service</a></li><li><a href="faqs.html">FAQs</a></li></ul></div>
    <div class="footer-col address"><h4>Postal Address</h4><p>P.O. Box 123‑00100</p><p>Nyandarua, Kenya</p>
      <div class="social-icons"><i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-x-twitter"></i><i class="fa-brands fa-instagram"></i><i class="fa-brands fa-linkedin-in"></i><i class="fa-brands fa-youtube"></i></div>
    </div>
  </div>
  <!-- Meta SEO Tags -->
<meta name="description" content="AERO DAIRY is a modern, sustainable dairy education and training platform offering programs in dairy farming, milk processing, animal health and more in Kenya.">
<meta name="keywords" content="AERO DAIRY, Dairy Farming, Milk Production, Animal Health, Dairy Technology, Kenya Dairy Education">
<meta name="author" content="AERO DAIRY Team">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.aerodairy.co.ke/" />

  
<!-- SCRIPT (unchanged) -->
<script>
const toggleBtn = document.getElementById('toggleSidebar');
const sidebar   = document.getElementById('iconSidebar');
const miniIcons = document.querySelectorAll('.floating-icons i');
const sideItems = document.querySelectorAll('.icon-sidebar .item');
const panels    = document.querySelectorAll('.content-panel');
toggleBtn.addEventListener('click',()=>sidebar.classList.toggle('show'));
function closePanels(){panels.forEach(p=>p.classList.remove('active'))}
function showPanel(id){closePanels();document.getElementById(id).classList.add('active')}
miniIcons.forEach(ic=>ic.addEventListener('click',()=>showPanel(ic.dataset.target)));
sideItems.forEach(it=>it.addEventListener('click',()=>{showPanel(it.dataset.target);if(window.innerWidth<420)sidebar.classList.remove('show')}));

</script>
<footer style="background:#014d00; color:#eee; padding:8px 0; font-size:0.78rem;">
  <div style="display: flex; justify-content: space-between; flex-wrap: wrap; align-items: center; width: 92%; margin: auto; gap: 10px;">

    <!-- Quick Links Left -->
    <div style="display: flex; gap: 18px; flex-wrap: wrap;">
      <a href="dashboard.php" style="color:#eee; text-decoration:none;"><i class="fas fa-home"></i> Home</a>
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
