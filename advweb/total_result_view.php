<?php
    session_start();
    $con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
    mysqli_set_charset($con,"utf8"); 
    $session_id=$_SESSION['user_id'];
    $no= $_POST['pc_total'];
    $pcname=$_POST['pc_name'];
    // echo "asd".$pcname;    // echo " no : ".$no;
    $result = mysqli_query($con, "SELECT `pc_1`, `pc_2`, `pc_3`, `pc_4`, `pc_5`, `pc_6`, `pc_7`, `pc_8`, `pc_9`, `pc_10`, `pc_11`, `pc_12`, `pc_13`, `pc_14`, `pc_15`, `pc_16`, `pc_17`, `pc_18`, `pc_19`, `pc_20` FROM `advweb_result` WHERE No='$no'");
    $row = mysqli_fetch_array($result);
     for($i=0; $i<20; $i++){
        $row[$i]=str_replace(' ', '', $row[$i]);
        // echo "row[".$i."]=".$row[$i]."  , ";
     }
     $good_cnt=0;
    $bad_cnt=0;
    $manual_cnt=0;
    for($i=0; $i<20; $i++){
    if($row[$i] === 'GOOD'){
      $good_cnt++;
    }
    elseif ($row[$i] === 'BAD') {
      $bad_cnt++;
    }
    else{
      $manual_cnt++;
    }
  }
  $data = array(
     array('Result', 'Count'),
     array("GOOD", $good_cnt),
     array("BAD", $bad_cnt),
     array("MANUAL", $manual_cnt)
  );
  
?> 
<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="utf-8">
        <style>
            table.view {
                width: 100%;
                border-collapse: collapse;
            }

            .view th{
                padding: 7px;
                text-align: center;
                border-bottom: 1px dotted black;
                background-color: white;
                color: black;
                font-size: large;
            }
            .view td{
                padding: 7px;
                width: auto;
                text-align: center;

                border-bottom: 1px dotted black;
                background-color: #f5f5f5;
                color: black;
                font-size: large;
            }
        </style>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable(
          <?= json_encode($data) ?>
        );

        var options = {
          width: 600, height:300,
          legend: { position: 'none' },
          chart: {
            title: '진단결과',
            subtitle: 'bar chart' },
          axes: {
            x: {
              0: { side: 'top', label: 'Count'} // Top x-axis.
            }
          },
          bar: { groupWidth: "30%" },
          vAxis:{
            viewWindow: {max:20}
          }
          
          
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
            <?= json_encode($data) ?>);

        var options = {
            width: 600, height:400,
            title: '진단결과',
            subtitle: 'pie chart',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('top_p_div'));
        chart.draw(data, options);
      }
    </script>
    </head>
    <body>
        <header>
            <center><h1>PC(<?php echo $pcname ?>)의  전체 항목 결과</h1></center>
        </header>
        
      
        <div style="width: 90%;  border: 1px solid #bcbcbc; padding-top: 30px; padding-bottom: 40px;" align="center" >
            <div style="width:50%; float:left;" id="top_x_div"></div>
            <div style="width:50%; float:left;" id="top_p_div"></div>
        

            <div style="width: 90%;" align="center">
                <h1> 전체 결과 상세내역 </h1>
                <table class="view">
                    <thead>
                        <tr>
                            <th scope="col">코드</th>
                            <th scope="col">항목</th>
                            <th scope="col">결과</th>
                            <th scope="col">위험도</th>
                            <th scope="col">가이드</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PC-01</td>
                            <td>패스워드의 주기적 변경</td>
                            <td><? echo $row[0]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide1.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-02</td>
                            <td>패스워드 정책이 해당 기관의 보안 정책에 적합하게 설정</td>
                            <td><? echo $row[1]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide2.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-03</td>
                            <td>복구 콘솔 자동 로그온 금지 설정</td>
                            <td><? echo $row[2]; ?></td>
                            <td>중</td>
                            <td><button type="button" onclick= "window.open('guide/guide3.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-04</td>
                            <td>공유 폴더 제거</td>
                            <td><? echo $row[3]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide4.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-05</td>
                            <td>항목의 불필요한 서비스 제거</td>
                            <td><? echo $row[4]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide5.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-06</td>
                            <td>Windows Messenger(MSN, .NET 메신저 등)와 같은 상용 메신저 사용 금지</td>
                            <td><? echo $row[5]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide6.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-07</td>
                            <td>파일시스템을 NTFS로 포맷</td>
                            <td><? echo $row[6]; ?></td>
                            <td>중</td>
                            <td><button type="button" onclick= "window.open('guide/guide7.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-08</td>
                            <td>다른 OS로 멀티 부팅 금지</td>
                            <td><? echo $row[7]; ?></td>
                            <td>중</td>
                            <td><button type="button" onclick= "window.open('guide/guide8.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-09</td>
                            <td>브라우저 종료 시 임시 인터넷 파일 폴더 내용 삭제</td>
                            <td><? echo $row[8]; ?></td>
                            <td>하</td>
                            <td><button type="button" onclick= "window.open('guide/guide9.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-10</td>
                            <td>HOT FIX 등 최신 보안패치 적용</td>
                            <td><? echo $row[9]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide10.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-11</td>
                            <td>최신 서비스팩 적용</td>
                            <td><? echo $row[10]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide11.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-12</td>
                            <td>MS-Office, 한글, 어도비 아크로뱃 등의 응용프로그램에 대한 최신 보안 패치 및 벤더 권고사항 적용</td>
                            <td><? echo $row[11]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide12.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-13</td>
                            <td>바이러스 백신 프로그램 설치 및 주기적 업데이트</td>
                            <td><? echo $row[12]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide13.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-14</td>
                            <td>바이러스 백신 프로그램에서 제공하는 실시간 감시 기능 활성화</td>
                            <td><? echo $row[13]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide14.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-15</td>
                            <td>OS에서 제공하는 침입차단 기능 활성화</td>
                            <td><? echo $row[14]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide15.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-16</td>
                            <td>화면보호기 대기 시간 설정 및 재시작 시 암호 보호 설정</td>
                            <td><? echo $row[15]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide16.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-17</td>
                            <td>CD, DVD, USB 메모리 등과 같은 미디어의 자동실행 방지 등 이동식 미디어에 대한 보안대책 수립</td>
                            <td><? echo $row[16]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide17.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-18</td>
                            <td>PC 내부의 미사용(3개월) ActiveX 제거</td>
                            <td><? echo $row[17]; ?></td>
                            <td>상</td>
                            <td><button type="button" onclick= "window.open('guide/guide18.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-19</td>
                            <td>시스템 부팅 시 Windows Meesenger 자동 시작 금지</td>
                            <td><? echo $row[18]; ?></td>
                            <td>중</td>
                            <td><button type="button" onclick= "window.open('guide/guide19.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                        <tr>
                            <td>PC-20</td>
                            <td>항목 원격 지원 금지 정책 설정</td>
                            <td><? echo $row[19]; ?></td>
                            <td >중</td>
                            <td><button type="button" onclick= "window.open('guide/guide20.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')">가이드</button></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>



    </body>
</html>