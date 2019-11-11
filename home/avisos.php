<?php

include('conexao.php');
 $id_user = $_SESSION['usuarioId'];
 $result_usuario = "select *, TIMESTAMPDIFF(DAY, NOW(), data) AS dias_restantes FROM saidas where id_usuario='$id_user' order by rand()";



		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		$dados = mysqli_fetch_assoc($resultado_usuario);





      if(empty($dados)){
      echo "Seja bem vindo (a), faça agendamentos para obter avisos importantes.";
  }elseif($dados['dias_restantes']>0){
       echo "Sua conta de ".$dados['nome']. " vence em " .$dados['dias_restantes']. " dias";
      
  
}else{
    echo "Seja bem vindo (a), faça agendamentos para obter avisos importantes.";
}
			





?>
