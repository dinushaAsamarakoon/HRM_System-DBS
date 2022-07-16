<!doctype html>
<html lang="en">
<head>

    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>

    <title>Home Page</title>
</head>

<body >
<div class="shadow p-3"  >
    <nav class="navbar navbar-expand-lg bg-light" >
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll3" style="padding-top: 9px;height: 50px;">

                <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  href="<?=SROOT?>EmployeeRegister/login" style="color: #0c63e4;font-size: 20px;">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

    <header class="page-header gradient">
        <div class="container pt-1">
            <div class="row align-items-center justify-content-center mt-2">
                <div>
                    <h2 style="font-family: Cursive; font-weight:bold; font-size: 70px; color: #191c1f";>Welcome to <span style="color: darkslategray">Jupiter Apparels</span></h2>
                    <p style="color: #191c1f; font-size: 30px;">
                        Life is a party, Dress like it.
                    </p>
                </div>
            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,256L60,240C120,224,240,192,360,181.3C480,171,600,181,720,202.7C840,224,960,256,1080,261.3C1200,267,1320,245,1380,234.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
        </svg>
    </>

</body>
</html>

