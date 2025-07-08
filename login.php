<?php
/* ---------- PHP: handle login ---------- */
session_start();

$alert      = '';
$alertClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* 1. Grab form values safely */
    $regNo = trim($_POST['RegistrationNo'] ?? '');
    $pwd   = $_POST['password']        ?? '';

    if ($regNo && $pwd) {
        /* 2. Connect to DB */
        $conn = new mysqli('localhost', 'root', '', 'aero_dairy');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error); // dev‑friendly
        }

        /* 3. Prepared statement */
        $stmt = $conn->prepare(
            'SELECT FirstName, Password FROM users WHERE RegistrationNo = ? LIMIT 1'
        );
        $stmt->bind_param('s', $regNo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($firstName, $hash);
            $stmt->fetch();

            if (password_verify($pwd, $hash)) {
                /* ✅ success */
                $_SESSION['FirstName'] = $firstName;

                // ✅ INSERT LOGIN TRACKING HERE
                $logStmt = $conn->prepare("INSERT INTO user_logins (user_name) VALUES (?)");
                $logStmt->bind_param("s", $regNo);
                $logStmt->execute();
                $logStmt->close();

                header('Location: dashboard.php');
                exit();
            }

            $alert      = 'Incorrect password!';
            $alertClass = 'error';
        } else {
            $alert      = 'Registration number not found!';
            $alertClass = 'error';
        }

        $stmt->close();
        $conn->close();
    } else {
        $alert      = 'Please fill in both fields.';
        $alertClass = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AERO DAIRY • Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    :root{
      --green-light:#c8ff7c;--green-medium:#56ab2f;--teal:#00c9b7;
      --violet-light:#c44fff;--violet-dark:#732bff;
      --green-dark:#1d4e0b;--white:#ffffff;
    }
    *{box-sizing:border-box;margin:0;padding:0;}
    body{
      font-family:'Poppins',sans-serif;
      background:linear-gradient(135deg,var(--green-light),var(--teal));
      color:var(--white);min-height:100vh;
      display:flex;flex-direction:column;align-items:center;justify-content:center;
    }
    /* CARD */
    .card{
      background:rgba(255,255,255,.08);
      backdrop-filter:blur(9px);
      border-radius:18px;
      padding:2.7rem 3rem;
      width:min(92%,520px);
      box-shadow:0 10px 28px rgba(0,0,0,.25);
      animation:slide-in 1s cubic-bezier(.25,.8,.25,1) forwards;
      opacity:0;transform:translateX(85vw);
    }
    @keyframes slide-in{to{opacity:1;transform:translateX(0);}}
    /* HEADINGS */
    h1,h2{text-align:center;letter-spacing:2px;margin:0 0 1rem;}
    h1{
      font-size:2.2rem;font-weight:600;
      background:linear-gradient(270deg,var(--green-light),var(--green-medium),var(--teal),var(--violet-light),var(--violet-dark),var(--green-light));
      background-size:1000% 100%;-webkit-background-clip:text;background-clip:text;color:transparent;
      animation:gradient-shift 9s linear infinite,letter-pulse 3.2s ease-in-out infinite;
    }
    @keyframes gradient-shift{0%{background-position:0% 0;}100%{background-position:100% 0;}}
    @keyframes letter-pulse{0%,100%{letter-spacing:2px;}50%{letter-spacing:7px;}}
    h2{font-size:1.5rem;font-weight:400;position:relative;overflow:hidden;}
    h2::after{
      content:'';position:absolute;left:0;bottom:0;width:100%;height:3px;
      background:linear-gradient(90deg,var(--green-light),var(--violet-light));
      animation:slide-line 2.2s infinite;
    }
    @keyframes slide-line{0%{transform:translateX(-100%);}50%{transform:translateX(0);}100%{transform:translateX(100%);}}
    /* FORM */
    form{display:flex;flex-direction:column;gap:1rem;}
    label{font-size:.9rem;}
    input{
      padding:.7rem .9rem;border:none;border-radius:10px;font-size:.9rem;outline:none;
      transition:box-shadow .3s;
    }
    input:focus{box-shadow:0 0 0 3px rgba(255,255,255,.35);}
    .button-row{margin-top:.5rem;}
    button{
      width:100%;padding:.9rem;
      background:linear-gradient(135deg,var(--green-medium),var(--violet-dark));
      color:var(--white);border:none;border-radius:10px;font-size:1rem;cursor:pointer;
      transition:transform .25s,box-shadow .25s;
    }
    button:hover{transform:translateY(-3px);box-shadow:0 6px 20px rgba(0,0,0,.35);}
    /* ALERT */
    .alert{padding:.8rem 1rem;border-radius:8px;font-size:.9rem;text-align:center;margin-bottom:1rem;}
    .alert.error  {background:rgba(255,79,79,.25);}
    .alert.success{background:rgba(0,200,81,.25);}
    /* BACK LINK */
    .switch-link{text-align:center;margin-top:1rem;font-size:.9rem;}
    .switch-link a{color:var(--white);font-weight:600;text-decoration:none;position:relative;}
    .switch-link a::after{
      content:'';position:absolute;left:0;bottom:-2px;width:100%;height:2px;background:var(--white);
      transform:scaleX(0);transition:transform .3s;transform-origin:left;
    }
    .switch-link a:hover::after{transform:scaleX(1);}
    /* FOOTER */
    .site-footer{
      width:100%;margin-top:auto;
      background:linear-gradient(135deg,var(--violet-dark),var(--green-dark));
      padding:1rem 2rem;text-align:center;font-size:.85rem;
    }
    @media(prefers-reduced-motion:reduce){*{animation:none!important;transition:none!important;}}
  </style>
</head>
<body>

  <section class="card">
    <h1>AERO DAIRY</h1>
    <h2>LOGIN</h2>

    <?php if ($alert): ?>
      <div class="alert <?= htmlspecialchars($alertClass) ?>"><?= htmlspecialchars($alert) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
      <label for="RegistrationNo">Registration No</label>
      <input type="text" id="RegistrationNo" name="RegistrationNo" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <div class="button-row">
        <button type="submit">Login</button>
      </div>
    </form>

    <div class="switch-link">
      Don’t have an account? <a href="signup.html">Sign Up</a>
    </div>
  </section>

  <footer class="site-footer">
    © 2025 AERO DAIRY | All rights reserved.
  </footer>

</body>
</html>
