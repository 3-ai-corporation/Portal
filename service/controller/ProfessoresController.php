<?php

require 'model/ProfessoresModel.php';
require 'model/TurmasModel.php';
require 'model/MateriasModel.php';
require 'model/ProfessorMateriasModel.php';
require 'model/MateriaTurmasModel.php';
require 'model/CursosModel.php';
require 'model/AlunosModel.php';
require 'model/UsuariosModel.php';
require 'model/NotificacoesModel.php';

class ProfessoresController {

    // Função responsável por retornar todos os professores
    public function retrieve() {
        $professores = ProfessoresModel::find('all',array('order' => 'nome'));
        $retorno = array();
        foreach($professores as $key => $value ) {
            $obj['id'] = $value->id;
            $obj['nome'] = $value->nome;

            $retorno[] = $obj;
        }
        return $retorno;
    }

	public function login($matricula,$senha){
		$professor = UsuariosModel::all(array('conditions' => array('matricula = ? AND senha = ?',$matricula,$senha)));
		if($professor != null){
		  return true;
		}
		else{
		  return false;
		}
	}
	
	public function EsqueceuSenha($matricula,$email){
		$usuario = UsuariosModel::all(array('conditions' => array('matricula = ? AND email = ?',$matricula,$email)));
		if($usuario != null){
		  return true;
		}
		else{
		  return false;
		}
	}
	
	public function teste() {
        $professores = ProfessoresModel::find('all');
        $retorno = array();
        foreach($professores as $key => $value ) {
			$usuario = UsuariosModel::find($value->matricula);
            $obj['matricula'] = $usuario->matricula;
            $obj['senha'] = $usuario->senha;
			$obj['email'] = $usuario->email;
			
            $retorno[] = $obj;
        }
        return $retorno;
    }
    // Função responsável por retornas as turmas lecionadas por um professor
    public function retrieveTurmas($matriculaProfessor, $returnDisciplina) {
        // Vai retornar os registros da tabela tb_professor_turmas de acordo com a Matricula do professor
        
        $prof_materias = ProfessorMateriasModel::find("all",array('conditions' => 'professor_matricula = ' . $matriculaProfessor ));

        $retorno = array();
        foreach($prof_materias as $key => $value ) {
            // Busca de turmas a partir do id
            $materias_turmas = MateriaTurmasModel::find($value->materia_turmas_id);

            $turma = TurmasModel::find($materias_turmas->turma_id);

            $result['serie'] = $turma->serie;
            $result['ano'] = $turma->ano;
            
            $curso = CursosModel::find($turma->cursos_id);
            $result['cursos'] = $curso->curso;

            if($returnDisciplina)
            {
                $materias = MateriasModel::find($materias_turmas->materia_id);
                $result['materia'] = $materias->nome;
            }

            $retorno[] = $result;

        }
        return $retorno;
    }

    public function retrieveDisciplinas($professorMatricula, $bool ) {

        return retrieveTurmas($professorMatricula, $bool);
    }

    /*public function retrieveMaterias($series = array(), $id) {
        $prof_turmas = ProfessorTurmasModel::find("all",array("conditions" => "id_professor = " . $id));

        $materias = array();
        foreach($prof_turmas as $key => $value ) {
            foreach($series as $key => $s ) {
                $turmas = MateriasTurmasModel::find("all", array( "conditions" => "turmas_id = " . $s["id"]) );

                $aux = MateriasModel::find($turmas["materia_id"]);
                $materias[] = $aux["nome"];
            }
        }

        return $materias;
    }*/
	
    public function retrieveNotificacoes($matricula) {
        $prof_notif = ProfessorNotificacoesModel::find("all",array("conditions" => "professor_matricula = " . $matricula));

        $retorno = array();
        foreach($prof_notif as $key => $value ) {
            $notificacao = NotificacoesModel::find($value->notificacao_id);

            $result["id"] = $notificacao->id;
            $result["tipo"] = $notificacao->tipo;
            $result["mensagem"] = $notificacao->mensagem;

            $retorno[] = $result;

        }
        return $retorno;
    }
	
	
	public function getNotificacoesByCategory($m,$categoria) {
      $todas = $this->retrieveNotificacoes($m);
	   
	   $retorno = array();
	   foreach($todas as $key => $value ) {
            if($value["tipo"] == $categoria){
				$retorno[] = $value;
			}
        }
	   return $retorno;
    }
	
	public function retrieveSenha($matricula, $email) {
		$esqueceu = UsuariosModel::find("all", array("conditions" => "matricula = ? AND email = ? ",$matricula, $email));
		
		if($esqueceu != null)
		{
			return $esqueceu->nome;
		}
		else
		{
			return "";
		}
    }
	
	public function getEmail($matricula)
	{
		$usuario = UsuariosModel::all(array("conditions" => array('matricula = ?',$matricula)));
		$retorno = Array();
		foreach($usuario as $key => $value ) {
            $obj['email'] = $value->email;

            $retorno[] = $obj;
        }
		return $retorno;
	}

    public function sendMail($nome,$email,$codigo)
    {
        require("phpmailer/class.phpmailer.php");
        require("phpmailer/PHPMailerAutoload.php");

        $mail = new PHPMailer(); 
        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->Username = 'portalfundacaonokia@gmail.com'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = 'masterkey123'; // Senha do servidor SMTP (senha do email usado)
        $mail->SMTPSecure = "tls";
        //$mail->Host = "smtp.gmail.com";
        $mail->Port = "25";
        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From = "portalfundacaonokia@gmail.com"; // Seu e-mail
        $mail->Sender = "portalfundacaonokia@gmail.com"; // Seu e-mail
        $mail->FromName = "Portal FUNDACAO NOKIA"; // Seu nome

        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($email, $nome);
        //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
        //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

        // Define os dados técnicos da Mensagem
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

        // Define a mensagem (Texto e Assunto)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Subject  = "Recuperação de Senha"; // Assunto da mensagem
        $mail->Body = 'O código para recuperação de senha é ' + $codigo + "<br> Vá até a página de recuperação de senha e cole este código no local indicado </br>";
        $mail->AltBody = 'O código para recuperação de senha é ' + $codigo + "/n Vá até a página de recuperação de senha e cole este código no local indicado";

        // Define os anexos (opcional)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo

        // Envia o e-mail
        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        // Exibe uma mensagem de resultado
        if ($enviado) {
            return true;
        } else {
            return false;
        }
    }
}