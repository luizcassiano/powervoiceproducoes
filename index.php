<?php
session_start();



if($_SERVER['REQUEST_METHOD'] == 'POST') {

$_SESSION['msg'] = '';

$url = "https://www.google.com/recaptcha/api/siteverify";
$respon = $_POST['g-recaptcha-response'];

$data = array('secret' => "6Leqk6UUAAAAAPAdJrg9tj0c0ROr-PSmNUArpSuM", 'response' => $respon);

$options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)

        )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$jsom = json_decode($result);

if ($jsom->success) {
    
	        $enviaFormularioParaNome = 'Alexandre Cassiano';
			$enviaFormularioParaEmail = 'alexandrecassiano@uol.com.br';
			$caixaPostalServidorNome = 'Contato Power Voice';
			$caixaPostalServidorEmail = 'alexandrecassiano@uol.com.br';
			$caixaPostalServidorSenha = 'D20M1012';
			 
			/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
			 
			 
			/* abaixo as veriaveis principais, que devem conter em seu formulario*/
			 
			$remetenteNome  = $_POST['nome'];
			$remetenteEmail = $_POST['email'];
			$telefone  = $_POST['telefone'];
			$mensagem = $_POST['mensagem'];
			 
			$mensagemConcatenada = 'Formulário gerado via website'.'<br/>'; 
			$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
			$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
			$mensagemConcatenada .= 'E-mail: '.$remetenteEmail .'<br/>'; 
			$mensagemConcatenada .= 'telefone: '.$telefone.'<br/>';
			$mensagemConcatenada .= '-------------------------------<br/><br/>'; 
			$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
			 
			 
			/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
			 
			require_once('PHPMailer-master/PHPMailerAutoload.php');


			 
			$mail = new PHPMailer();
			 
			$mail->SMTPSecure = 'tls';
			$mail->IsSMTP();
			$mail->SMTPAuth  = true;
			$mail->Charset   = 'utf8_decode()';
			$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
			$mail->Port  = '587';
			$mail->Username  = $caixaPostalServidorEmail;
			$mail->Password  = $caixaPostalServidorSenha;
			$mail->From  = $caixaPostalServidorEmail;
			$mail->FromName  = utf8_decode($caixaPostalServidorNome);
			$mail->IsHTML(true);
			$mail->Subject  = utf8_decode('Contato Power Voice');
			$mail->Body  = utf8_decode($mensagemConcatenada);
			 
			 
			$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
			 
			if(!$mail->Send()){
			$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);

			}else{
			 // $mensagemRetorno = 'Formulário enviado com sucesso!';
			 // header('Location: http://powervoiceproducoes.com.br/confirma.html');
			 
			 $_SESSION['msg'] = '';
			 $_SESSION['msg'] =' <div class="alert alert-sucess">Mensagem enviada com sucesso</div>';
			 header("Location: http://powervoiceproducoes.com.br/index.php");	
			
			} 
	
				
	
} else {
   
   
	  $_SESSION['msg'] = '';
      $_SESSION['msg'] ='<div class="alert alert-danger">Preencha o captcha</div>';
      header("Location: http://powervoiceproducoes.com.br/index.php");	
   
}

} else {
	


	
}
?>

<!DOCTYPE html>



<html class="no-js">
<head>


  <!-- title and meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="Locutores para publicidade, documentários, e-learning, URA, TTS, videos, rádio, TV, games, e GPS">
  <meta name="keywords" content="locução, locutor, narração, apresentaçao, interpretação, áudio, propaganda, comerciais, rádio, eventos, mestre de cerimônias, Brasil, Europa, Asia, Estados Unidos, publicidade, produção de áudio, voice-over">
  <link rel="shortcut icon" href="img/test.ico" >
  <title>Power Voice Produções</title>

  <!-- css -->
 <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/base.css">
 <link rel="stylesheet" href="css/style.css">

  <!-- js -->
  <script src="js/modernizr.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

  
</head>

<body>



  
<div class="wrapper">



  <main>
      
      <section class="module parallax parallax-1">
        <div class="container"><br/><br/><br/>
          <h1><img class="img" style="position: center center" id="logoprincipal" src="img/logo1.png"/><span></h1>
          
        </div>
      </section>

      <section class="module content">
        <div class="container">
		     <div class="text-right">
          	Language<br/>
          	<a href="http://www.powervoiceproducoes.com.br"><img style="width:30px" src="img/brasil.png"/></a> <a href="http://www.powervoiceproducoes.com/index1.php"><img style="width:30px"  src="img/usa.png"/> </a>
          </div>
          <h2>Ação, Reação e Sucesso</h2>
            <p>Atualmente, é extremamente importante alinhar mecanismos e ações que faça com que você apareça para o mercado de modo a atrair oportunidades de negócio. Entendemos que isso também se aplica a mensagem que a sua empresa passa por meio de uma campanha publicitária e de todo o planejamento de mídia visando atender o seu público alvo.<br>

Muito prazer, esta é a Power Voice e somos a ferramenta ideal para que você possa aparecer para o seu público. Não fazemos apenas spots de áudio ou gravamos locuções - queremos agregar valor a sua campanha para que sua empresa ou produto seja sempre lembrado pela qualidade e assertividade com que se comunica com o seu público.</p>




        </div>
      </section>

      <section class="module parallax parallax-2">
        <div class="container">
          <h1>Portfólio</h1>
        </div>
      </section>

      <section class="module content">
        <div class="container">
          <h2>Áudios</h2>
		      <!-- Start Top Header -->
		<div id="top-header" class="hidden-on-collapse">
			<div id="top-header-toggle" class="small-player-toggle-contract"></div>

			<div class="now-playing-title" amplitude-song-info="name"></div>
			<div class="album-information"><span amplitude-song-info="artist"></span> - <span amplitude-song-info="album"></span></div>
		</div>
		<!-- End Top Header -->

		<!-- Start Large Album Art -->
		<div id="top-large-album" class="hidden-on-collapse">
			<img id="large-album-art" amplitude-song-info="cover"/>
		</div>
		<!-- End Large Album Art -->

		<!-- Begin Small Player -->
		<div id="small-player">
			<!-- Begin Small Player Left -->
			
			<!-- End Small Player Left -->

			<!-- Begin Small Player Album Art -->
			<img id="small-player-album-art" class="hidden-on-expanded" amplitude-song-info="cover"/>
			<!-- End Small Player Album Art -->

			<!-- Begin Small Player Middle -->
			<div id="small-player-middle" class="hidden-on-expanded">	
				<div id="small-player-middle-top">
					<!-- Begin Controls Container -->
					<div id="small-player-middle-controls">
						<div class="amplitude-prev" id="middle-top-previous"></div>
						<div class="amplitude-play-pause amplitude-paused" amplitude-main-play-pause="true" id="middle-top-play-pause"></div>
						<div class="amplitude-next" id="middle-top-next"></div>
					</div>
					<!-- End Controls Container -->

					<!-- Begin Meta Container -->
					<div id="small-player-middle-meta">
						<div class="now-playing-title" style= "text-align: center" amplitude-song-info="name"></div>
						<div class="album-information"><span   amplitude-song-info="artist"></span> - <span style= "text-align: center" amplitude-song-info="album"></span></div>
					</div>
					<!-- End Meta Container -->
				</div>
				
				<div id="small-player-middle-bottom">
					<div class="amplitude-song-time-visualization" amplitude-single-song-time-visualization="true" id="song-time-visualization"></div>
				</div>
			</div>
			<!-- End Small Player Middle -->

			<!-- Begin Small Player Right -->
			<div id="small-player-right" class="hidden-on-expanded">
				
				<span class="current-time">
					<span class="amplitude-current-minutes" amplitude-single-current-minutes="true">0</span>:<span class="amplitude-current-seconds" amplitude-single-current-seconds="true">00</span>
				</span>
			</div>
			<!-- End Small Player Right -->

			<!-- Begin Small Player Full Bottom -->
			<div id="small-player-full-bottom" class="hidden-on-collapse">
				<div id="toggle-playlist-full" class="playlist-toggle"></div>
				<div id="small-player-full-bottom-controls">
					<div class="amplitude-prev" id="middle-bottom-previous" ></div>
					<div class="amplitude-play-pause amplitude-paused" amplitude-main-play-pause="true" id="small-player-bottom-play-pause"></div>
					<div class="amplitude-next" id="middle-top-next"></div>
				</div>
				<div id="small-player-full-bottom-info">
					<span class="current-time">
						<span class="amplitude-current-minutes" amplitude-single-current-minutes="true">0</span>:<span class="amplitude-current-seconds" amplitude-single-current-seconds="true">00</span>
					</span>
					
					<div class="amplitude-song-time-visualization" amplitude-single-song-time-visualization="true" id="song-time-visualization-large"></div>
					
					<span class="time-duration">
						<span class="amplitude-duration-minutes" amplitude-single-duration-minutes="true">0</span>:<span class="amplitude-duration-seconds" amplitude-single-duration-seconds="true">00</span>
					</span>
				</div>
			</div>
			<!-- End Small Player Full Bottom -->
		</div>
		    
            
        </div>
		
		<div class="container" style="margin-top: 30px">
			<h2>Videos</h2>
			
			            <div class="col-sm-12 col-xs-12 col-md-12">
								<iframe  src="https://www.youtube.com/embed/i-Wrmy7yRco" frameborder="0" class="video1" height="260px" width="290px" allowfullscreen></iframe>
								
								<iframe  src="https://www.youtube.com/embed/AgaKQtjD-kg" frameborder="0" class="video2" height="260px" width="290px"  allowfullscreen> </iframe>
								
								<iframe  src="https://www.youtube.com/embed/6dPFbdPB4CU" frameborder="0" class="video3" height="260px" width="290px" allowfullscreen></iframe>
			            </div>
		</div>
		
      </section>


     
      <section class="module parallax parallax-3">
        <div class="container">
          <h1>Clientes</h1>
        </div>
      </section>

      <section class="module content clientes">
        <div class="container">
          <h2 class="title-clientes">Nossos Clientes</h2>
            <div class="container">
                <div class="col-md-12">
                  <div class="col-md-4  text-center">
                     <img src="img/casasbahia.png" class="cliente1"/>
                  </div>
                  <div class="col-md-4  text-center">
                   <img src="img/dia.png" class="cliente2"/>
                  </div>
                  <div class="col-md-4  text-center">
                    <img src="img/kanamobi.jpg" class="cliente3"/>
                  </div>
                 
                </div>
                <div class="col-md-12" style="margin-top: 30px">
				  <div class="col-md-4  text-center">
                       <img src="img/pernambucanas.png" class="cliente4"/>
                  </div>
                  <div class="col-md-4  text-center">
                     <img src="img/radioacao.jpg" class="cliente5"/>
                  </div>
                  <div class="col-md-4  text-center">
                     <img src="img/tragora.jpg" class="cliente6"/>
                  </div>
                  
                  
                </div> 
				<div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 30px">
					<div class="col-sm-12 col-xs-12 col-md-6 col-md-offset-3">
						<img src="img/trivago.png" class="cliente7"/>
					</div>
				</div>
                
                
               
             
                <!--    <div class="col-md-3  text-center">
                <img src="img/clientes/oliver.png" style="padding-top:70px;"/>
            </div>-->
          </div>
        </div>
      </section>
      
      <section class="module parallax parallax-4">
        <div class="container">
          <h1>Sobre Nós</h1>
        </div>
      </section>

      <section class="module content">
        <div class="container" style=" width: 100%;">
        
          <h2>Muito Prazer</h2>
		 
                <div class="col-md-12 " style="float:center">
				    <div class="col-md-5 col-md-offset-3" >
				       <img class="img-responsive img-circle" src="img/foto1.png"  style="width: 200px; height: 200px; display: block;" id="foto"/>
					    <p id="fotolegenda" >Alexandre Cassiano</p>
					
					</div>
				</div>
				  <div class="col-md-12 " style="float:center; margin-bottom: 20px">
						<p>
						
					
						Formado em Gestão Empresarial pelo SENAC, Marketing pela Universidade Metodista de São Paulo, Locução pela Radioficina e Mestre de Cerimônias pelo SENAC. 
						Atua na área de locução desde 2008, tendo atuado em projetos específicos de rádio indoor (estúdio in loco e via internet), locução publicitária e voice-over, atendendo além do mercado nacional também a outros países como Espanha e Alemanha. 
						Como Mestre de Cerimônias, possui experiência na condução de eventos corporativos, sociais, esportivos e na área educacional.
						
						
						</p>
				 </div>	
				 
				 
				 <div class="col-md-12 " style="float:center">
				    <div class="col-md-5 col-md-offset-3" >
				       <img class="img-responsive img-circle" src="img/foto2.png"  style="width: 200px; height: 200px; display: block;" id="foto"/>
					    <p id="fotolegenda1" >Elis Lessa</p>
					
					</div>
				</div>
				  <div class="col-md-12 " style="float:center">
						<p>
						
					
						Formada em Jornalismo pela Universidade Paulista, Locução e Sonoplastia pela Radioficina. 
								Atua na área desde 2007 com projetos realizados em produção/redação de programas de rádio, locução de chamadas, apresentação de programas de rádio além de produção, direção e gravação de spots comerciais. 
								Atuou também como voice-over na locução de documentários exibidos na Europa e em países de Língua Portuguesa.
						
						</p>
				 </div>	
				
				
				
       </div> 
   
		
				
      </section>
	  
	  <section class="module parallax parallax-5">
        <div class="container"><br/><br/><br/>
          <h1>Contato</h1>
          
        </div>
      </section>
	   
	   
	    <section class="module content">
        <div class="container">
        
          <h2>Contato</h2>
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" role="form" action="index.php" method="post">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Nome" name="nome" required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email" required>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputEmail3" placeholder="Telefone" name="telefone" required>
							</div>
						  </div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Mensagem</label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3" name="mensagem" required></textarea>
							</div>
						  </div>
						  
						

							  <div class="g-recaptcha" data-sitekey="6Leqk6UUAAAAALt3k6wuXEVRw1nwYsf1D5Y7f1jF" style="width: 340px;height: 120px"></div>
							  
							  
							  
						</div>
						
					 <div class="col-sm-10">	
						<div class="form-group">
							<?php 
											
											echo $_SESSION['msg'];
					
										
						 ?>
						</div>
					</div>	
						  
						  
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" name="enviar" class="btn btn-default center-block">Enviar</button>
							</div>
						  </div>
				</form>
            </div>
</section>
  </main><!-- /main -->



 
</div><!-- /#wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script type="text/javascript" src="js/amplitude.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>


<!-- ads -->





		

				
	<script type="text/javascript">
		Amplitude.init({
			"songs": [
{
					"name": "Piloto Itau",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio1.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				},
				{
					"name": " Piloto Pernambucanas",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio2.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				},
				{
					"name": "Piloto UsiMinas",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio3.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				},
				{
					"name": "Piloto Volkswagem",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio4.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				},
				{
					"name": "Piloto Lacta",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio5.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				},
				{
					"name": "Piloto MaisFM",
					"artist": "Alexandre Cassiano",
					"album": "Power Voice",
					"url": "audio/audio6.mp3",
					"live": false,
					"cover_art_url": "img/minilogo.png"
				}
			
			
			
				
			],
			"default_album_art": "images/no-cover-large.png"
		});

		var expanded = false;
		var playlistEpxanded = false;
		/*
			jQuery Visual Helpers
		*/
		$('#small-player').hover(function(){
			$('#small-player-middle-controls').show();
			$('#small-player-middle-meta').hide();
		}, function(){
			$('#small-player-middle-controls').hide();
			$('#small-player-middle-meta').show();

		});

		$('#top-large-album').hover(function(){
			$('#top-header').show();
			$('#small-player').show();
		}, function(){
			if( !$('#top-header').is(':hover') && !$('#small-player').is(':hover') ){
				$('#top-header').fadeOut(1000);
				$('#small-player').fadeOut(1000);
			}
		});

		$('#top-header').hover(function(){
			$('#top-header').show();
			$('#small-player').show();
		}, function(){

		});

		/*
			Toggles Album Art
		*/
		$('#small-player-toggle').click(function(){
			$('.hidden-on-collapse').show();
			$('.hidden-on-expanded').hide();
			/*
				Is expanded
			*/
			expanded = true;

			$('#small-player').css('border-top-left-radius', '0px');
			$('#small-player').css('border-top-right-radius', '0px');
		});

		$('#top-header-toggle').click(function(){
			$('.hidden-on-collapse').hide();
			$('.hidden-on-expanded').show();
			/*
				Is collapsed
			*/
			expanded = false;

			$('#small-player').css('border-top-left-radius', '5px');
			$('#small-player').css('border-top-right-radius', '5px');
		});

		$('.playlist-toggle').click(function(){
			if( playlistEpxanded ){
				$('#small-player-playlist').hide();

				$('#small-player').css('border-bottom-left-radius', '5px');
				$('#small-player').css('border-bottom-right-radius', '5px');

				$('#large-album-art').css('border-bottom-left-radius', '5px');
				$('#large-album-art').css('border-bottom-right-radius', '5px');

				playlistEpxanded = false;
			}else{
				$('#small-player-playlist').show();

				$('#small-player').css('border-bottom-left-radius', '0px');
				$('#small-player').css('border-bottom-right-radius', '0px');

				$('#large-album-art').css('border-bottom-left-radius', '0px');
				$('#large-album-art').css('border-bottom-right-radius', '0px');

				playlistEpxanded = true;
			}
		})
	</script>
</body>
</html>