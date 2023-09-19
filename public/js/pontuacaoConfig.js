export const pontuacaoConfig = {
  curriculum_vitae: {
    curso_curta_duracao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    curso_especializacao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    diploma_mestrado: {
      pontuacao: 0.75,
      limite: 1.50,
    },
    diploma_doutorado: {
      pontuacao: 2.00,
      limite: 2.00,
    },
    aprovacao_concurso: {
      pontuacao: 0.25,
      limite: 0.75,
    },
  },
  experiencia_profissional: {
    politicas_garantidoras_direitos: {
      pontuacao: 0.25,
      limite: 2.75,
    },
    assesor_juridico:{
      pontuacao: 0.25,
      limite: 2.75,
    },
    atendimento_pessoas:{
      pontuacao: 0.25,
      limite: 1.00,
    },
    libras:{
      pontuacao: 0.25,
      limite: 1.00,
    }
  },
  curriculum_vitae_estagiario:{
    comprovante_matricula: calcularPontuacaoComprovanteMatricula,
    experiencia_profissional:{
      quantidade_experiencia: calcularPontuacaoQuantidadeExperienciaProfissional,
      duracao_experiencia: calcularPontuacaoDuracaoExperienciaProfissional
    },
    trabalhos_voluntarios: {
      quantidade_experiencia: calcularPontuacaoQuantidadeExperienciaProfissional,
      duracao_experiencia: calcularPontuacaoDuracaoExperienciaProfissional
    }
  }
}

function calcularPontuacaoComprovanteMatricula(duracaoMatricula) {
  if (duracaoMatricula < 1) {
    return { pontuacao: 0.5, limite: 2 };
  } else if (duracaoMatricula >= 1 && duracaoMatricula < 2) {
    return { pontuacao: 1, limite: 2 };
  } else {
    return { pontuacao: 2, limite: 2 };
  }
}

function calcularPontuacaoQuantidadeExperienciaProfissional(quantidadeExperienciaProfissional){
  if (quantidadeExperienciaProfissional >= 1 && quantidadeExperienciaProfissional < 2) {
    return { pontuacao: 1, limite: 4 };
  } else if (quantidadeExperienciaProfissional >= 2) {
    return { pontuacao: 2, limite: 4 };
  } else {
    return { pontuacao: 0, limite: 4 };
  }
}

function calcularPontuacaoDuracaoExperienciaProfissional(duracaoExperienciaProfissional){
  if (duracaoExperienciaProfissional >= 0.1 && duracaoExperienciaProfissional < 0.5) {
    return { pontuacao: 1, limite: 4 };
  } else if(duracaoExperienciaProfissional >= 0.6){
    return { pontuacao: 2, limite: 4 };
  } else {
    return { pontuacao: 0, limite: 4 };
  }
}