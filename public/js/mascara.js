/* Chamada para aplicar a máscara a inputs estáticos */
$(document).ready(function(){
  $('.cpf').mask('000.000.000-00');
  $('.telefone').mask('(00) 90000-0000',{
    translation: {
      '9': {
        pattern: /[9]/,
      }
    }
  });
});

/* Função para aplicar a máscara a input dinâmico de contato */
export function aplicarMascaraContato(selector) {
  $(selector).mask('(00) 90000-0000',{
    translation: {
      '9': {
        pattern: /[9]/,
      }
    }
  });
}