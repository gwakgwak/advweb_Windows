<?php
    session_start();
    $con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
    mysqli_set_charset($con,"utf8"); 
    $session_id=$_SESSION['user_id'];
?>

<!DOCTYPE HTML>
<!--
        Imagination by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<html>
    <head>
        <title>Maintenance</title>
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
                        <h1><a href="home.do"> TJS</a></h1><h1>company</h1>
                    </div>

                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><a href="About_us.php">About US</a></li>
                            <li><a href="diagnose.php">Equipment</a></li>
                            <li class="active"><a href="result.php">Maintenance</a></li>
                            <li><a href="Notice.do">Notice</a></li>
                            <li><a href="Employee.do">Employee</a></li>
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
                             <li>Current User : <c:out value="${id}"/></li>

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
                                <h2>진단 결과</h2>

                            </header>

                        </section>
                       <table class="view">
                                   <thead>
                                                   <tr>
                                <th scope="col">No.</th>
                                <th scope="col">진단PC</th>
                                <th scope="col">진단날짜</th>
                            </tr>
                        </thead>
                        <?php echo "<br> session id : ".$session_id."<br>"?>;
                        <tbody>
                               <?php
                                     $result = mysqli_query($con,  "select * from `advweb_result` WHERE user_id='$session_id' AND No=7");
                                     
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo "<tr><td>PC Name</td><td>".$row['pcname']."</td"
                                        for($i=0 ; $i<20 ; $i++){

                                        }
                                       
                                ?>
                            <tr>
                                <td><? echo $row['No']?></td>
                                <td><?php echo $row['pc_name']?></td>
                                <td><?php echo $row['time']?></td>

                            </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main -->

        <!-- Copyright -->
        <div id="copyright">
            <div class="container">
                Phone Number : (02) 970 - 7279 / Location : No-won, Seoul / Representative : Ji Pyo, Kim 
            </div>
        </div>



    </body>
</html>