<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();

?>
<!DOCTYPE HTML>

<!--
        Imagination by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@taglib prefix="sql" uri="http://java.sun.com/jsp/jstl/sql"%>
<html>
    <head>
        <title>Diagnose</title>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
      
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
    </head>
    <body>

        <div id="header-wrapper">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="main.php">Windows 취약점 </a></h1>
                    </div>

                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><a href="About_us.php">About US</a></li>
                            <li class="active"><a href="diagnose.php">Diagnose</a></li>
                            <li><a href="result.php">Result</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!-- Header -->

            <!-- Banner -->
            <div id="banner">
                <div class="container">
                </div>
            </div>
            <!-- /Banner -->

        </div>

        <!-- Main -->
        <div id="main">
            <div class="container">
                <div class="row">

                    <div class="3u">
                        <section class="sidebar">
                            <header>
                                <h2>Log-in</h2>
                            </header>
                            <ul class="default">
                                <li>Current User : <? echo $_SESSION['user_id']; ?><form action="logout.php"><input type="submit" value="logout"/></form></li>                                
                            </ul>
                        </section>
                        <section class="sidebar">
                            <header>
                                <h2>Related Website</h2>
                            </header>
                            <ul class="default">
                                <li><a href="http://www.nis.go.kr/main.do" target="_blank">NIS(National Intelligence Service)</a></li>
                                <li><a href="http://www.nis.go.kr/AF/1_5.do" target="_blank">NISC(National Industrial Security Center)</a></li>
                                <li><a href="https://www.kisa.or.kr/main.jsp" target="_blank">KISA(Korea Internet&Security Agency)</a></li>
                                <li><a href="https://www.krcert.or.kr/main.do"target="_blank">KrCERT(KOREA Computer Emergency Response Team Coordination Center)</a></li>
                            </ul>
                        </section>
                    </div>

                    <div class="9u skel-cell-important">
                        <section>
                            <header>
                                <h2>Check Your Windows</h2>
                            </header>
                            <br>
    
    <br>
    <div id="div1">
        <button type="button" id="button" onclick="location.href='diagnose/2015_PC_diagnose_2.exe'">Download</button>
    </div>
        <br><br>
    <div id="div2">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            PC 이름 : <input type="text" id="text" name='pcname'><br><br>
            <input type="file" id="file" accept="text/plain" name='myfile'>
            <input type="submit" id="submit" value="submit">
        </form>
    </div>
    <br><br><br>


    <center><h2>1. Download 버튼을 눌러 프로그램을 다운로드</h2></center>
    <center><h2>2. 다운받은 프로그램 실행</h2></center>
    <center><h2>3. upload 버튼을 눌러 결과 txt파일 업로드</h2></center>

                            
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main -->


        <!-- Copyright -->
        <div id="copyright">
            <div class="container">
                 Phone Number : (02) 123 - 4567/ Location : No-won, Seoul / Representative : Jin-Sung Gwak
            </div>
        </div>



    </body>
</html>