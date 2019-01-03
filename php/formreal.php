

<?php        



                // ***** Js Ajax do formulário


/*              <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>   // script ajax

                <script>
                function _(id){ return document.getElementById(id); }
                function submitForm(){
                _("mybtn").disabled = true;
                _("status").innerHTML = 'Aguarde ...';
                var formdata = new FormData();
                formdata.append( "nome", _("nome").value );
                formdata.append( "email", _("email").value );
                formdata.append( "mensagem", _("mensagem").value );
                var ajax = new XMLHttpRequest();
                ajax.open( "POST", "php/formreal.php" );
                ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200) {
                if(ajax.responseText == "Formulário enviado!"){
				_("my_form").innerHTML = '<h2>Obrigado '+_("nome").value+', sua mensagem foi enviada.</h2>';
			} else {
				_("status").innerHTML = ajax.responseText;
				_("mybtn").disabled = false;
			}
		}
	}
	ajax.send( formdata );
}
</script>

*/


                // ***** HTML DO FORM *****
                
/*      <form id="my_form" onsubmit="submitForm(); return false;"> 
            <input id="nome" type="text" class="feedback-input" placeholder="Name" required /> 
            <input id="email" type="email" class="feedback-input" placeholder="Email" required />
            <textarea id="mensagem" class="feedback-input" placeholder="Sua mensagem" required></textarea>
            <input type="submit" id="mybtn" value="SUBMIT" />
            <br>
            <span id="status" class="span_formsubmited"></span>
        </form>
        */



        if( isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"])  && isset($_POST["mensagem"]) ){


        $to="contato@parafusosautomotivos.com.br"; //Email para ser enviado o formulário
        $subject="Contato do site: Parafusos Automotivos"; //Assunto e cabeçalho do dormulário no corpo do email
        $vnome=$_POST["nome"];
        $vemail=$_POST["email"];
        $vtel=$_POST["telefone"];
        $text=$_POST["mensagem"];
        // $url="www.leandropelegrini.com.br";  //Site que será redirecionado após envio do formulario 




        $headers  =  'MIME-Version: 1.0' . "\r\n";
        $headers .=  'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: ".$vemail."\r\n"; 
        $message = "<body style=background-color:#ffffff;color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-size:12px;line-height:18px;font-family:helvetica,arial,verdana,sans-serif>
                    <h2 style=background-color:#eeeeee>" .$subject. "</h2>
                    <table cellspacing=0 cellpadding=0 width=100% style=background-color:#ffffff>
                    <tr><td><strong>Nome</strong></td><td>".$vnome."</td></tr>
                    <tr><td><strong>E-Mail</strong></td><td>".$vemail."</td></tr>
                    <tr><td><strong>Telefone</strong></td><td>".$vtel."</td></tr>
                    <tr><td><strong>Mensagem</strong></td><td>".$text."</td></tr>
                    </table>
                    <br/><br/>
                    <div style=background-color:#eeeeee;font-size:10px;line-height:11px> Enviado de: "  .$_SERVER['SERVER_NAME']."</div>
                    <div style=background-color:#eeeeee;font-size:10px;line-height:11px> Enviado por: " .$_SERVER['REMOTE_ADDR']."</div>
                    </body>" ; 

    

	   if(mail($to, $subject, $message, $headers)){
           
           echo "Formulário enviado!";
       } else{
           echo "O servidor encontrou um erro, tente novamente mais tarde.";
       }



        }




?>