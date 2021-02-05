<!DOCTYPE html>
<html>
<head>
<title>DATABASE</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
</html>

<?php
$conn =new mysqli('localhost', 'root', '' , '');

// Create project database
$sql = "CREATE DATABASE computacao_persuasiva CHARACTER SET utf8 COLLATE utf8_unicode_ci";
if ($conn->query($sql) === TRUE) {
  echo '<div class="alert alert-success" role="alert">
			Base de dados criada com sucesso!
		</div>';
} else {
  echo '<div class="alert alert-success" role="alert">
			Erro na criação da base de dados: '
		 . $conn->error;
}



// sql to create tables
$sql = "
	CREATE TABLE computacao_persuasiva.users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	reciprocidade DOUBLE NOT NULL DEFAULT 1,
	autoridade DOUBLE NOT NULL DEFAULT 1,
	consenso DOUBLE NOT NULL DEFAULT 1,
	escassez DOUBLE NOT NULL DEFAULT 1,
	total_clicks DOUBLE NOT NULL DEFAULT 4
    )";

$sql2 = "	
	CREATE TABLE computacao_persuasiva.produtos (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(45) NOT NULL,
    preco DOUBLE NOT NULL,
    image_link VARCHAR(300) NOT NULL,
    descricao VARCHAR(300) NOT NULL
    )";

$sql3 = "	
	CREATE TABLE computacao_persuasiva.mensagens (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    produto_id INT(11) NOT NULL,
    msg_tipo INT(11) NOT NULL,
    msg VARCHAR(300) NOT NULL
    )"; 
	
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
      echo '<div class="alert alert-success" role="alert">
				Tabelas criadas com sucesso!
			</div>';
    } else {
      echo '<div class="alert alert-success" role="alert">
			Erro na criação da tabela: '. $conn->error;
    }
	
// sql to insert data
$sql = "INSERT INTO computacao_persuasiva.users (
    id, firstname, lastname, email, pass, reg_date,
	reciprocidade, autoridade, consenso, escassez, total_clicks) VALUES 
	(1, 'Reciprocidade', 'User', 'reciprocidade@gmail.com', 'persuasive', '2021-01-20 19:25:47', 9, 3, 2, 1, 15),
	(2, 'Autoridade', 'User', 'autoridade@gmail.com', 'persuasive', '2021-01-07 12:18:04', 1, 9, 2, 3, 15),
	(3, 'Consenso', 'User', 'consenso@gmail.com', 'persuasive', '2021-01-07 12:18:04', 2, 3, 9, 1, 15),
	(4, 'Escassez', 'User', 'escassez@gmail.com', 'persuasive', '2021-01-20 19:37:19', 3, 2, 1, 9, 15)";
	
$sql2 = "INSERT INTO computacao_persuasiva.produtos (
    id, titulo, preco, image_link, descricao) VALUES
	(1, 'Monitor Gaming Curvo ASUS 31.5\" WQHD', 473.99, 'https://images-na.ssl-images-amazon.com/images/I/81zA8CcN7nL._AC_SL1500_.jpg', N'Monitor Curvo Gaming de 31.5 polegadas com \r\nresolução de 2560 x 1440 pixels cuja \r\nproporção de imagem nativa é 16:9.\r\nTipo de painel VA \r\ncom tempo de resposta de 1ms e uma \r\ntaxa máxima de atualização a 144 Hz.\r\nPossui apenas tecnologia AMD FreeSync.'),
	(2, 'Monitor Gaming Alienware 25\"', 409.77, 'https://images-na.ssl-images-amazon.com/images/I/91EN10GQToL._AC_SL1500_.jpg', N'Monitor Gaming Alienware de 25 polegadas com \r\nresolução de 1920 x 1080 pixels cuja \r\nproporção de imagem nativa é 16:9. \r\nTipo de painel IPS \r\ncom tempo de resposta de 1 ms e uma \r\ntaxa máxima de atualização a 240 Hz. \r\nPossui tecnologia NVIDIA G-SYNC e AMD FreeSync.'),
	(3, 'Monitor Gaming Benq ZOWIE 24.5\" ', 556.19, 'https://zowie.benq.com/content/dam/game/en/product/monitor/xl2546/gallery/xl2546-5.png', N'Monitor Gaming Benq ZOWIE de 24.5 polegadas com \r\nresolução de 1920 x 1080 pixels cuja \r\nproporção de imagem nativa é 16:9.\r\nTipo de painel TN \r\ncom tempo de resposta de 1 ms e uma \r\ntaxa máxima de atualização a 240 Hz.\r\nNão possui tecnologia NVIDIA G-SYNC ou AMD FreeSync.'),
	(4, 'Smart TV LG OLED 75\" 4K', 6966.52, 'https://www.lg.com/pt/images/tv/md06105938/gallery/Z01_large01_v1.jpg', N'Televisor inteligente de 75 polegadas, \r\numa diagonal de 191cm, com um painel OLED e uma \r\nresolução 4K Ultra HD.\r\nPossui tecnologias de áudio Dolby Atmos, Ultra Surround, Som AI Pro e Sintonização acústica AI.'),
	(5, 'Smart TV Samsung QLED 75\" 4K', 4499.99, 'https://images.samsung.com/is/image/samsung/pt-qled-q70t-qe75q70tatxxc-frontblack-221817040?$684_547_PNG$', N'Televisor inteligente de 75 polegadas, \r\numa diagonal de 190cm, com um painel QLED e uma \r\nresolução 4K Ultra HD de 3840x2160 px.\r\nPossui tecnologia de áudio Dolby Digital Plus.'),
	(6, 'Smart TV SONY LED 65\" 4K', 1149.01, 'https://images-na.ssl-images-amazon.com/images/I/61Asz5ty14L._AC_SL1200_.jpg', N'Televisor inteligente de 65 polegadas, \r\numa diagonal de 165cm, com um painel LCD-LED e uma \r\nresolução 4K Ultra HD.\r\nPossui tecnologia de áudio Dolby Audio, Dolby Atmos, Surround Digital DTS, Acoustic Multi-Auido, \r\nTweeter de posicionamento sonoro, X-Balanced Speaker e S-Force Front Surround.')";
	
$sql3 = "INSERT INTO computacao_persuasiva.mensagens (
    id, produto_id, msg_tipo, msg) VALUES 
	(1, 1, 1, N'Compre já e oferecemos um vale-oferta no valor de 50\€, de uma plataforma a escolha!'),
	(2, 1, 2, N'O conhecido youtuber \"PewDiePie\" possui este monitor, compre também!'),
	(3, 1, 3, N'De todos os monitores na loja, este foi o mais vendido no último ano!'),
	(4, 1, 4, N'Apenas 1 unidade em armazém!'),
	(5, 2, 1, N'Só para si, oferecemos um acessório à escolha até 15% do valor da sua compra!'),
	(6, 2, 2, N'O famoso streamer \"Ninja\" de Fortnite e Valorant usa este monitor todos os dias, junte-se a ele!'),
	(7, 2, 3, N'60% dos jogadores que compram nesta loja, compraram este monitor!'),
	(8, 2, 4, N'Ultimas unidades!'),
	(11, 3, 1, N'Oferta especial de 50€ de desconto numa futura compra!'),
	(12, 3, 2, N'A equipa \"Astralis\" de CS:GO faz toda uso deste mesmo monitor, transforme-se num profissional!'),
	(13, 3, 3, N'Num fim-de-semana foram vendidos mais de 50 monitores deste modelo!'),
	(14, 3, 4, N'Edição limitada!'),
	(15, 4, 1, N'Receba 3 meses gratuítos de Neftlix na compra deste televisor!'),
	(16, 4, 2, N'O jogador de futebol Leo Messi revê os seus jogos num televisor destes!'),
	(17, 4, 3, N'No último mês, este televisor foi a escolha nº1 dos clientes!'),
	(18, 4, 4, N'Limitado ao stock existente!'),
	(19, 5, 1, N'Receba uma sound bar de forma gratuíta para acompanhar este televisor!'),
	(20, 5, 2, N'O ator Tom Holland adora ver as suas interpretações neste televisor!'),
	(21, 5, 3, N'70% das pessoas que viram este televisor, compraram!'),
	(22, 5, 4, N'2 unidades restantes!'),
	(23, 6, 1, N'Receba 3 meses gratuitos de Disney plus na compra deste televisor!'),
	(24, 6, 2, N'A cantora Beyoncé gosta de ver televisão com os seus filhos. Este é o seu televisor de eleição!'),
	(25, 6, 3, N'Este é o televisor com mais procura na loja!'),
	(26, 6, 4, N'Ultimas unidades!')"; 
	
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
      echo '<div class="alert alert-success" role="alert">
				Dados inseridos com sucesso!
			</div>';
    } else {
      echo '<div class="alert alert-success" role="alert">
			Erro na inserção dos dados: '. $conn->error;
    }
?>