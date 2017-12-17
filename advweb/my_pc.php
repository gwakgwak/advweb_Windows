<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
    $con = mysqli_connect("localhost", "wlstjd8445", "wjdgjswlswn1!", "wlstjd8445");
    mysqli_set_charset($con,"utf8"); 
    $session_id=$_SESSION['user_id'];
    $no=$_POST['my_pc'];
    $vul=$_POST['my_vul'];
    $pcname=$_POST['pc_name'];
    $result=mysqli_query($con, "SELECT pc_".$vul.", result_".$vul." from `advweb_result` WHERE No='$no'");
    $row = mysqli_fetch_array($result);
    $row[0]=str_replace(' ', '', $row[0]);
   

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
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PC(<?php echo $pcname ?>)의 (<?php echo $vul?>)</title>
	<style>
		
		#a{
			border:1px solid;
			background-color: lightgray;
			text-align: center;
			font-weight: bold;
		}

		#b{
			border : 1px solid;
			text-align: left;
			padding-left:20px;
		}
	</style>
</head>
<body>
	<header>
            <center><h1>PC(<?php echo $pcname ?>)의 [PC-(<?php echo $vul?>)] 항목</h1></center></header>
	<div id="a">
		<p><?php echo "[PC-".$vul."]  ".$category[$vul] ?></p>
	</div>
	<br>
	<div id="b">
		<br><br>
		<?php
		echo $row[1]."<br><br><br><br>";
		?>
	</div>
	<br>
	<?
		if($row[0] === 'MANUAL'){
			echo "
				<form action=\"update_db.php\" method=\"post\" enctype=\"multipart/form-data\">
					<center>
						<input type=\"radio\" name=\"check_res\" value = \"GOOD\">GOOD
						<input type=\"radio\" name=\"check_res\" value = \"BAD\">BAD"?>
						<input type = "hidden" name="no" value="<?php echo $no?>">
						<input type = "hidden" name="manual" value="<?php echo $vul?>">
						<input type = "hidden" name="pc_name" value="<?php echo $pcname?>">
						<input type = "submit" id="submit">
						<!-- <span style=\"float:right\"><input type=\"submit\" id=\"submit\" value=\"submit\"></span> -->
					</center>
				</form>
			<?php
		}
	?>

</body>
</html>