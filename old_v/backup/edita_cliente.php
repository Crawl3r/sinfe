<?php
	include "php/conection.php";
	include "php/querys.php";
	
	include "php/checa.php";
	
	$estados = estados($pdo_estados);
	
	$cliente = cliente_view_1($pdo,$_POST['cpf']); //seleciona o cliente pelo cpr registrado na ordem
	
	
?>

<!DOCTYPE html>
<html>
  <head>
    <title>SINFE - Sistema Emissor NFe/NFce</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    
    <meta name="description" content="See this example of responsive three highlights without using javascript. Using only html and css. by Palloi Hofmann">
    <meta name="keywords" content="css4html, css+for+html, css 4 html, css4, css4 html, css, css3, html, html5" />

    <meta property="og:image" content="http://palloi.github.io/responsive-header-only-css/assets/images/image-shared-2.png" />
    <meta property="og:keywords" content="css4html, css+for+html, css 4 html, css4, css4 html, css, css3, html, html5" />
    <meta name="description" content="See this example of responsive three highlights without using javascript. Using only html and css. by Palloi Hofmann">

    <link rel="stylesheet" type="text/css" href="css/css_section.css" />
    <link rel="stylesheet" type="text/css" href="css/css_menu.css" />
    
    <link rel="stylesheet" type="text/css" href="css/ativos.css" />
    
    <style type="text/css" media="all">
			
			#cadastro {
			  padding: 80px 00px 50px;
			  border-top: 1px solid #ccc;
			  font-size: 20px;
			  line-height: 24px;
			}
			
			#corpo{
				width: 1200px;
				min-width: 600px;
				margin: 0 auto;
				text-align: left;
				/*border: 1px solid #000;
				padding: 0px 10px 20px;*/
			}
			
			#titulo{
				margin: 0px 10px 0px;
			}
			
			#cadastro form input{
				border: 1px solid #aaa;
			}
			
			.grupo{
				
				border: 1px solid #666;
				padding: 10px 10px 0px;
				margin: 0px 10px 0px;
				background: #ece9d8;
				
			}

			
	</style>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script>
	    function buscar_cidades(){
	      var estado = $('#estado option:selected').val();
	      if(estado){
	        var url = 'php/ajax_buscar_cidades.php?estado='+estado;
	        $.get(url, function(dataReturn) {
	          $('#load_cidades').html(dataReturn);
	        });
	      }
	    }
    </script>
    
  </head>
  <!-- chamada do body e todo menu superior-->
  <?php include "menu_links.php";?>
    
    <section id="cadastro">
    	
    	<div id="corpo">
    		
    		<form action="php/edita_cliente_mec.php" method="post">
    		
    			<input type="hidden" name="id" value="<?php echo $cliente[0]['id_cliente'] ?>" />
    			
	    		<label id="titulo" for="cliente">Cliente</label>
	    		<article id="cliente" class="grupo">
	    			
	    			<div class="item">
	    				<label class="item_titulo"for="nome/razao social">*Nome/Razão Social: </label>
	    				<br />
	    				<input type="text" name="nome/razao_social" value="<?php echo $cliente[0]['nome_razao_social_cliente'] ?>" style="width: 1140px; min-width: 400px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="CPF/CNPJ">CPF/CNPJ: </label>
		    			<br />
		    			<input type="text" name="cpf/cnpj" value="<?php echo $cliente[0]['cpf_cnpj_cliente'] ?>" style="width: 150px" />
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo"for="inscricao estadual">Inscrição Estadual: </label>
		    			<br />
		    			<input type="text" name="inscricao_estadual" value="<?php echo $cliente[0]['inscricao_estadual_cliente'] ?>" style="width: 150px; min-width: 126px;" />
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo">Isento do ICMS</label>
		    			<br />
		    			<input type="checkbox" name="isencao icms" value="sim" <?php if($cliente[0]['isento_icms_cliente']=="sim") { echo 'checked'; }  ?>>
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="SUFRAMA">Inscrição SUFRAMA: </label>
		    			<br />
		    			<input type="text" name="suframa" value="<?php echo $cliente[0]['inscricao_suframa_cliente'] ?>" style="width: 150px; min-width: 84px;" />
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo"for="email">Email: </label>
		    			<br />
		    			<input type="text" name="email" value="<?php echo $cliente[0]['email_cliente'] ?>" style="width: 296px; min-width: 286px;" />
	    			</div>	
	    			<div class="item">
		    			<label class="item_titulo" for="status">Status: </label>
		    			<br />
		    			<select name="status" style="width: 176px; min-width: 100px;">
		    				<option></option>
		    				<option <?php if($cliente[0]['status_cliente'] == "ativo"){echo 'selected="selected"';} ?>>ativo</option>
		    				<option <?php if($cliente[0]['status_cliente'] == "nao ativo"){echo 'selected="selected"';} ?>>nao ativo</option>
		    			</select>
	    			</div>    			
	    			
	    		</article>
	    		
	    		<label id="titulo" for="cliente">Cobrança</label>
	    		<article id="cobranca" class="grupo">
	    			
	    			<div class="item">
	    				<label class="item_titulo"for="banco">Banco: </label>
	    				<br />
	    				<input type="text" name="banco" value="<?php echo $cliente[0]['banco_cliente'] ?>" style="width: 510px; min-width: 84px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="agencia">Agência: </label>
	    				<br />
	    				<input type="text" name="agencia"value="<?php echo $cliente[0]['agencia_cliente'] ?>" style="width: 290px; min-width: 84px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="conta">Conta: </label>
	    				<br />
	    				<input type="text" name="conta" value="<?php echo $cliente[0]['conta_cliente'] ?>" style="width: 285px; min-width: 84px;" />
	    			</div>
	    				 	
	    		</article>
	    		
	    		<label id="titulo" for="cliente">Endereço</label>	
	    		<article id="endereco" class="grupo">
	    			
	    			<div class="item">
	    				<label class="item_titulo"for="Logradouro">Logradouro: </label>
	    				<br />
	    				<input type="text" name="logradouro" value="<?php echo $cliente[0]['logradouro_cliente'] ?>" style="width: 660px; min-width: 362px;" />
	    			</div>	
	    			<div class="item">
	    				<label class="item_titulo"for="numero">Número: </label>
	    				<br />
		    			<input type="text" name="numero" value="<?php echo $cliente[0]['numero_cliente'] ?>" style="width: 80px; min-width: 33px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="complmento">Complemento: </label>
	    				<br />
		    			<input type="text" name="complemento" value="<?php echo $cliente[0]['complemento_cliente'] ?>" style="width: 345px; min-width: 126px;" />
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo"for="bairro">Bairro: </label>
		    			<br />
		    			<input type="text" name="bairro" value="<?php echo $cliente[0]['bairro_cliente'] ?>" style="width: 270px; min-width: 126px;" />
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo"for="CEP">CEP: </label>
		    			<br />
		    			<input type="text" name="cep"value="<?php echo $cliente[0]['cep_cliente'] ?>" style="width: 100px; min-width: 118px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="pais">País: </label>
	    				<br />
		    			<select name="pais">
		    				<option value=""></option>
							<option value="Brasil" selected="selected">Brasil</option>
						</select>
		    		</div>
		    		<div class="item">
		    			<label class="item_titulo" for="uf">UF: </label>
		    			<br />
		    			<select id="estado" name="uf" id="uf" onchange="buscar_cidades()">
		    				<option></option>
							 <?php 
							 	foreach ($estados as $value => $name) {
						        	if($cliente[0]['uf_cliente']==$name['codigo_ibge']){
								 		echo "<option selected value=".$name['codigo_ibge']."|".$name['uf'].">".$name['uf']."</option>";
								 	}else{
							          echo "<option value=".$name['codigo_ibge']."|".$name['uf'].">".$name['uf']."</option>";
							        }
						        }
						     ?>
						 </select>
					</div>
					<div class="item" id="load_cidades">
						 <label class="item_titulo" for="municipio">Município: </label>
						 <br />
						 <select id="cidade" name="municipio" style="width: 310px; min-width: 113px;">
						 	<option value="<?php echo $cliente[0]['cod_municipio_cliente']."|".$cliente[0]['municipio_cliente'] ?>"><?php echo $cliente[0]['municipio_cliente'] ?></option>		
						 </select>
					</div>
					<div class="item">
						 <label class="item_titulo" for="telefone">Telefone: </label>
						 <br />
						 <input type="text" name="telefone" value="<?php echo $cliente[0]['telefone_cliente'] ?>" style="width: 220px; min-width: 92px;" />
	    			</div>
					<div class="item">
						 <label class="item_titulo" for="celulare">Celular: </label>
						 <br />
						 <input type="text" name="celular" value="<?php echo $cliente[0]['celular_cliente'] ?>" style="width: 220px; min-width: 92px;" />
	    			</div>		    			
	    			
	    		</article>
	    		
	    		<label id="titulo" for="contato">Contato</label>
	    		<article id="contato" class="grupo">
	    			
	    			<div class="item">
	    				<label class="item_titulo"for="nome_contato">Nome do contato: </label>
	    				<br />
	    				<input type="text" name="nome_contato" value="<?php echo $cliente[0]['nome_contato_cliente'] ?>" style="width: 355px; min-width: 252px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="telefone_contato">Telefone do contato: </label>
	    				<br />
						<input type="text" name="telefone_contato" value="<?php echo $cliente[0]['telefone_contato_cliente'] ?>" style="width: 220px; min-width: 92px;" />
	    			</div>
	    			<div class="item">
	    				<label class="item_titulo"for="email_contato">Email do contato: </label>
	    				<br />
	    				<input type="text" name="email_contato" value="<?php echo $cliente[0]['email_contato_cliente'] ?>" style="width: 510px; min-width: 400px;" />
	    			</div>
	    				 	
	    		</article>
	    		
	    		<center>
	    			<input type="submit" value="Editar Cliente" />
	    		</center>
	    		
	    	</form>
    	
    	</div>
    	
    	
    	
    	
    </section>
        
  </body>
  
</html>
