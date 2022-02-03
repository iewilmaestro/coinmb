<?php

class Modul{
	public $host = "https://coinmb.com";
	public $reg = "https://bit.ly/3GOilcK";
	public $a = ["iewil","coinmb","1.0"];
	public $disable = "
	Script mati karena web update / scam!
	Support Channel saya dengan cara
	Subscribe https://www.youtube.com/c/iewil
	karena subscribe itu gratis :D
	Untuk mendapatkan info Script terbaru
	Join grub via telegram ~> https://t.me/Iewil_G
	ðŸ‡®ðŸ‡© Family-Team-Function-INDO
	\n";
	public function __construct(){
		$this->api=[
		"dash"=>"/dashboard",
		"wd"=>"/withdraw",
		"auto"=>"/auto",
		"vrf"=>"/verify"
		];
	}
	public function Run($url, $httpheader = 0, $post = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		//curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_COOKIE,TRUE);
		//curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
		//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
		if($post){
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}
		if($httpheader){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
		}
		if($proxy){
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
		}
		curl_setopt($ch, CURLOPT_HEADER, true);
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch);
		if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
			$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
			$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
			curl_close($ch);
			return array($header, $body)[1];
		}
	}
	public function col($str,$color){
		if($color==5){$color=['h','k','b','u','m'][array_rand(['h','k','b','u','m'])];}
		$war=array('rw'=>"\033[107m\033[1;31m",'rt'=>"\033[106m\033[1;31m",'ht'=>"\033[0;30m",'p'=>"\033[1;37m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'rg'=>"\033[102m\033[1;34m",'ry'=>"\033[103m\033[1;30m",'rp1'=>"\033[104m\033[1;37m",'rp2'=>"\033[105m\033[1;37m");return $war[$color].$str."\033[0m";
	}
	public function Slow($msg){$slow = str_split($msg);
		foreach( $slow as $slowmo ){echo $slowmo; usleep(70000);}
	}
	public function Save($namadata){
		if(file_exists(trim($this->a[1])."/".$namadata)){
			$datauser=file_get_contents(trim($this->a[1])."/".$namadata);
		}else{
			$datauser=readline("Input ".$namadata." > ");echo "\n";
			file_put_contents(trim($this->a[1])."/".$namadata,$datauser);
		}
		return $datauser;
	}
	public function tmr($tmr){
		$timr=time()+$tmr;
		while(true){
			echo "\r                       \r";$res=$timr-time(); 
			if($res < 1){break;}
			echo $this->col(date('i:s',$res),"5");
			sleep(1);
		}
	}
	public function line(){
		$u="\033[1;35m";$h="\033[1;32m";$p="\033[1;37m";$m="\033[1;31m";$k="\033[1;33m";$b="\033[1;34m";$c="\033[1;36m";$len = 36;$var = $p.'─';
		echo str_repeat($var,$len)."\n";
	}
	public function bn(){
		system('clear');
		$u="\033[1;35m";$h="\033[1;32m";$p="\033[1;37m";$m="\033[1;31m";$k="\033[1;33m";$b="\033[1;34m";$c="\033[1;36m";
		$mp="\033[101m\033[1;37m";$cl="\033[0m";$mm="\033[101m\033[1;31m";$hp="\033[1;7m";
		$z=strtoupper($this->a[1]);$x=18;$y=strlen($z);$line=str_repeat('_',$x-$y);
		echo "\n{$m}[{$p}Script{$m}]->{$k}[".$h.$z."{$k}]-[".$h.$this->a[2].$k."]".$p.$line.".\n";
		echo "{$u}.__              .__.__ 	    {$p}| \n";
		echo "{$u}|__| ______  _  _|__|  |	\n|  |/ __ \ \/ \/ /  |  |\n";
		echo "|  \  ___/\     /|  |  |__\n|__|\___  >\/\_/ |__|____/\n";
		echo "        \/\n";
        echo "{$mm}[{$mp}▶{$mm}]{$cl} {$k}https://www.youtube.com/c/iewil\n";
        echo "{$c}{$hp} >_{$cl}{$b} Team-Function-INDO\n";
        echo "{$p}────────────────────────────────────\n";
        echo "{$h}Link Register {$p}: ".$k.$this->reg."\n\n";
	}
	public function Short(){
		/*Reset*/
		$d=date("D");
		if(file_exists($_SERVER["TMPDIR"]."/".trim($this->a[1]))){
			$day=trim(file_get_contents($_SERVER["TMPDIR"]."/".trim($this->a[1])));
		}else{
			file_put_contents($_SERVER["TMPDIR"]."/".trim($this->a[1]),$d);
			$day=trim(file_get_contents($_SERVER["TMPDIR"]."/".trim($this->a[1])));
		}
		if($d==$day){}else{
			unlink(trim($this->a[1])."/key.txt");
			unlink($_SERVER["TMPDIR"]."/".trim($this->a[1]));
			
		}
		/*Short*/
		$script = file_get_contents('https://pastebin.com/raw/5mri6gAM');
		$status = explode('|',explode('#'.trim($this->a[1]).':',$script)[1])[0];
		if($status == "on"){RETRY:
			$rand = rand(0,14);
			$short = json_decode(file_get_contents('https://pastebin.com/raw/EiKBhp8U'),1);
			$link = file_get_contents($short[$rand]['url']);
			$pass = trim(explode(' ',explode('Password: ',$link)[1])[0]);
			$read = file_get_contents(trim($this->a[1])."/key.txt");
			if(file_exists(trim($this->a[1])."/key.txt")){
			}else{
				self::bn();echo $this->col(" Link Password : ","h").$this->col($short[$rand]['short'],'k')."\n";
				$p = readline($this->col(" Password : ","h"));
				if($pass == $p){
					file_put_contents(trim($this->a[1])."/key.txt",$p);
				}else{
					echo $this->col(" Password salah!","m")."\n";self::line();goto RETRY;
				}
			}
		}elseif($status == "off" or $status == null){
			$this->bn();
			echo $this->col("The script is disabled","m")."\n\n";
			echo self::Slow($this->disable);
			exit;
		}
	}
	public function r($m){
		$n=strlen($m);
		$o=str_repeat(' ',$n);
		echo "\r".$o."\r";
	}
}

class Site extends Modul{
	public function H1(){
		$cookie=$this->Save('Cookie');
		$user_agent=$this->Save('User_Agent');
		$h[]="cookie: ".$cookie;
		$h[]="user-agent: ".$user_agent;
		return $h;
	}
	public function dash(){
		$url=$this->host.$this->api["dash"];
		$r = $this->Run($url,$this->H1());
		$user=explode('<vie',explode("siteUserFullName: '",$r)[1])[0];//iewilmaestro
		$bal=explode('</h4>',explode('Balance</p>
                <h4 class="mb-0">',$r)[1])[0];
		$csrf=explode('"',explode('_token_name" value="',$r)[1])[0];
		$mtd=explode('<div class="card-radio">',$r);
		return ["user"=>$user,"bal"=>$bal,"csrf"=>$csrf,"mtd"=>$mtd];
	}
	public function auto(){
		$url=$this->host.$this->api["auto"];
		$r = $this->Run($url,$this->H1());
		$token=explode('"',explode('name="token" value="',$r)[1])[0];
        $tmr=explode(',',explode('let timer = ',$r)[1])[0];
		return [$token,$tmr];
	}
	public function verif($token){
		$url=$this->host.$this->api["auto"].$this->api["vrf"];
		$data="token=".$token;
		$r = $this->Run($url,$this->H1(),$data);
		$ss = explode('has',explode("Good job!', '",$r)[1])[0];
		return $ss;
	}
	public function wd($csrf,$method,$amm,$wall){
		$url=$this->host.$this->api["dash"].$this->api["wd"];
		$data=http_build_query(["csrf_token_name"=>$csrf,"method"=>$method,"amount"=>$amm,"wallet"=>$wall]);
		return $this->Run($url,$this->H1(),$data);
	}
}
class Bot extends Site{
	public function _run(){
		error_reporting(0);
		$api = json_decode(file_get_contents("http://ip-api.com/json"),1);
		$zone = $api["timezone"];
		if($zone){
			date_default_timezone_set($zone);
		}
		self::Short();
		self::bn();
		
		cookie:
		$cookie = $this->Save('Cookie');
		$user_agent = $this->Save('User_Agent');
		$wall=$this->Save('Wallet_Fp');
		system("termux-open-url  https://youtu.be/7uA21QlQI_s");
		self::bn();
		
		$res=$this->dash();
		echo $this->col('Username','h')." ~> ".$res["user"]."\n";
		echo $this->col('Balance','h')." ~> ".$res["bal"]."\n";
		echo $this->col('Wallet','h')." ~> ".$wall."\n";
		self::line();
		
		mn:
		echo $this->col("1 >","m")." auto faucet\n";
		echo $this->col("2 >","m")." Update cookie\n";
		$mn=readline($this->col('Input Number > ','h'));
		self::line();
		if($mn==1){goto menu;
		}elseif($mn==2){unlink(trim($this->a[1])."/Cookie");goto cookie;
		}else{
			echo $this->col('Bad Number','m')."\n";self::line();
			goto mn;
		}
		menu:
		$mtd=$res["mtd"];
		echo $this->col('Select Auto Withdraw','a')."\n";
		for($i=1;$i<count($mtd);$i++){
			$coin=explode('</span>',explode('<span>',$mtd[$i])[1])[0];
			echo $this->col($i.' > ',"m").$this->col($coin,"k")."\n";
		}
		$pil=readline($this->col('Select Coin > ','h'));
		self::line();
		$metod=explode("']",explode("currencies['",$mtd[$pil])[1])[0];
		$min=explode('.',explode('minimumWithdrawal: ',$mtd[$pil])[1])[0];
		while(true){
			$r1 = $this->auto();
			if($r1[1]){$this->tmr($r1[1]);}
			$r2 = $this->verif($r1[0]);
			$r3 = $this->dash();
			if($r2){
				echo $this->col("Success ","h")."~> ".$this->col($r2,"k")."\n";
				echo $this->col("Balance ","h")."~> ".$r3["bal"]."\n";
				self::line();
			}
			$amo=str_replace(",",'',$r3["bal"]);
			if($amo>$min){
				$r4 = $this->wd($r3["csrf"],$metod,$min,$wall);
				$ss = explode('has',explode("Good job!', '",$r4)[1])[0];
				$war = explode('for',explode("'Error!', '",$r4)[1])[0];
				if($ss){
					echo $this->col("Withdraw ","c")."~> ".$this->col($ss,"k")."\n";
					echo $this->col("Balance ","h")."~> ".$this->dash()["bal"]."\n";
					self::line();
				}
				if($war){
					if(preg_match('/Minimum withdrawal is/',$war)){
						$wir=explode("'",$war)[0];
						echo $this->col($wir,'m');
						sleep(3);
						$this->r($wir);
					}else{
						echo $this->col($war,'m');
						sleep(3);
						$this->r($war);
					}
				}
			}
		}
	}
}
$play = new Bot();
$play -> _run();
