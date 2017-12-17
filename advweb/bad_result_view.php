 <?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
    mysqli_set_charset($con,"utf8"); 
    $session_id=$_SESSION['user_id'];
    $no=$_POST['pc_bad'];
    $pcname=$_POST['pc_name'];
    
    $result = mysqli_query($con, "SELECT `pc_1`, `pc_2`, `pc_3`, `pc_4`, `pc_5`, `pc_6`, `pc_7`, `pc_8`, `pc_9`, `pc_10`, `pc_11`, `pc_12`, `pc_13`, `pc_14`, `pc_15`, `pc_16`, `pc_17`, `pc_18`, `pc_19`, `pc_20` FROM `advweb_result` WHERE No='$no'");
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
    // exit;
    }
    
     $row = mysqli_fetch_array($result);
     for($i=0; $i<20; $i++){
        $row[$i]=str_replace(' ', '', $row[$i]);
     }
    
     
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
                font-size: small;
            }
            .view td{
                padding: 7px;
                width: auto;
                text-align: center;

                border-bottom: 1px dotted black;
                background-color: #f5f5f5;
                color: black;
                font-size: small;
            }
        </style>
    </head>
    <body>
        <header>
            <center><h1>PC(<?php echo $pcname ?>)의 취약 항목 결과</h1></center>
        </header>
        <?php 
            $pc_code = array('PC-01', 'PC-02', 'PC-03', 'PC-04', 'PC-05', 'PC-06', 'PC-07', 'PC-08', 'PC-09', 'PC-10', 'PC-11', 'PC-12', 'PC-13', 'PC-14', 'PC-15', 'PC-16', 'PC-17', 'PC-18', 'PC-19', 'PC-20');
            $category = array('패스워드의 주기적 변경',
                '패스워드 정책이 해당 기관의 보안 정책에 적합하게 설정',
                '복구 콘솔 자동 로그온 금지 설정',
                '공유 폴더 제거',
                '항목의 불필요한 서비스 제거',
                'Windows Messenger(MSN, .NET 메신저 등)와 같은 상용 메신저 사용 금지',
                '파일시스템을 NTFS로 포맷',
                '다른 OS로 멀티 부팅 금지',
                '브라우저 종료 시 임시 인터넷 파일 폴더 내용 삭제',
                'HOT FIX 등 최신 보안패치 적용',
                '최신 서비스팩 적용',
                'MS-Office, 한글, 어도비 아크로뱃 등의 응용프로그램에 대한 최신 보안 패치 및 벤더 권고사항 적용',
                '바이러스 백신 프로그램 설치 및 주기적 업데이트',
                '바이러스 백신 프로그램에서 제공하는 실시간 감시 기능 활성화',
                'OS에서 제공하는 침입차단 기능 활성화',
                '화면보호기 대기 시간 설정 및 재시작 시 암호 보호 설정',
                'CD, DVD, USB 메모리 등과 같은 미디어의 자동실행 방지 등 이동식 미디어에 대한 보안대책 수립',
                'PC 내부의 미사용(3개월) ActiveX 제거',
                '시스템 부팅 시 Windows Meesenger 자동 시작 금지',
                '항목 원격 지원 금지 정책 설정');


            // -------DB에서 받아와야 함--------

           
           
            
            //---------------------------------

            $degree = array('상', '상', '중', '상', '상', '상', '중', '중', '하', '상', '상', '상', '상', '상', '상', '상', '상', '상', '중',  '중');
        ?>  

        <table class="view">
            <thead>
                <tr>
                    <th scope="col">코드</th>
                    <th scope="col">항목</th>
                    <th scope="col">결과</th>
                    <th scope="col">위험도</th>
                    <th scope="col">가이드</th>
                    <th scope="col">내 현황</th>
                </tr>
            </thead>
            <tbody>
                <?
                    for($i=0; $i<20 ;$i++){
                        if($row[$i] === 'BAD'){
                            $k = $i+1;
                            echo "
                            <tr>
                                <td>$pc_code[$i]</td>
                                <td>$category[$i]</td>
                                <td>$row[$i]</td>
                                <td>$degree[$i]</td>
                                <td><button type=\"button\" onclick= \"window.open('guide/guide$k.html','','width=700,height=700,top=20,left=100,toolbar=no,menubar=no,scrollbars=1,resizable=1')\">가이드</button></td>";?>
                                <td><form method="post" action="my_pc.php" target="_blank">
                                    <input type = "hidden" name="my_pc" value="<?php echo $no?>">
                                    <input type ="hidden" name="my_vul" value="<?php echo $k?>">
                                    <input type ="hidden" name="pc_name" value="<?php echo $pcname?>">
                                    <button type="submit" name="bad_button">바로가기</button>
                                    </form>
                                    
                                </td>
                             </tr>
                             <?php
                        }
                    }

                ?>
            </tbody>
        </table>


    </body>
</html>