$(function(){
  $("#form-test").on("submit",function(){
    nome_input = $("input[name='usuario']");
    email_input = $("input[name='email']");
    senha_input = $("input[name='senha']");

    if(nome_input.val() == "" || nome_input.val() == null)
    {
      $("#erro-nome").html("O nome é obrigatorio");
      return(false);
    }


    if(email_input.val() == "" || email_input.val() == null)
    {
      $("#erro-email").html("O e-mail é obrigatório");
      return(false);
    }


    if(senha_input.val() == "" || senha_input.val() == null)
    {
      $("#erro-senha").html("A senha é obrigatória");
      return(false);
    }

    return(true);
  });
});