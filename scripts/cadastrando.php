<?php 
	$formulario = $_GET['formulario'];
	include('configs.php');
	switch($formulario){
		case 0:
			$con = mysqli_connect($localhost, $user_name, $password, $db);
			if (mysqli_errno($con)) {
				header('Location: ../solicit-pedido.php?msg=Erro ao conectar!');
			} else {
				$enderecoC = $_POST['rua'].", ".$_POST['ncasa']." - ".$_POST['bairro'];
				$ins = "INSERT INTO `pizzaria`.`STATUS` (`NM_STATUS`, `DSC_STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('ATIVO', 'Registro ativo valido na base', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
				if (mysqli_query($con, $ins)) {
					$status_ult = mysqli_insert_id($con);
					$preco = 0;
					$l_sabores = mysqli_query($con, "SELECT * FROM sabores WHERE sabor = ".$_POST['s_sabores'].";");
					while($vl_sabores = mysqli_fetch_array($l_sabores)) {
						if ($vl_sabores['VL_SABOR']) {
							$preco = $preco + $vl_sabores['VL_SABOR'];
						}
					}
					$l_bebidas = mysqli_query($con, "SELECT * FROM bebidas WHERE bebida = ".$_POST['s_bebidas'].";");
					while($vl_bebidas = mysqli_fetch_array($l_bebidas)) {
						if ($vl_bebidas['VL_BEBIDA']) {
							$preco = $preco + $vl_bebidas['VL_BEBIDA'];
						}
					}
					$l_outros = mysqli_query($con, "SELECT * FROM outros WHERE outro = ".$_POST['s_outros'].";");
					while($vl_outros = mysqli_fetch_array($l_outros)) {
						if ($vl_outros['VL_OUTRO']) {
							$preco = $preco + $vl_outros['VL_OUTRO'];
						}
					}
					$ins2 = "INSERT INTO `pizzaria`.`pedido` (`VL_PEDIDO`, `NM_CLIENTE`, `ENDERECO`, `SABOR`, `BEBIDA`, `OUTRO`, `OBSERVACAO`, `STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('".$preco."', '".$_POST['nm_cliente']."', '".$enderecoC."', '".$_POST['s_sabores']."', '".$_POST['s_bebidas']."','".$_POST['s_outros']."', 'Nenhum', '".$status_ult."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
					if (mysqli_query($con, $ins2)) {
						header('Location: ../solicit-pedido.php?msg=Registro inserido!');
					} else {
						header('Location: ../solicit-pedido.php?msg=Erro ao inserir'.mysqli(error($con)));
					}
				} else {
					header('Location: ../solicit-pedido.php?msg=Erro ao inserir'.mysqli(error($con)));
				}
			}	
			mysqli_close($con);
			break;
		case 1:
			$con = mysqli_connect($localhost,$user_name,$password,$db);
			if (mysqli_errno($con)) {
				header('Location: ../cad-cliente.html?msg=Erro ao conectar!');
			} else {
				$enderecoC = $_POST['rua'].", ".$_POST['ncasa']." - ".$_POST['bairro'];
				$ins = "INSERT INTO `pizzaria`.`STATUS` (`NM_STATUS`, `DSC_STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('ATIVO', 'Registro ativo valido na base', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
				if(mysqli_query($con, $ins)) {
					$ins2 = "INSERT INTO `pizzaria`.`cliente` (`NM_CLIENTE`, `ENDERECO`, `TELEFONE`, `STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('".$_POST['nome']."', '".$enderecoC."', '".$_POST['tel']."', ".mysqli_insert_id($con).", '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
					if (mysqli_query($con, $ins2)) {
						header('Location: ../cad-cliente.html?msg=Registro inserido!');
					} else {
						header('Location: ../cad-cliente.html?msg=Erro ao inserir'.mysqli(error($con)));
					}
				} else {
					header('Location: ../cad-cliente.html?msg=Erro ao inserir'.mysqli(error($con)));
				}
				mysqli_close($con);
			}
			break;
		case 2:
			$con = mysqli_connect($localhost, $user_name, $password, $db);
			if(mysqli_errno($con)) {
				header('Location: ../cad-refri.html?msg=Erro ao conectar!');
			} else {
				$ins = "INSERT INTO `pizzaria`.`STATUS` (`NM_STATUS`, `DSC_STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('ATIVO', 'Registro ativo valido na base', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
				if (mysqli_query($con, $ins)) {
					$ins2 = "INSERT INTO `pizzaria`.`bebidas` (`NM_BEBIDA`, `VL_BEBIDA`, `DSC_BEBIDA`, `STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('".$_POST['nm_bebida']."', '".$_POST['vl_bebida']."', '".$_POST['nm_bebida']."', '".mysqli_insert_id($con)."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
					if (mysqli_query($con, $ins2)) {
						header('Location: ../cad-refri.html?msg=Registro inserido!');
					} else {
						header('Location: ../cad-refri.html?msg=Erro ao inserir'.mysqli(error($con)));
					}
				} else {
					header('Location: ../cad-refri.html?msg=Erro ao inserir'.mysqli(error($con)));
				}
			}
			mysqli_close($con);
			break;
		case 3:
			$con = mysqli_connect($localhost, $user_name, $password, $db);
			if(mysqli_errno($con)) {
				header('Location: ../cad-pizza.html?msg=Erro ao conectar!');
			} else {
				$ins = "INSERT INTO `pizzaria`.`STATUS` (`NM_STATUS`, `DSC_STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('ATIVO', 'Registro ativo valido na base', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
				if (mysqli_query($con, $ins)) {
					$ins2 = "INSERT INTO `pizzaria`.`sabores` (`NM_SABOR`, `VL_SABOR`, `DSC_SABOR`, `STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('".$_POST['nm_pizza']."', '".$_POST['vl_pizza']."', '".$_POST['nm_pizza']."', '".mysqli_insert_id($con)."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
					if (mysqli_query($con, $ins2)) {
						header('Location: ../cad-pizza.html?msg=Registro inserido!');
					} else {
						header('Location: ../cad-pizza.html?msg=Erro ao inserir'.mysqli(error($con)));
					}
				} else {
					header('Location: ../cad-pizza.html?msg=Erro ao inserir'.mysqli(error($con)));
				}
			}
			mysqli_close($con);
			break;
		case 4:
			$con = mysqli_connect($localhost, $user_name, $password, $db);
			if(mysqli_errno($con)) {
				header('Location: ../cad-outros.html?msg=Erro ao conectar!');
			} else {
				$ins = "INSERT INTO `pizzaria`.`STATUS` (`NM_STATUS`, `DSC_STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('ATIVO', 'Registro ativo valido na base', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."');";
				if (mysqli_query($con, $ins)) {
					$ins2 = "INSERT INTO `pizzaria`.`outros` (`NM_OUTRO`, `VL_OUTRO`, `DSC_OUTRO`, `STATUS`, `DT_CRI`, `DT_ULT_ALT`) VALUES ('".$_POST['nm_outro']."', '".$_POST['vl_outro']."', '".$_POST['nm_outro']."', '".mysqli_insert_id($con)."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
					if (mysqli_query($con, $ins2)) {
						header('Location: ../cad-outros.html?msg=Registro inserido!');
					} else {
						header('Location: ../cad-outros.html?msg=Erro ao inserir'.mysqli(error($con)));
					}
				} else {
					header('Location: ../cad-outros.html?msg=Erro ao inserir'.mysqli(error($con)));
				}
			}
			mysqli_close($con);
			break;
		default:
			echo "erro 404";
			break;
	}
?>